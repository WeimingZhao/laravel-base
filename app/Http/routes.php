<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['namespace' => 'File'], function () {
    Route::any('image/{name}/{size?}', ['uses' => 'ImageController@server', 'as' => 'file.image.server']);//图片服务器
    Route::group(['prefix' => 'upload', 'middleware' => ['file']], function () {
        Route::any('uploader', ['uses' => 'UploadController@server', 'as' => 'file.upload.uploader']);//图片/文件上传
        Route::any('ue', ['uses' => 'UEditorController@server', 'as' => 'file.upload.ue']);//ueditor文件管理.上传
        Route::any('um', ['uses' => 'UMeditorController@server', 'as' => 'file.upload.serum']);//umeditor图片上传
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin.log']], function () {
    Route::any('/', ['uses' => 'Foundation\AuthController@login', 'as' => 'foundation.auth.login']);
    Route::get('logout', ['uses' => 'Foundation\AuthController@logout', 'as' => 'foundation.auth.logout']);

    Route::group(['prefix' => 'foundation', 'namespace' => 'Foundation', 'as' => 'foundation.', 'middleware' => ['admin.auth', 'admin.acl']], function () {

        /**
         * 后台首页部分
         */
        Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
            Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);//系统首页,登录默认跳转
            Route::get('map', ['uses' => 'HomeController@map', 'as' => 'map']);//系统首页,登录默认跳转
        });

        /**
         * RBAC 权限控制 功能管理
         */
        Route::group(['prefix' => 'access', 'as' => 'access.'], function () {
            Route::any('/', ['uses' => 'AccessController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'AccessController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'AccessController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'AccessController@delete', 'as' => 'delete']);
            Route::any('sort', ['uses' => 'AccessController@sort', 'as' => 'sort']);
        });

        /**
         * RBAC 权限控制 角色管理
         */
        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::any('/', ['uses' => 'RoleController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'RoleController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'RoleController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'RoleController@delete', 'as' => 'delete']);
            Route::any('sort', ['uses' => 'RoleController@sort', 'as' => 'sort']);
            Route::any('access', ['uses' => 'RoleController@access', 'as' => 'access']);
        });

        /**
         * RBAC 权限控制 用户管理
         */
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::any('/', ['uses' => 'UserController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'UserController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'UserController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'UserController@delete', 'as' => 'delete']);
            Route::any('password', ['uses' => 'UserController@password', 'as' => 'password']);
        });

        /**
         * 系统通用的的数据库方式配置管理
         */
        Route::group(['prefix' => 'config', 'as' => 'config.'], function () {
            Route::any('/', ['uses' => 'ConfigController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'ConfigController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'ConfigController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'ConfigController@delete', 'as' => 'delete']);
            Route::any('sort', ['uses' => 'ConfigController@sort', 'as' => 'sort']);
            Route::any('group', ['uses' => 'ConfigController@group', 'as' => 'group']);
        });

        Route::group(['prefix' => 'i', 'as' => 'i.'], function () {
            Route::any('/', ['uses' => 'IController@index', 'as' => 'index']);
            Route::any('password', ['uses' => 'IController@password', 'as' => 'password']);
            Route::any('map', ['uses' => 'IController@map', 'as' => 'map']);
        });

        /**
         * 系统操作日志
         */
        Route::group(['prefix' => 'log', 'as' => 'log.'], function () {
            Route::any('/', ['uses' => 'LogController@index', 'as' => 'index']);
            Route::any('login', ['uses' => 'LogController@login', 'as' => 'login']);//用户登录日志
        });

    });


});

Route::any('/wechat', 'Wechat\IndexController@serve');
Route::get('/wechat/index/{token}/{timestamp}/{nonce}/', ['uses' => 'WeChat\IndexController@index', 'as' => 'wechat.index.index']);


Route::get('/news/index', ['uses' => 'NewsController@index', 'as' => 'news.index']);
Route::get('/news/detail', ['uses' => 'NewsController@detail', 'as' => 'news.detail']);

Route::get('/excel/export', ['uses' => 'ExcelController@export', 'as' => 'excel.export']);
Route::get('/excel/import', ['uses' => 'ExcelController@import', 'as' => 'excel.import']);

Route::get('/user/create',['uses'=>'UserController@create', 'as' => 'user.create']);
