<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class employee
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
        if (Auth::user()->roles->name == 'employee') {
            return $next($request);
        } else {
            return redirect()->route('admin-dashboard')->with('delete', 'Sorry you don\'t have access to view the requested resource');
        }

    }
}
