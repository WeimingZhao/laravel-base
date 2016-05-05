<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Models\Foundation\Access;
use App\Repositories\Foundation\AccessRepository;
use App\Services\Tree;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AccessController
 * @package App\Http\Controllers\Admin\Foundation
 *
 * 处理系统功能相关
 */
class AccessController extends Controller
{
    /**
     * @var AccessRepository
     */
    protected $repository;

    /**
     * AccessController constructor.
     * @param AccessRepository $repository
     */
    public function __construct(AccessRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 功能列表
     *
     * @return $this
     */
    public function index()
    {
        $list = Tree::simpleTree(Access::orderBy('sort', 'DESC')->get()->toArray());
        return view('admin.foundation.access.index')->with(compact('list'));
    }

    /**
     * 创建新功能
     *
     * @param Request $request
     * @return $this|mixed
     */
    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['pid', 'name', 'title', 'display', 'acl', 'image', 'mark']);
            return $this->repository->create($data);
        }
        $fontawesome = config('foundation.fontawesome');
        $list = Access::orderBy('sort', 'DESC')->get()->toArray();
        $list = Tree::simpleTree($list);
        return view('admin.foundation.access.create')->with(compact('fontawesome', 'list'));
    }

    /**
     * 编辑更新功能
     *
     * @param Request $request
     * @return $this|mixed|string
     */
    public function update(Request $request)
    {
        $id = intval($request->get('id'));
        if ($request->method() == 'POST') {
            $data = $request->only(['pid', 'name', 'title', 'display', 'acl', 'image', 'mark']);
            return $this->repository->update($id, $data);
        }
        $json = Access::findOrFail($id)->toJson();
        $fontawesome = config('foundation.fontawesome');
        $list = Access::orderBy('sort', 'DESC')->get()->toArray();
        $list = Tree::simpleTreeExceptSelf($list, $id);
        return view('admin.foundation.access.update')->with(compact('list', 'json', 'fontawesome'));
    }

    /**
     * 删除功能
     *
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        $id = intval($request->get('id'));
        return $this->repository->delete($id);
    }

    /**
     * 对功能进行排序
     *
     * @param Request $request
     * @return string
     */
    public function sort(Request $request)
    {
        $data = $request->all();
        return $this->repository->sort($data);
    }
}
