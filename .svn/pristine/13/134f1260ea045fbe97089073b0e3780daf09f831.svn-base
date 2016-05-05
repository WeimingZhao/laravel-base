<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 17:23
 */

namespace App\Services\Foundation\Auth\Contracts;


/**
 * Interface AuthInterface
 * @package App\Services\Foundation\Auth\Contracts
 */
interface AuthInterface
{
    /**
     * 用户登录
     *
     * @param $username
     * @param $password
     * @return bool
     */
    static public function login($username, $password);

    /**
     * 用户退出
     *
     * @return bool
     */
    static public function logout();

    /**
     * 用户是否登录
     *
     * @return bool
     */
    static public function has();

    /**
     * 返回用户
     *
     * @return array
     */
    static public function user();

    /**
     * 返回用户id
     *
     * @return int
     */
    static public function id();

    /**
     * 验证是否超时
     *
     * @return bool
     */
    static public function checkTime();
}