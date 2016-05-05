<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/29
 * Time: 04:08
 */

namespace App\Widgets\Admin;


class Home
{
    public function server()
    {
        $s = [
            'os' => php_uname('s') . ' ' . php_uname('r'),
            'php_version' => PHP_VERSION,
            'mysql_version' => '',
            'zend_version' => zend_version(),
            'gd_version' => gd_info()['GD Version'],
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'host' => $_SERVER["HTTP_HOST"],
            'ip' => gethostbyname($_SERVER['SERVER_NAME']),
            'software' => $_SERVER['SERVER_SOFTWARE'],
            'port' => $_SERVER['SERVER_PORT'],
            'language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
        ];
        return view('widget.admin.home.server')->with(compact('s'));
    }

    public function developer()
    {
        return view('widget.admin.home.developer');
    }
}