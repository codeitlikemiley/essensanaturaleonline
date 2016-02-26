<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        // If User Account is a Customer 
        if (!\Auth::user()->active) {
            return view('auth.guestactivate')
                ->with( 'email', \Auth::user()->email )
                ->with( 'date', \Auth::user()->created_at);
        }

        return $next($request);
    }

}
