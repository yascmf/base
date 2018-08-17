<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return url('/');
});
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
API站点路由群组 START
-----*/
$_mp = config('site.route.prefix.api', 'api');
Route::group(['prefix' => $_mp, 'namespace' => 'API', 'middleware' => ['block:api', 'web']], function () {

    Route::get('/', 'HomeController@getIndex');

    //汉字转拼音
    Route::get('pinyin', 'HomeController@getPinyin');
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

            /*
             * ----------------------------------------
             * 自定义二次开发区域 START
             * ----------------------------------------
             */

            //内容管理
            #分类
            Route::resource('category', 'CategoryController')->middleware('can:@category');
            #文章
            Route::resource('article', 'ArticleController')->middleware('can:@article');
            #图链
            Route::resource('picture', 'PictureController')->middleware('can:@picture');

            //自定义模型管理
            
            /*
             * ----------------------------------------
             * 自定义二次开发区域 END
             * ----------------------------------------
             */

        //用户管理
        Route::get('me', 'MeController@getMe')->middleware('can:@me');
        Route::put('me', 'MeController@putMe')->middleware('can:me-write');

        Route::resource('user', 'UserController')->middleware('can:@user');
        Route::get('user/purview/{rid}', 'UserController@getPurview')->middleware('can:@user');
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController')->middleware('can:@permission');

        //系统管理
        Route::get('option', 'OptionController@getOption')->middleware('can:@option');
        Route::put('option', 'OptionController@putOption')->middleware('can:@option-write');
        Route::resource('log', 'LogController')->middleware('can:@log');
    });

});
/*-----
管理后台站点路由群组 END
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

    # 展示分类
    Route::get('{category}', 'HomeController@getCategory');

    # 展示文章
    Route::get('{category}/{article}.html', 'HomeController@getArticle');

});
/*-----
桌面站点路由群组 END
-----*/