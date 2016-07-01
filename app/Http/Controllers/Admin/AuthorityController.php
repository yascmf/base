<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Events\UserLogin;
use App\Events\UserLogout;


/**
 * 后台管理员用户登录统一认证
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class AuthorityController extends BackController
{

    /**
     * 添加路由过滤中间件
     */
    public function __construct()
    {
        $this->middleware('multi-site.guest:admin', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        //控制面板路径
        $redirectTo = site_path('dashboard', 'admin');
        //认证凭证
        $credentials = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
            'is_locked' => 0,
        ];
        if (Auth::attempt($credentials, $request->has('remember'))) {
            event(new UserLogin(auth()->user()));  //触发登录事件
            return redirect()->intended($redirectTo);
        } else {
            // 登录失败，跳回
            return redirect()->back()
                             ->withInput()
                             ->withErrors(['attempt' => '“用户名”、“密码”错误或帐号已被锁定，请重新登录或联系超管！']);  //回传错误信息
        }
    }

    public function getLogout()
    {
        @event(new UserLogout(auth()->user()));  //触发登出事件
        Auth::logout();
        return redirect()->to(site_path('auth/login', 'admin'));
    }
}
