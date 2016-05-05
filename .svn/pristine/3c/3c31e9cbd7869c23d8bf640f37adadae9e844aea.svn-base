<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 17:40
 */

namespace App\Services\Foundation\Auth\Contracts;


interface AuthSessionInterface
{
    /**
     * 设置用户
     *
     * @param array $user
     * @return array
     */
    static public function setUser(array $user);

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
     * 判断用户是否登录
     *
     * @return bool
     */
    static public function has();

    /**
     * 设置用户的权限列表
     *
     * @param array $simpleAcl
     * @param array $multiAcl
     * @param array $acls
     * @return mixed
     */
    static public function setAcl(array $simpleAcl, array $multiAcl, array $acls);

    /**
     * 获取一维权限
     *
     * @return array
     */
    static public function simpleAcl();

    /**
     * 获取多维权限
     *
     * @return array
     */
    static public function multiAcl();

    /**
     * 用户权限
     *
     * @return mixed
     */
    static public function acls();

    /**
     * 设置最近操作时间
     *
     * @return mixed
     */
    static public function setCurrentTime();

    /**
     * 返回最近操作时间
     * @return int
     */
    static public function getCurrentTime();

    /**
     * 检查用户是否超时
     *
     * @return bool
     */
    static public function checkTime();

    /**
     * 清除所有信息
     *
     * @return mixed
     */
    static public function clear();
}