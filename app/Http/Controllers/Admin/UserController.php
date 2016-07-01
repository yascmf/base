<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Loggers\SystemLogger;
use App\Repositories\UserRepository;
use Gate;

/**
 * 管理员(用户)资源控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class UserController extends BackController
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
        $this->user = $user;
        if (Gate::denies('@user')) {
            $this->middleware('deny403');
        }
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $data = [
            's_name' => $request->input('s_name'),
            's_phone' => $request->input('s_phone'),
        ];
        $users = $this->user->index($data);

        return view('admin.back.user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        if (Gate::denies('user-write')) {
            return deny();
        }
        $roles = $this->user->role();
        return view('admin.back.user.create', ['roles' => $roles]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        //
        if (Gate::denies('user-write')) {
            return deny();
        }
        $data = $request->all();
        $manager = $this->user->store($data);
        if ($manager->id) {  //添加成功

            //记录系统日志，这里并未使用事件监听来记录日志

            $log = [
                'user_id' => auth()->user()->id,
                'type'    => 'management',
                'content' => '管理员：成功新增一名管理用户'.$manager->username.'<'.$manager->email.'>。',
            ];
            SystemLogger::write($log);

            return redirect()->to(site_path('user', 'admin'))->with('message', '成功新增管理员！');

        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        if (Gate::denies('user-write')) {
            return deny();
        }
        $user = $this->user->edit($id);

        $roles = $this->user->role();

        //一个用户可以拥有多个角色，但在本内容管理框架系统中，限定只能一个用户对应一个角色
        $own_role = $this->user->getRole($user);

        if (is_null($own_role)) {
            //新建的管理员用户可能不存在关联role模型

            $own_role = $this->user->fakeRole();  //伪造一个Role对象，以免报错
        }
        return view('admin.back.user.edit', compact('user', 'roles', 'own_role'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        if (Gate::denies('user-write')) {
            return deny();
        }
        $data = $request->all();
        $this->user->update($id, $data);

        /*
        $log = [
            'user_id' => auth()->user()->id,
            'url'     => _route('admin:user.edit', $id),
            'type'    => 'manager',
            'content' => '管理员：超级管理员修改了id为'.$id.'的管理用户资料。',
        ];

        SystemLogger::write($log);
        */
        return redirect()->to(site_path('user', 'admin'))->with('message', '修改管理员成功！');

    }
}
