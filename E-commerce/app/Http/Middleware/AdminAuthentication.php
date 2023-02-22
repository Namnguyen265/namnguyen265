<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level == 1)
        {
            // echo 'True';
            return $next($request);
        }

        else
        {
            // return redirect('/logout');
            // return redirect()->back();
            Auth::logout();
            return redirect()->route('logout_admin')->withErrors('Tài khoản không tồn tại');
        }
        // return $next($request);
    }
}
