<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Role
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
        if (!Auth::check())
        {
            return redirect('login');
        }

        if ($request->user() && ($request->user()->role == 'manager' || $request->user()->role == 'super'))
        {
            return $next($request);
        }
        return redirect('/admin');
    }
}
