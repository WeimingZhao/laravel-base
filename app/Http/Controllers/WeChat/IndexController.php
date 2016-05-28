<?php

namespace App\Http\Controllers\WeChat;
use Illuminate\Http\Request;
use Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Wechat;

class IndexController extends Controller
{


	public function index()
	{

	}

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志


        $wechat = app('wechat');
/*
        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 铜梁校园生活公众号！";
        });
*/

		$wechat->server->setMessageHandler(function ($message) {
		    switch ($message->MsgType) {
		        case 'event':
		            # 事件消息...

		            break;
		        case 'text':
		            # 文字消息...
		        	return "欢迎关注 “铜梁校园生活”，公众号建设中......";
		            break;
		        case 'image':
		            # 图片消息...
		            break;
		        case 'voice':
		            # 语音消息...
		            break;
		        case 'video':
		            # 视频消息...
		            break;
		        case 'location':
		            # 坐标消息...
		            break;
		        case 'link':
		            # 链接消息...
		            break;
		        // ... 其它消息
		        default:
		            # code...
		            break;
		    }

		    // ...
		});
		
        Log::info('return response.');

        return $wechat->server->serve();
    }

    public function getToken()
    {
    	$wechat = app('wechat');
    	$accessToken = $wechat->access_token; // EasyWeChat\Core\AccessToken 实例
		echo $token = $accessToken->getToken();
    }

    public function setBotton()
    {
    	$wechat = app('wechat');
    	$menu = $wechat->menu;
    	$buttons = [
					    [
					        "name"       => "铜梁学校",
					        "sub_button" => [
					            [
					                "type" => "view",
					                "name" => "高级中学",
					                "url"  => "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx059c039dc2a5a6f0&redirect_uri=http://120.26.241.29/news/index?action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
					            ],
					            [
					                "type" => "view",
					                "name" => "初级中学",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "小学",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "幼儿园",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					        ],
					    ],
					    [
					        "name"       => "我的学校",
					        "sub_button" => [
					            [
					                "type" => "view",
					                "name" => "校园快讯",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "我的班级",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "个人中心",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					        ],
					    ],
					    [
					        "name"       => "铜梁生活",
					        "sub_button" => [
					            [
					                "type" => "view",
					                "name" => "合作单位",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "培训机构",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "放心企业",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					            [
					                "type" => "view",
					                "name" => "关于我们",
					                "url"  => "https://mp.weixin.qq.com/"
					            ],
					        ],
					    ],
					];
		$menu->add($buttons);
		$menus = $menu->all();
		dd($menus);
    }
}