<?php

namespace App\Http\Controllers\WeChat;
use App\Services\Foundation\Log\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Wechat;

class IndexController extends Controller
{


	public function index()
	{
			
	}

	public function serve()
	{
		$wechat = app('wechat');
		return $wechat->server->serve();
	}



}