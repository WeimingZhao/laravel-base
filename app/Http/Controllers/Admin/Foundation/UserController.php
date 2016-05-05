<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Models\Foundation\Role;
use App\Models\Foundation\User;
use App\Repositories\Foundation\UserRepository;
use App\Services\Foundation\Auth\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $roles = Role::all()->toArray();
        $list = User::paginate(20);
        return view('admin.foundation.user.index')->with(compact('list', 'roles'));
    }

    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['role_id', 'username', 'realname', 'password', 'password_confirmation']);
            return $this->repository->create($data);
        }
        $roles = Role::orderBy('id', 'DESC')->get()->toArray();
        return view('admin.foundation.user.create')->with(compact('roles'));
    }

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
}
