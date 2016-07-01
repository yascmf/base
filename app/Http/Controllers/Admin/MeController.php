<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Gate;

/**
 * 我的账户控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class MeController extends BackController
{


    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user;


    public function __construct(
        UserRepository $user)
    {
        parent::__construct();
        if (Gate::denies('@me')) {
            $this->middleware('deny403');
        }
        $this->user = $user;
    }


    /**
     * 个人资料页面
     *
     * @return Response
     */
    public function getMe()
    {
        $me = auth()->user();
        return view('admin.back.me.index', compact('me'));
    }


    /**
     * 提交修改个人资料
     *
     * @return Response
     */
    public function putMe(MeRequest $request)
    {
        if (Gate::denies('me-write')) {
            return deny();
        }
        //使用Bootstrap后台框架，可以废弃ajax提交方式，使用表单自动验证
        $this->user->updateMe(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新个人资料！');
    }
}
