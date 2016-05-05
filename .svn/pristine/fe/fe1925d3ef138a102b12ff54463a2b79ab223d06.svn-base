<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Services\Foundation\Auth\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['captcha']);
            $username = $request->get('username');
            $password = $request->get('password');

            $validator = Validator::make($data, [
                'captcha' => 'required|captcha',
            ]);
            if ($validator->fails()) {
                Session::flash('msg', '验证码错误!');
                Session::flash('username', $username);
                return redirect()->back();
            } else if (is_null($username) || is_null($password)) {
                Session::flash('msg', '用户名或者密码输入为空!');
                Session::flash('username', $username);
                return redirect()->back();
            }
            //登录成功
            if (Auth::login($username, $password)) {
                return redirect(route('foundation.home.index'));
            } else {
                Session::flash('msg', '用户名或者密码错误!');
                Session::flash('username', $username);
                return redirect()->back();
            }
        }
        return view('admin.foundation.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('foundation.auth.login'));
    }
}
