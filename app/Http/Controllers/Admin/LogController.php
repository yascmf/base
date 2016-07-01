<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeRequest;
use Illuminate\Http\Request;
use App\Repositories\SystemRepository;
use Gate;

/**
 * 系统日志控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class LogController extends BackController
{
    /**
     * The SystemRepository instance.
     *
     * @var App\Repositories\SystemRepository
     */
    protected $system;

    public function __construct(SystemRepository $system)
    {
        parent::__construct();
        $this->system = $system;
        if (Gate::denies('@log')) {
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
        /*
        $data = [
            's_operator_realname' => $request->input('s_operator_realname'),
            's_operator_ip' => $request->input('s_operator_ip'),
        ];
        */
        $con = $request->all();
        $where = [];
        if (isset($con['type']) && !empty($con['type'])) {
            $where['type'] = $con['type'];
        }
        if (isset($con['s_operator_realname']) && !empty($con['s_operator_realname'])){
            $where['realname'] = $con['s_operator_realname'];
        }
        if (isset($con['s_operator_ip']) && !empty($con['s_operator_ip'])){
            $where['operator_ip'] = $con['s_operator_ip'];
        }
        $system_logs = $this->system->index($where);

        return view('admin.back.log.index', compact('system_logs'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        if (Gate::denies('log-show')) {
            return deny();
        }
        $sys_log = $this->system->getById($id);
        is_null($sys_log) && abort(404);
        return view('admin.back.log.show', compact('sys_log'));
    }
}
