<?php

namespace App\Http\Middleware\Admin;

use App\Services\Foundation\Auth\Acl;
use Closure;

class AclMiddleware
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
        if (Acl::can($this->getActionName($request)) == false) {
            return abort(404);
        }
        return $next($request);
    }

    private function getActionName($request)
    {
        $action = $request->route()->getAction();
        if (empty($action['as'])) {
            echo '没有设置路由名称';
            exit();
        }
        return $action['as'];
    }
}
