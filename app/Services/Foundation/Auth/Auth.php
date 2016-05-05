<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 18:21
 */

namespace App\Services\Foundation\Auth;


use App\Models\Foundation\LoginLog;
use App\Models\Foundation\User;
use App\Services\Foundation\Auth\Contracts\AuthInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class Auth implements AuthInterface
{

    /**
     * 用户可登录的状态
     *
     * @var array
     */
    static private $allow_status = [1];

    /**
     * @var
     */
    static private $user;

    /**
     * 用户登录
     *
     * @param $username
     * @param $password
     * @return bool
     */
    static public function login($username, $password)
    {
        if (self::check($username, $password) == false) {
            return false;
        }
        //保存用户session
        AuthSession::setUser([
            'id' => self::$user->id,
            'role_id' => self::$user->role_id,
            'username' => self::$user->username,
            'realname' => self::$user->realname,
            'email' => self::$user->email,
            'mobile' => self::$user->mobile,
            'last_login_ip' => self::$user->last_login_ip,
            'last_login' => self::$user->last_login,
            'status' => self::$user->status,
        ]);
        //保存acl
        Acl::setAcl(self::$user->id);
        //最近登录
        self::setLastLogin();
        //登录日志
        self::setLoginLog();
        return true;
    }

    /**
     * 用户退出
     *
     * @return bool
     */
    static public function logout()
    {
        return AuthSession::clear();
    }

    /**
     * 用户是否登录
     *
     * @return bool
     */
    static public function has()
    {
        return AuthSession::has();
    }

    /**
     * 返回用户
     *
     * @return array
     */
    static public function user()
    {
        return AuthSession::user();
    }

    /**
     * 返回用户id
     *
     * @return int
     */
    static public function id()
    {
        return AuthSession::id();
    }

    /**
     * 验证是否超时
     *
     * @return bool
     */
    static public function checkTime()
    {
        return AuthSession::checkTime();
    }

    /**
     * 验证登录信息
     *
     * @param $username
     * @param $password
     * @return bool
     */
    static private function check($username, $password)
    {
        if (is_null($username) || is_null($password)) {
            return false;
        }
        $user = User::where('username', $username)->whereIn('status', self::$allow_status)->first();
        if (empty($user)) {
            return false;
        }
        if (Hash::check($password, $user->password)) {
            self::setUser($user);
            return true;
        }
        return false;
    }

    /**
     * 设置当前用户
     *
     * @param User $user
     */
    static private function setUser(User $user)
    {
        self::$user = $user;
    }

    static private function setLastLogin()
    {
        self::$user->last_login_ip = Input::ip();
        self::$user->last_login = date('Y-m-d H:i:s');
        self::$user->save();
    }

    static private function setLoginLog()
    {
        $data = [
            'user_id' => self::$user->id,
            'username' => self::$user->username,
            'ip' => Input::ip(),
        ];
        return LoginLog::create($data);
    }
}