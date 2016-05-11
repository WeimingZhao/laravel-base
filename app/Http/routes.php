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

        Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
            Route::any('/', ['uses' => 'NewsController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'NewsController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'NewsController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'NewsController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'NewsController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'apply', 'as' => 'apply.'], function () {
            Route::any('/', ['uses' => 'ApplyController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'ApplyController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'ApplyController@update', 'as' => 'update']);
 //实际无delete 功能
            Route::any('delete', ['uses' => 'ApplyController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'ApplyController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'score', 'as' => 'score.'], function () {
            Route::any('/', ['uses' => 'ScoreController@index', 'as' => 'index']);
            Route::any('import', ['uses' => 'ImportController@import', 'as' => 'import']);
//            Route::any('update', ['uses' => 'ScoreController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'ScoreController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'ScoreController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'homework', 'as' => 'homework.'], function () {
            Route::any('/', ['uses' => 'HomeworkController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'HomeworkController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'HomeworkController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'HomeworkController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'HomeworkController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'zone', 'as' => 'zone.'], function () {
            Route::any('/', ['uses' => 'ZoneController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'ZoneController@create', 'as' => 'create']);
//            Route::any('update', ['uses' => 'ZoneController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'ZoneController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'ZoneController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
            Route::any('/', ['uses' => 'MessageController@index', 'as' => 'index']);
            Route::any('import', ['uses' => 'MessageController@import', 'as' => 'import']);
            Route::any('create', ['uses' => 'MessageController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'MessageController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'MessageController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'MessageController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'performance', 'as' => 'performance.'], function () {
            Route::any('/', ['uses' => 'PerformanceController@index', 'as' => 'index']);
            Route::any('create', ['uses' => 'PerformanceController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'PerformanceController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'PerformanceController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'PerformanceController@detail', 'as' => 'detail']);
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::any('/', ['uses' => 'ProfileController@index', 'as' => 'index']);
            Route::any('import', ['uses' => 'ProfileController@import', 'as' => 'import']);
//            Route::any('create', ['uses' => 'ProfileController@create', 'as' => 'create']);
            Route::any('update', ['uses' => 'ProfileController@update', 'as' => 'update']);
            Route::any('delete', ['uses' => 'ProfileController@delete', 'as' => 'delete']);
            Route::any('detail', ['uses' => 'ProfileController@detail', 'as' => 'detail']);
        });




    });


});

Route::any('/wechat', 'Wechat\IndexController@serve');
Route::get('/wechat/index/{token}/{timestamp}/{nonce}/', ['uses' => 'WeChat\IndexController@index', 'as' => 'wechat.index.index']);


Route::any('/news/create', ['uses' => 'SchoolController@create', 'as' => 'school.create']);
Route::get('/news/index', ['uses' => 'NewsController@index', 'as' => 'news.index']);
Route::get('/news/detail', ['uses' => 'NewsController@detail', 'as' => 'news.detail']);

Route::get('/excel/export', ['uses' => 'ExcelController@export', 'as' => 'excel.export']);
Route::get('/excel/import', ['uses' => 'ExcelController@import', 'as' => 'excel.import']);

Route::get('/user/create',['uses'=>'UserController@create', 'as' => 'user.create']);
Route::any('/', ['uses' => 'SchoolController@index', 'as' => 'school.list']);