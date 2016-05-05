<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Models\Foundation\LoginLog;
use App\Models\Foundation\UserLog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogController extends Controller
{

    public function index(Request $request)
    {
        $logs = UserLog::orderBy('id', 'desc')->paginate(50);
        return view('admin.foundation.log.index')->with(compact('logs'));
    }

    public function login()
    {
        $logs = LoginLog::orderBy('id', 'DESC')->paginate(30);
        return view('admin.foundation.log.login')->with(compact('logs'));
    }
}
