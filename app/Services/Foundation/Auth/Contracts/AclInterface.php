<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 17:27
 */

namespace App\Services\Foundation\Auth\Contracts;

/**
 * Interface AclInterface
 * @package App\Services\Foundation\Auth\Contracts
 *
 *
 */
interface AclInterface
{
    /**
     * 设置保存权限
     *
     * @param  $uid
     * @return mixed
     */
    static public function setAcl($uid);

    /**
     *  验证是否具备权限
     *
     * @param $route_name
     * @return mixed
     */
    static public function can($route_name);

    /**
     * 当前用户能否修改指定用户
     *
     * @param $uid
     * @param null $role_id
     * @return mixed
     */
    static public function canUser($uid, $role_id = null);

    /**
     * 返回当前用户的一维权限列表
     *
     * @return array
     */
    static public function simpleAcl();

    /**
     * 返回当前用户的多维权限列表
     *
     * @return array
     */
    static public function multiAcl();
}