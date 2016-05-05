<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/19
 * Time: 01:39
 */

namespace App\Repositories\Foundation;


use App\Models\Foundation\Access;
use App\Repositories\Eloquent\Illuminate;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Validator;

class AccessRepository extends Repository
{

    /**
     * 返回数据模型
     *
     * @return Model
     */
    protected function ORM()
    {
        return 'App\Models\Foundation\Access';
    }

    /**
     * 新数据创建前验证
     *
     * @param array $data
     * @return mixed
     */
    protected function createValidator(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:30',
            'name' => 'required|max:60',
            'display' => 'boolean',
            'acl' => 'boolean',
            'mark' => 'max:255',
            'image' => 'max:30'
        ]);
        if ($validator->fails()) {
            $this->state = 'failed';
            $this->msg = $validator->messages()->all();
            return false;
        }
        $this->url = route('foundation.access.index');
        return true;
    }

    /**
     * 重写新建数据方法,增加level字段的计算
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $data['level'] = 0;
        if ($data['pid'] != 0) {
            $parent = $this->model->find($data['pid']);
            $data['level'] = $parent->level + 1;
        }
        return parent::create($data);
    }

    /**
     * 数据更新前验证
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    protected function updateValidator($id, array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:30',
            'name' => 'required|max:60',
            'display' => 'boolean',
            'acl' => 'boolean',
            'mark' => 'max:255',
            'image' => 'max:30'
        ]);
        if ($validator->fails()) {
            $this->state = 'failed';
            $this->msg = $validator->messages()->all();
            return false;
        }
        $this->url = route('foundation.access.index');
        return true;
    }

    public function update($id, array $data)
    {
        $data['level'] = 0;
        if ($data['pid'] != 0) {
            $parent = $this->model->find($data['pid']);
            $data['level'] = $parent->level + 1;
        }
        if ($this->updateValidator($id, $data)) {
            $model = $this->model->find($id);
            $old_level = $model->level;//原level
            $model->update($data);
            //处理子级的level,level发生变更,则更新子级level
            if ($data['level'] != $old_level) {
                $this->updateLevel($id, $model->level);
            }
        }
        return $this->response();
    }

    /**
     * 更新子级的level
     *
     * @param $pid
     * @param $parent_level
     * @return bool
     */
    private function updateLevel($pid, $parent_level)
    {
        $sons = $this->model->where('pid', $pid)->get();
        if (empty($sons)) {
            return false;
        }
        foreach ($sons as $son) {
            $son->level = $parent_level + 1;
            $son->save();
            $this->updateLevel($son->id, $son->level);
        }
        return true;
    }

    /**
     * 数据删除前验证
     *
     * @param $id
     * @return mixed
     */
    protected function deleteValidator($id)
    {
        $son = $this->model->where('pid', $id)->first();
        if (!empty($son)) {
            $this->state = 'failed';
            $this->msg = '该功能下有子功能,无法删除!';
            return false;
        }
        return true;
    }
}