<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/19
 * Time: 00:56
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Mockery\Exception;

/**
 * Class Repository
 * @package App\Repositories\Eloquent
 *
 * 用于处理基本的增删改以及一些数据服务
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * 操作成功的标志 SUCCESS ,不是这个则表示失败
     *
     * @var string
     */
    protected $state = 'SUCCESS';

    /**
     * @var
     */
    protected $msg;

    /**
     * @var
     */
    protected $url = '';

    /**
     * 路由后退值
     *
     * @var string
     */
    protected $url_back = 'BACK';

    /**
     * @var
     */
    protected $model;

    public function __construct()
    {
        $this->makeModel();
        $this->msg = trans('foundation.success_message');
    }

    /**
     * 返回数据模型
     *
     * @return Model
     */
    abstract protected function ORM();

    /**
     * @return Model
     */
    protected function makeModel()
    {
        $model = app()->make($this->ORM());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->ORM()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    /**
     * 创建新的数据
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        if ($this->createValidator($data) == true) {
            /*foreach ($data as $k => $v) {
                $this->model->$k = $v;
            }
            $this->model->save();*/
            $this->model->create($data);
        }
        return $this->response();
    }

    /**
     * 新数据创建前验证
     *
     * @param array $data
     * @return bool
     */
    abstract protected function createValidator(array $data);

    /**
     * 更新数据
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        if ($this->updateValidator($id, $data)) {
            $model = $this->model->find($id);
            /*foreach ($data as $k => $v) {
                $model->$k = $v;
            }
            $model->save();*/
            $model->update($data);
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
    abstract protected function updateValidator($id, array $data);

    /**
     * 删除数据
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        if ($this->deleteValidator($id)) {
            $this->model->destroy($id);
        }
        return $this->response();
    }

    /**
     * 数据删除前验证
     *
     * @param $id
     * @return bool
     */
    abstract protected function deleteValidator($id);

    /**
     * 处理排序
     *
     * @param array $data
     * @return string
     */
    public function sort(array $data)
    {
        foreach ($data as $key => $val) {
            $val = intval($val);
            $val = ($val > 999) ? 999 : $val;
            $val = ($val < 0) ? 0 : $val;
            $model = $this->model->find($key);
            $model->update(['sort' => $val]);
        }
        return $this->response();
    }

    /**
     * @return string
     */
    protected function response()
    {
        return $this->responseJson();
    }

    /**
     * @return string
     */
    protected function responseJson()
    {
        $result = [
            'state' => $this->state,
            'msg' => is_array($this->msg) ? join('<br/>', $this->msg) : $this->msg,
            'url' => $this->url
        ];
        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return array
     */
    protected function responseArray()
    {
        return [
            'state' => $this->state,
            'msg' => $this->msg,
            'url' => $this->url
        ];
    }

    /**
     * @return view
     */
    protected function responseView()
    {
    }
}