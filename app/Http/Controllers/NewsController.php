<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Repositories\Foundation\NewsRepository;
use App\Services\Foundation\Auth\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;




class NewsController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $list = News::orderBy('created_at','desc')->paginate(20);
        return view('news/index')->with(compact('list'));

    }

    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['title', 'type', 'content', 'target_id']);
            return $this->repository->create($data);
        }
    }

    public function detail(Request $request)
    {
        if ($request->method() == 'GET') {
            $id = $request->only(['id']);
            $detail = News::where(Find($id));
            print_r($detail);
        }
    }

/*
    public function update(Request $request)
    {
        $id = intval($request->get('id'));
        //验证具备权限
        if (!can_user($id)) {
            return abort(404);
        }
        if ($request->method() == 'POST') {
            $data = $request->only(['role_id', 'realname']);
            return $this->repository->update($id, $data);
        }
        $json = User::findOrFail($id)->toJson();
        $roles = Role::orderBy('id', 'DESC')->get()->toArray();
        return view('admin.foundation.user.update')->with(compact('roles', 'json'));
    }

    public function delete(Request $request)
    {
        $id = intval($request->get('id'));
        //验证具备权限
        if (!can_user($id)) {
            return abort(404);
        }
        return $this->repository->delete($id);
    }

    public function password(Request $request)
    {
        $id = intval($request->get('id'));
        //验证具备权限
        if (!can_user($id)) {
            return abort(404);
        }
        if ($request->method() == 'POST') {
            $data = $request->only(['password', 'password_confirmation']);
            return $this->repository->password($id, $data);
        }
        return view('admin.foundation.user.password')->with(compact('id'));
    }
    */
}
