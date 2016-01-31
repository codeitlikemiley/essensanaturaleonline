<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Link;
use Auth;
use Input;
use DB;
use Validator;
use App\Traits\CaptchaTrait;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\MailController as Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Order;
use App\ItemOrder;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins, CaptchaTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo          = 'profile';
    protected $loginPath           = 'login';
    protected $redirectAfterLogout = 'login';

    public $mail;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Mail $mail)
    {
        $this->middleware('guest', ['except' => ['logout', 'resendEmail']]);
        $this->mail = $mail;
    }

    public function authenticate(Request $request)
    {
        $loginRequest = new LoginRequest();
        $validator    = Validator::make($request->all(), $loginRequest->rules(), $loginRequest->messages());

        // Validate Form
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray(), 'inputs' => Input::except('_token', 'password')], 200);
        }

        // Check Captcha is Valid or Used!

        if ($this->captchaCheck() == false) {
            $errors = ['captchaError' => trans('auth.captchaError')];

            return response()->json(['success' => false, 'errors' => $errors], 200);
        }

        // Make Credentials
        $username       = $request->username;
        $password       = $request->password;
        $credentials    = [
                    'username'    => $username,
                    'password'    => $password,
                        ];
        // Remember Me Token If Filled
        $remember = $request->remember_token;

        $valid     = Auth::validate($credentials);
        $throttles = $this->isUsingThrottlesLoginsTrait();

        // Login Attempt Check
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            $errors = $validator->errors()->add('lock', 'Oops! Too Many Failed Login Attempts! Try Again Later!');

            return response()->json(['success' => false, 'errors' => $errors], 429);
        }

        // Wrong Password Check
        if (!$valid) {
            $errors = $validator->errors()->add('wrongpass', 'The Password You Type is Incorrect!');
            $this->incrementLoginAttempts($request);

            return response()->json(['success' => false, 'errors' => $errors], 200);
        }

        $user   = Auth::attempt($credentials, $remember);
        $active = Auth::user()->active;
        $status = Auth::user()->status;

        // User is Banned
        if (!$status) {
            $errors = $validator->errors()->add('banned', 'Sorry Your Account is Banned!');
            Auth::logout();

            return response()->json(['success' => false, 'errors' => $errors], 401);
        }

        // User Not Active
        if (!$active) {
            $messages = ['NotActive' => 'Account is Not Active Yet Please Verify Your Email'];

            return response()->json(['success' => true, 'messages' => $messages, 'url' => 'profile'], 200);
        }

        $messages = ['success' => 'Welcome Back!'];
        // Successfully Login Without Any Problem
        return response()->json(['success' => true, 'messages' => $messages, 'url' => 'profile'], 200);
    }

    public function login()
    {
        return view('auth.login');
    }

    // Needs a Good Template
    public function resendEmail()
    {
        $user = Auth::user();
        try {
            if (!$user) {
                throw new \Exception('Please Login As Authenticated User');
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        if ($user->active) {
            return redirect()->route('profile');
        }
        if ($user->resent >= 3) {
            return view('auth.tooManyEmails')
                ->with('email', $user->email);
        } else {
            $user->incrementResent();
            $this->mail->passwordResend($user);
            // Auth::logout();

            return \View::make('auth.resend');
        }

        return \View::make('auth.error');
    }

    public function create(Request $request)
    {
        $createUserRequest = new CreateUserRequest();
        $validator         = Validator::make($request->all(), $createUserRequest->rules(), $createUserRequest->messages());

        // Validate Form
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        }

        // Check Captcha still Valid or Used!

        if ($this->captchaCheck() == false) {
            $errors = ['captchaError' => trans('auth.captchaError')];

            return response()->json(['success' => false, 'errors' => $errors], 400);
        }

        // Check Sponsor Cookie , Provide One if None
        if (\Cookie::get('sponsor') == false) {
            try {
            $link   = Link::with('user', 'user.profile')->where('link', $request->sponsor_link)->first();
            $cookie = $link->toArray();

            $errors = [
            'CookieError' => trans('auth.cookieError'),
            'cookieNew'   => trans('auth.cookieNew'),
            'resubmitForm' => trans('auth.resubmitForm'),

            ];

            return response()->json(['success' => false, 'errors' => $errors], 400)->withCookie(\Cookie::forever('sponsor', $cookie));

            } catch (\Exception $e){
                $errors = [
            'Warning' => 'Warning :Forbiden Link Forgery!',

            ];
            return response()->json(['success' => false, 'errors' => $errors], 400);

            }
            
        }

        // This Will Prevent Unnecessary Creation of Account if Something Failed!
        DB::beginTransaction();
        $user       = User::create($request->all());
        $profile    = $user->profile()->create($request->all());
        $link       = new Link();
        $link->link = Input::get('username');
        $user->links()->save($link);

        // IF Error Occured Throw an Exception then Rollback!
        $role = $user->assign('customer');
        $ability1 = \Bouncer::allow($user)->to('add-order', Order::class);
        $ability2 = \Bouncer::allow($user)->to('edit-order', Order::class);
        $ability3 = \Bouncer::allow($user)->to('delete-order', Order::class);
        $ability4 = \Bouncer::allow($user)->to('view-itemOrder', ItemOrder::class);
        try {
            if (!$user && !$profile && !$link && !$role && $ability1 && $ability2 && $ability3 && $ability4) {
                throw new \Exception('Account Creation Failed ,Account is Rollback');
            }
        } catch (\Exception $e) {
            DB::rollback();

            $errors = [
            'ExceptionError' => $e->getMessage(),
            ];

            return response()->json(['success' => false, 'errors' => $errors], 400); // Failed Creation
        }

        // Account Successfully Created
        DB::commit();

        // Send Email To The New User
        $this->mail->registered($user);
        $this->mail->sendToSponsor($user);

        $cookie = \Cookie::forget('sponsor');

        // Return With a Response to Delete Cookie
        Auth::LoginUsingId($user->id);
        // return redirect()->route('profile');
        return response()->json(['success' => true, 'url' => 'profile'], 201)->withCookie($cookie);
    }
}
