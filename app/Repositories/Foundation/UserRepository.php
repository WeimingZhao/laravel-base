<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/16
 * Time: 22:14
 */

namespace App\Repositories\Foundation;


use App\Repositories\Eloquent\Illuminate;
use App\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRepository extends Repository
{

    /**
     * 返回数据模型
     *
     * @return Model
     */
    protected function ORM()
    {
        return 'App\Models\Foundation\User';
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
            'role_id' => 'required',
            'username' => 'required|between:2,12|unique:admin_users',
            'realname' => 'required|between:2,16',
            'password' => 'required|between:6,25|alpha_dash|confirmed',
        ]);
        if ($validator->fails()) {
            $this->state = 'failed';
            $this->msg = $validator->messages()->all();
            return false;
        }
        $this->url = $this->url_back;
        return true;
    }

    /**
     * 重写创建数据方法,去除密码的确认字段
     *
     * @param array $data
     * @return string
     */
    public function create(array $data)
    {
        if ($this->createValidator($data)) {
            $this->model->create(array_except($data, 'password_confirmation'));
        }
        return $this->response();
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
        $validator = Validator::make($data, [
            'role_id' => 'required',
            'realname' => 'required|between:2,16',
        ]);
        if ($validator->fails()) {
            $this->state = 'failed';
            $this->msg = $validator->messages()->all();
            return false;
        }
        $this->url = $this->url_back;
        return true;
    }

    /**
     * 数据删除前验证
     *
     * @param $id
     * @return bool
     */
    protected function deleteValidator($id)
    {
        $admins = config('foundation.super_admin');
        if (in_array($id, $admins)) {
            $this->state = 'failed';
            $this->msg = '该用户为系统保留用户,不能删除!';
            return false;
        }
        return true;
    }

    /**
     * @param $id
     * @param array $data
     * @return string
     */
    public function password($id, array $data)
    {
        if ($this->passwordValidator($id, $data)) {
            $model = $this->model->findOrFail($id);
            $model->update(array_only($data, 'password'));
        }
        return $this->response();
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    protected function passwordValidator($id, array $data)
    {
        $validator = Validator::make($data, [
            'password' => 'required|between:6,25|alpha_dash|confirmed',
        ]);
        if ($validator->fails()) {
            $this->state = 'failed';
            $this->msg = $validator->messages()->all();
            return false;
        }
        $this->url = $this->url_back;
        $this->msg = '密码修改成功,把新密码通知给用户!';
        return true;
    }

    /**
     * 用于为指定用户修改密码(需输入原密码)
     *
     * @param $id
     * @param $old_password
     * @param $password
     * @param $password_confirmation
     * @return string
     */
    public function ipassword($id, $old_password, $password, $password_confirmation)
    {
        $user = $this->model->findOrFail($id);
        $data = [
            'password' => $password,
            'password_confirmation' => $password_confirmation
        ];
        //新密码输入不一致,以及不符合密码要求
        if (!$this->passwordValidator($id, $data)) {
            return $this->response();
        }
        //原密码输入错误
        if (!Hash::check($old_password, $user->password)) {
            $this->state = 'failed';
            $this->msg = '原密码输入错误,请输入正确的密码!';
            return $this->response();
        }
        $user->password = $password;
        $user->save();
        $this->url = $this->url_back;
        $this->msg = '密码修改成功,请牢记您的新密码!';
        return $this->response();
    }
}