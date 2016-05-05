<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/21
 * Time: 20:55
 */

namespace App\Repositories\Foundation;


use App\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ConfigRepository extends Repository
{

    /**
     * 返回数据模型
     *
     * @return Model
     */
    protected function ORM()
    {
        return 'App\Models\DbConfig';
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
            'group' => 'required|integer',
            'type' => 'required|max:16',
            'title' => 'required|max:32',
            'name' => 'required|max:32',
            'value' => 'max:10000',
            'mark' => 'max:255',
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
        return true;
    }

    /**
     * 根据id和value更新配置值
     *
     * @param array $data
     * @return string
     */
    public function updateGroupValue(array  $data)
    {
        if (empty($data)) {
            $this->state = 'failed';
            $this->msg = '参数错误';
            return $this->response();
        }
        foreach ($data as $key => $val) {
            $config = $this->model->findOrFail($key);
            $config->value = $val;
            $config->save();
        }
        return $this->response();
    }
}