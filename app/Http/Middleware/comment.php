<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class comment
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
        if (Auth::user()->roles->name == 'employee' || Auth::user()->roles->name == 'super_admin') {
            return $next($request);
        } else {
            return redirect()->back()->with('delete', 'Sorry you don\'t have access to view the requested resource');
        }
    }
}
