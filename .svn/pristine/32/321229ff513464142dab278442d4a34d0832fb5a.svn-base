<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Models\Foundation\Access;
use App\Models\Foundation\Role;
use App\Repositories\Foundation\RoleRepository;
use App\Services\Tree;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin\Foundation
 *
 * 处理角色相关
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $repository;

    /**
     * RoleController constructor.
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 角色列表
     *
     * @return $this
     */
    public function index()
    {
        $list = Role::orderBy('sort', 'DESC')->get()->toArray();
        return view('admin.foundation.role.index')->with(compact('list'));
    }

    /**
     * 添加角色
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['title', 'mark']);
            return $this->repository->create($data);
        }
        return view('admin.foundation.role.create');
    }

    /**
     * 编辑更新角色
     *
     * @param Request $request
     * @return $this|mixed
     */
    public function update(Request $request)
    {
        $id = intval($request->get('id'));
        if ($request->method() == 'POST') {
            $data = $request->only(['title', 'mark']);
            return $this->repository->update($id, $data);
        }
        $json = Role::findOrFail($id)->toJson();
        return view('admin.foundation.role.update')->with(compact('json'));
    }

    /**
     * 删除指定角色
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
     * 处理角色排序
     *
     * @param Request $request
     * @return string
     */
    public function sort(Request $request)
    {
        $data = $request->all();
        return $this->repository->sort($data);
    }

    /**
     * 角色的功能和变更处理
     *
     * @param Request $request
     * @return $this
     */
    public function access(Request $request)
    {
        $id = intval($request->get('id'));
        if ($request->method() == 'POST') {
            $json = $request->get('json');
            $data = json_decode($json, true);
            $ids = $data['ids'];
            return $this->repository->updateAccess($id, $ids);
        }
        //角色的功能
        $role = Role::findOrFail($id);
        $accesses = $role->accesses->toArray();
        $role_ids = array_pluck($accesses, 'id');
        //全部功能
        $list = Tree::simpleTree(Access::all()->toArray());
        $data = array();
        foreach ($list as $item) {
            $arr = array();
            $arr['id'] = $item['id'];
            $arr['pId'] = $item['pid'];
            $arr['name'] = $item['title'];
            $arr['open'] = 'true';
            //角色是否拥有这个功能
            if (!empty($role_ids) && in_array($item['id'], $role_ids)) {
                $arr['checked'] = 'true';
            }
            array_push($data, $arr);
        }
        $json = json_encode($data, true);
        return view('admin.foundation.role.access')->with(compact('role', 'json'));
    }
}
