<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 21:20
 */

/*
 * 后台用户权限验证
 */
if (!function_exists('can')) {
    function can($route_name)
    {
        return \App\Services\Foundation\Auth\Acl::can($route_name);
    }
}

/**
 * 验证权限比
 */
if (!function_exists('can_user')) {
    function can_user($uid)
    {
        return \App\Services\Foundation\Auth\Acl::canUser($uid);
    }
}

/*
 * 加载小组件,传入的名字会以目录和类名区别
 * 如Home.Common 就代表Widget目录下的Home/Common.php这个widget
 *
 * @param string $widgetName
 * @return object 返回这个widget对象
 */
if (!function_exists('widget')) {
    function widget($widgetName)
    {
        $widgetNameEx = explode('.', $widgetName);
        if (!isset($widgetNameEx[1])) return false;
        $widgetClass = 'App\\Widgets\\' . $widgetNameEx[0] . '\\' . $widgetNameEx[1];
        if (app()->bound($widgetName)) return app()->make($widgetName);
        app()->singleton($widgetName, function () use ($widgetClass) {
            return new $widgetClass();
        });
        return app()->make($widgetName);
    }
}
/**
 * 为图片服务器生成图片的访问路径
 *
 * @param string $image_name
 * @param string $size
 * @return string
 */
if (!function_exists('route_image')) {
    function route_image($image_name, $size = null)
    {
        $url = DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $image_name;
        if ($size != null) {
            $url .= DIRECTORY_SEPARATOR . $size;
        }
        return $url;
    }

}