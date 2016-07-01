<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use Gate;

/**
 * 权限控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class PermissionController extends BackController
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
        if (Gate::denies('@permission')) {
            $this->middleware('deny403');
        }
    }

    public function index()
    {
        //
        $permissions = $this->role->permissions();  //获取所有权限许可
        return view('admin.back.permission.index', compact('permissions'));
    }
}
