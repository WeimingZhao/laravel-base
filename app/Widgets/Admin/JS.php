<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/21
 * Time: 02:06
 */

namespace App\Widgets\Admin;


class JS
{
    public function ajaxDelete($url)
    {
        return view('widget.admin.js.ajaxdelete')->with(compact('url'));
    }

    public function ajaxForm($obj = '.ajaxForm')
    {
        return view('widget.admin.js.ajaxform')->with(compact('obj'));
    }
}