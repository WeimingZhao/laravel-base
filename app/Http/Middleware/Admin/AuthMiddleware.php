<?php

namespace App\Http\Middleware\Admin;

use App\Services\Foundation\Auth\Auth;
use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::checkTime() == false || Auth::has() == false) {
            return redirect('admin');
        }
        return $next($request);
    }
}
