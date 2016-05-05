<?php

namespace App\Http\Middleware\Admin;

use App\Services\Foundation\Log\Log;
use Closure;

class LogMiddleware
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
        with(new Log($request))->save();
        return $next($request);
    }
}
