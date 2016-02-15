<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveMember
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
        
            if (\Auth::user()->links->first()->active) {
            return $this->nocache( $next($request) );
            }
            return redirect()->action('DashboardController@showShippingAddress');
    }

    protected function nocache($response)
    {
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Expires','Wed, 17 Aug 1988 00:00:00 GMT');
        $response->headers->set('Pragma','no-cache');

        return $response;
    }
}
