<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;
use Gate;

/**
 * 角色控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class RoleController extends BackController
{

    /**
     * The RoleRepository instance.
     *
     * @var App\Repositories\RoleRepository
     */
    protected $role;


    public function __construct(
        RoleRepository $role)
    {
        parent::__construct();
        $this->role = $role;

        if (Gate::denies('@role')) {
            $this->middleware('deny403');
        }
    }

    public function index()
    {
        $roles = $this->role->index();
        return view('admin.back.role.index', compact('roles'));
    }

    public function create()
    {
        if (Gate::denies('role-write')) {
            return deny();
        }
        $permissions = $this->role->permissions();  //获取所有权限许可
        return view('admin.back.role.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        //
        if (Gate::denies('role-write')) {
            return deny();
        }
        $data = $request->all();
        $role = $this->role->store($data);
        if ($role->id) {  //添加成功
            return redirect()->to(site_path('role', 'admin'))->with('message', '成功新增角色！');
        } else {  //添加失败
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        //
        if (Gate::denies('role-write')) {
            return deny();
        }
        $role = $this->role->edit($id);
        $permissions = $this->role->permissions();
        $cans = $this->role->getRoleCans($role);

        return view('admin.back.role.edit', compact('role', 'permissions', 'cans'));
    }

    public function update(RoleRequest $request, $id)
    {
        //
        if (Gate::denies('role-write')) {
            return deny();
        }
        $data = $request->all();
        $this->role->update($id, $data);
        return redirect()->to(site_path('role', 'admin'))->with('message', '修改角色成功！');
    }
}
