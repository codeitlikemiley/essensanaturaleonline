<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Authenticatable
{
    use HasRolesAndAbilities;
    use SyncableGraphNodeTrait;
    /**
     * [$graph_node_field_aliases Declare Here All Your Database Column Name With respect to FB Graph Node Field]
     * @var [mix]
     */
    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
        'email' => 'email',
        'verified' => 'active',
        'access_token' => 'access_token'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = ['id' ,'password', 'remember_token', 'updated_at', 'activation_code', 'resent', 'status', 'active', 'sp_id', 'email', 'created_at', 'username', 'access_token'];
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'active' => 'boolean',
        'status' => 'boolean',

    ];
    public function orders()
    {
    return $this->hasMany("App\Order");
    }

    public function reviews()
    {
    return $this->hasMany("App\Review");   
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->sp_id = 1;
            $cookie = \Cookie::get('sponsor');
            if ($cookie) {
                $user->sp_id = $cookie['user_id'];
            }
            $user->activation_code = str_random(60);
        });
        static::created(function ($user) {
            
            $access_token = config('services.fbapp.app_id') . '|' . config('services.fbapp.app_secret');
            $fbID = $user->facebook_user_id;
            if(!empty($fbID))
            {
            $fb = app(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);
            $response1 = $fb->post( '/' .$fbID. '/notifications',array(
                        'template' => 'Welcome @['. $fbID . '] to Essensa Naturale!',
                        'href' => '@'.$user->username,
                        'access_token' => $access_token
                        ));
            }

            if(empty($fbID)){
                    $fbID = $user->username;
                } else {
                    $fbID = '@['. $fbID . ']';
                }
            $sponsor = $user->sponsor();

              $fbID1 = $sponsor->facebook_user_id;
              if(!empty($fbID1))
              {
                $fb = app(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);

               $response2 = $fb->post( '/' .$fbID1. '/notifications',array(

                        'template' => 'Congratulations!  @['. $fbID1 . '] ,'.$fbID.' Have Signed Up in Your Link!',
                        'href' => '@'.$sponsor->username,
                        'access_token' => $access_token
                        )); 
              }
        });
    }



    /**
     * [findByUsername Find User Using Their Username].
     *
     * @param [string] $username [Public Searchable]
     *
     * @return [Object] [Userdata]
     */
    public static function findByUsername($username)
    {
        return self::where('username', $username)->firstOrFail();
    }
    /**
     * [setPasswordAttribute Password Setter Mutator].
     *
     * @param [string] $value [Enforce Bcrypt On Save]
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

    /**
     * [setUsernameAttribute Username Setter Mutator].
     *
     * @param [string] $value [Make Username in Lowercase on Save]
     */
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    /**
     * [links Eloquent Relationship].
     *
     * @return [Collection] [Set User to Have Many Links]
     */
    public function links()
    {
        return $this->hasMany('App\Link');
    }
    /**
     * [profile Eloquent Relationship].
     *
     * @return [Collection] [Set User to Have One Profile]
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function verifyEmail()
    {
        $this->active          = 1;
        $this->activation_code = null;
        $this->save();
    }

    public function incrementResent()
    {
        $this->resent = $this->resent + 1;
        $this->save();
    }

    public function sponsor()
    {
        $user = self::find($this->sp_id);
        return $user;
    }
}
