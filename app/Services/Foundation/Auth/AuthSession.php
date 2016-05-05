<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 17:23
 */

namespace App\Services\Foundation\Auth;


use App\Services\Foundation\Auth\Contracts\AuthSessionInterface;
use Illuminate\Support\Facades\Session;

/**
 * Class AuthSession
 * @package App\Services\Foundation\Auth
 *
 * 用于保存和获取用户登录后的信息及权限信息
 * 1.用户个人信息
 * 2.用户的权限信息(多维和一维)
 * 3.用户超时
 */
class AuthSession implements AuthSessionInterface
{
    /**
     * 用户最近一次操作的时间,用于避免长时间保存session
     *
     * @var string
     */
    static private $user_current_time = 'USER_CURRENT_TIME';

    /**
     * 用户最长的不操作时间
     *
     * @var int
     */
    static private $user_max_time = 1800;//1800s

    /**
     * 用户信息key
     *
     * @var string
     */
    static private $user_key = 'USER_KEY';

    /**
     * 用户一维权限
     *
     * @var string
     */
    static private $acl_simple_key = 'ACL_SIMPLE_KEY';

    /**
     * 用户多维权限
     *
     * @var string
     */
    static private $acl_multi_key = 'ACL_MULTI_KEY';

    /**
     * @var string
     */
    static private $acl_key = 'ACL_KEY';

    /**
     * 设置用户
     *
     * @param array $user
     * @return array
     */
    static public function setUser(array $user)
    {
        return Session::put(self::$user_key, $user) & self::setCurrentTime();
    }

    /**
     * 返回用户
     *
     * @return array
     */
    static public function user()
    {
        return Session::get(self::$user_key);
    }

    /**
     * 返回用户id
     *
     * @return int
     */
    static public function id()
    {
        return Session::get(self::$user_key)['id'];
    }

    /**
     * 判断用户是否登录
     *
     * @return bool
     */
    static public function has()
    {
        return Session::has(self::$user_key);
    }

    /**
     * 设置用户的权限列表
     *
     * @param array $simpleAcl
     * @param array $multiAcl
     * @param array $acls
     * @return mixed
     */
    static public function setAcl(array $simpleAcl, array $multiAcl, array $acls)
    {
        return Session::put(self::$acl_simple_key, $simpleAcl) & Session::put(self::$acl_multi_key, $multiAcl)
        & Session::put(self::$acl_key, $acls);
    }

    /**
     * 获取一维权限
     *
     * @return array
     */
    static public function simpleAcl()
    {
        return Session::get(self::$acl_simple_key);
    }

    /**
     * 获取多维权限
     *
     * @return array
     */
    static public function multiAcl()
    {
        return Session::get(self::$acl_multi_key);
    }

    /**
     * 获取用户的权限
     * @return mixed
     */
    static public function acls()
    {
        return Session::get(self::$acl_key);
    }

    /**
     * 设置最近操作时间
     *
     * @return mixed
     */
    static public function setCurrentTime()
    {
        return Session::put(self::$user_current_time, time());
    }

    /**
     * 返回最近操作时间
     * @return int
     */
    static public function getCurrentTime()
    {
        return Session::get(self::$user_current_time);
    }

    /**
     * 检查用户是否超时
     *
     * @return bool
     */
    static public function checkTime()
    {
        $time = time();
        if (($time - self::getCurrentTime()) > self::$user_max_time) {
            return false;
        }
        self::setCurrentTime();
        return true;
    }

    /**
     * 清除所有Session保存的信息
     *
     * @return mixed
     */
    static public function clear()
    {
        return Session::flush();
    }
}