<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*-----
文档站点路由群组 START
-----*/
Route::group(['prefix' => config('site.route.prefix.doc', 'docs'), 'middleware' => ['block:doc', 'web']], function () {

    Route::get('index', function() {
        return redirect(config('site.route.prefix.doc', 'docs').'/readme.md');
    });
    Route::get('{path}.md', 'MarkdownController@getMarkdownDoc')->where('path', '[A-Za-z0-9_/\-]+');

});
/*-----
文档站点路由群组 END
-----*/


/*-----
桌面站点路由群组 START
-----*/
$_dp = config('site.route.prefix.desktop', '');
Route::group(['prefix' => $_dp, 'namespace' => 'Desktop', 'middleware' => ['block:desktop', 'web']], function () {

    //桌面站主页
    Route::get('/', 'HomeController@getIndex');

    //设置语言版本
    Route::get('lang', 'HomeController@getLang');

});
/*-----
桌面站点路由群组 END
-----*/


/*-----
API站点路由群组 START
-----*/
$_mp = config('site.route.prefix.api', 'api');
Route::group(['prefix' => $_mp, 'namespace' => 'API', 'middleware' => ['block:api', 'web']], function () {

    Route::get('/', 'HomeController@getIndex');

    //IP查询服务
    Route::get('ip', 'HomeController@getIP');

    //身份证查询服务
    Route::get('identity-card', 'HomeController@getIdentityCard');
});
/*-----
API站点路由群组 END
-----*/


/*-----
管理后台站点路由群组 START
-----*/
$_ap = config('site.route.prefix.admin', 'admin');
Route::group(['prefix' => $_ap, 'namespace' => 'Admin', 'middleware' => ['block:admin', 'web']], function () {

    Route::get('/', function() {
        return redirect(config('site.route.prefix.admin', 'admin').'/auth/login');
    });

    Route::group(['prefix' => 'auth'], function () {
        $Authority = 'AuthorityController@';
        # 退出
        Route::get('logout', $Authority.'getLogout');
        # 登录
        Route::get('login', $Authority.'getLogin');
        Route::post('login', $Authority.'postLogin');
    });



    Route::group(['prefix' => '', 'middleware' => ['multi-site.auth:admin']], function () {

        Route::get('dashboard', 'DashboardController@getIndex');

        //重建缓存
        Route::get('cache', 'AssistantController@getRebuildCache');

        //开发演示
        Route::get('demo/form', 'DemoController@getForm');
        Route::get('demo/icon', 'DemoController@getIcon');

        //文件上传
        Route::get('upload/picture', 'AssistantController@getUploadPicture');
        Route::get('upload/document', 'AssistantController@getUploadDocument');
        Route::post('upload/picture', 'AssistantController@postUploadPicture');
        Route::post('upload/document', 'AssistantController@postUploadDocument');

        //用户管理
        Route::get('me', 'MeController@getMe');
        Route::put('me', 'MeController@putMe');

        Route::resource('user', 'UserController');
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');

        //系统管理
        Route::get('option', 'OptionController@getOption');
        Route::put('option', 'OptionController@putOption');
        Route::resource('log', 'LogController');
    });

});
/*-----
管理后台站点路由群组 END
-----*/
