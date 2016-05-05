<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/3/4
 * Time: 12:45
 */

namespace App\Services\Foundation\Log;


use App\Models\Foundation\Access;
use App\Models\Foundation\UserLog;
use App\Services\Foundation\Auth\AuthSession;
use App\Services\Foundation\Log\Contracts\LogInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Log implements LogInterface
{

    /**
     * @var
     */
    protected $request;

    /**
     * @var array
     */
    protected $log = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * 执行日志保存
     *
     * @return mixed
     */
    public function save()
    {
        $this->log = array_merge($this->log, $this->getUser(), $this->getRoute(), $this->getServer());
        UserLog::create($this->log);
        return null;
    }

    /**
     * @return array
     */
    protected function getUser()
    {
        if (AuthSession::has()) {
            $user = AuthSession::user();
            $user_info = [
                'user_id' => $user['id'],
                'username' => $user['username']
            ];
        } else {
            $user_info = ['user_id' => '', 'username' => ''];
        }
        return $user_info;
    }

    /**
     * @return array
     */
    protected function getServer()
    {
        $server = $this->request->server->all();
        return [
            'server_name' => !empty($server['SERVER_NAME']) ? $server['SERVER_NAME'] : null,
            'uri' => !empty($server['REQUEST_URI']) ? $server['REQUEST_URI'] : null,
            'host' => !empty($server['HTTP_HOST']) ? $server['HTTP_HOST'] : null,
            'connection' => !empty($server['HTTP_CONNECTION']) ? $server['HTTP_CONNECTION'] : null,
            'accept' => !empty($server['HTTP_ACCEPT']) ? $server['HTTP_ACCEPT'] : null,
            'upgrade_insecure_requests' => !empty($server['HTTP_UPGRADE_INSECURE_REQUESTS']) ? $server['HTTP_UPGRADE_INSECURE_REQUESTS'] : null,
            'user_agent' => !empty($server['HTTP_USER_AGENT']) ? $server['HTTP_USER_AGENT'] : null,
            'referer' => !empty($server['HTTP_REFERER']) ? $server['HTTP_REFERER'] : null,
            'accpet_encoding' => !empty($server['HTTP_ACCEPT_ENCODING']) ? $server['HTTP_ACCEPT_ENCODING'] : null,
            'accept_language' => !empty($server['HTTP_ACCEPT_LANGUAGE']) ? $server['HTTP_ACCEPT_LANGUAGE'] : null,
            'cookie' => !empty($server['HTTP_COOKIE']) ? $server['HTTP_COOKIE'] : null,
            'ip' => Input::ip()
        ];
    }

    /**
     * @return array
     */
    protected function getRoute()
    {
        $route_name = $this->request->route()->getName();
        return [
            'route_name' => $route_name,
            'action_title' => $this->getNameFromDB($route_name),
            'method' => $this->request->method()
        ];
    }

    /**
     * @param null $route_name
     * @return null
     */
    protected function getNameFromDB($route_name = null)
    {
        if ($route_name == null) {
            return null;
        }
        $access = Access::where('name', $route_name)->first();
        return empty($access) ? null : $access->title;
    }
}