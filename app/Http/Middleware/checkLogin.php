<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('spotify', 'nothing') == 'nothing') {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
