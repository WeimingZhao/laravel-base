<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Models\Foundation\User;
use App\Models\Foundation\UserLog;
use App\Repositories\Foundation\UserRepository;
use App\Services\Foundation\Auth\Acl;
use App\Services\Foundation\Auth\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IController extends Controller
{
    public function index()
    {
        $list = UserLog::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(20);
        $user = Auth::user();
        return view('admin.foundation.i.index')->with(compact('list', 'user'));
    }

    public function password(Request $request)
    {
        if ($request->method() == 'POST') {
            $old_password = $request->get('old_password');
            $password = $request->get('password');
            $password_confirmation = $request->get('password_confirmation');
            $repository = new UserRepository();
            return $repository->ipassword(Auth::id(), $old_password, $password, $password_confirmation);
        }
        return view('admin.foundation.i.password');
    }

    public function map()
    {
        $maps = Acl::simpleAcl();
        $data = array();
        foreach ($maps as $item) {
            $arr = array();
            $arr['id'] = $item['id'];
            $arr['pId'] = $item['pid'];
            $arr['name'] = $item['title'];
            $arr['open'] = 'true';
            //除了第一级菜单
            if ($item['level'] > 0) {
                $arr['url'] = route($item['name']);
            }
            array_push($data, $arr);
        }
        $json = json_encode($data);
        return view('admin.foundation.i.map')->with(compact('json'));
    }
}
