<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 18:21
 */

namespace App\Services\Foundation\Auth;


use App\Models\Foundation\Access;
use App\Models\Foundation\User;
use App\Services\Foundation\Auth\Contracts\AclInterface;
use App\Services\Tree;

class Acl implements AclInterface
{

    /**
     * 超级管理员
     * @var array
     */
    static private $super_admin = [1];


    public function __construct()
    {
//        self::$super_admin = config('foundation.super_admin');
    }


    /**
     * 设置保存权限
     *
     * @param  $uid
     * @return mixed
     */
    static public function setAcl($uid)
    {
        $list = self::getListFromDb($uid);
        $acls = array_pluck($list, 'name');
        return AuthSession::setAcl(Tree::simpleTree($list), Tree::multiTree($list),$acls);
    }

    /**
     *  验证是否具备权限
     *
     * @param $route_name
     * @return bool
     */
    static public function can($route_name)
    {
        if (is_null($route_name) || !is_string($route_name)) {
            return false;
        }
        //是否超级用户,超级用户具有所有权限
        if (in_array(AuthSession::id(), self::$super_admin)) {
            return true;
        }
        //是否具有指定权限
        $list = AuthSession::acls();
        if (in_array($route_name,$list)){
            return true;
        }
        /*foreach ($list as $key => $val) {
            if ($val['name'] == $route_name) {
                return true;
            }
        }*/
        return false;
    }

    /**
     * 当前用户能否修改指定用户
     *
     * @param $uid
     * @param null $role_id
     * @return mixed
     */
    static public function canUser($uid, $role_id = null)
    {
        $user = AuthSession::user();
        //当前用户是超级用户
        if (in_array($user['id'], self::$super_admin)) {
            return true;
        }
        //指定用户是超级用户,其他人均不能操作
        if (in_array($uid, self::$super_admin)) {
            return false;
        }
        return false;
    }

    /**
     * 返回当前用户的一维权限列表
     *
     * @return array
     */
    static public function simpleAcl()
    {
        return AuthSession::simpleAcl();
    }

    /**
     * 返回当前用户的多维权限列表
     *
     * @return array
     */
    static public function multiAcl()
    {
        return AuthSession::multiAcl();
    }


    static private function getListFromDb($uid)
    {
        //超级用户,全部权限
        if (in_array($uid, self::$super_admin)) {
            return Access::orderBy('sort', 'DESC')->get()->toArray();
        }
        $list = User::findOrFail($uid)->role->accesses->toArray();//
        //免授权的功能
        $list2 = Access::where('acl', 0)->get()->toArray();
        return array_merge($list, $list2);

    }
}