<?php

namespace App\Http\Middleware;

use Closure;

class provider
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
        if (Auth::user()->roles->name == 'admin') {
            return $next($request);
        } else {
            return redirect()->route('admin-dashboard')->with('delete', 'Sorry you don\'t have access to view the requested resource');
        }

    }
}
