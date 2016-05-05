<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/21
 * Time: 04:11
 */

namespace App\Repositories\Foundation;


use App\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RoleRepository extends Repository
{

    /**
     * 返回数据模型
     *
     * @return Model
     */
    protected function ORM()
    {
        return 'App\Models\Foundation\Role';
    }

    /**
     * 新数据创建前验证
     *
     * @param array $data
     * @return bool
     */
    protected function createValidator(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:20',
            'mark' => 'max:255'
        ]);
        if ($validator->fails()) {
            $this->state = 'failed';
            $this->msg = $validator->messages()->all();
            return false;
        }
        $this->url = route('foundation.role.index');
        return true;
    }

    /**
     * 数据更新前验证
     *
     * @param $id
     * @param array $data
     * @return bool
     */
    protected function updateValidator($id, array $data)
    {
        return $this->createValidator($data);
    }

    /**
     * 数据删除前验证
     *
     * @param $id
     * @return bool
     */
    protected function deleteValidator($id)
    {
        $super_roles = config('foundation.super_roles');//超级角色
        //系统保留角色,不能删除
        if (in_array($id, $super_roles)) {
            $this->state = 'failed';
            $this->msg = '该角色为系统保留角色,不能删除!';
            return false;
        }
        $users = $this->model->find($id)->users->toArray();
        //角色有所属的用户,不能删除
        if (!empty($users)) {
            $this->state = 'failed';
            $this->msg = '该角色下有用户,不能删除!';
            return false;
        }
        return true;
    }

    /**
     * 为指定角色更新权限
     *
     * @param $id
     * @param $access_ids
     * @return string
     */
    public function updateAccess($id, $access_ids)
    {
        if (empty($id) || !is_array($access_ids)) {
            $this->state = 'failed';
            $this->msg = '参数错误';
            return $this->response();
        }
        $role = $this->model->findOrFail($id);
        $role->accesses()->sync($access_ids);
        return $this->response();
    }
}