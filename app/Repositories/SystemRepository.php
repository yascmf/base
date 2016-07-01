<?php

namespace App\Repositories;

use App\SystemOption;
use App\SystemLog;

/**
 * 系统相关仓库SystemRepository
 * [包括对系统配置与系统日志模型操作]
 *
 * @author raoyc<raoyc2009@gmail.com>
 */
class SystemRepository extends BaseRepository
{

    /**
     * The SystemOption instance.
     *
     * @var App\SystemOption
     */
    protected $option;

    /**
     * Create a new RolePermissionRepository instance.
     *
     * @param  App\SystemLog $log
     * @param  App\SystemOption $option
     * @return void
     */
    public function __construct(
        SystemLog $log,
        SystemOption $option)
    {
        $this->model = $log;
        $this->option = $option;
    }

    /**
     * 获取所有系统配置
     *
     * @return Illuminate\Support\Collection
     */
    public function getAllOptions()
    {
        $options = $this->option->all();
        return $options;
    }

    /**
     * 批量更新系统配置
     *
     * @param  array $data
     * @return void
     */
    public function updateOptions($data)
    {
        $option = new $this->option;
        foreach ($data as $name=>$value) {
            $map = [
                'name' => $name
            ];
            $option->where($map)->update(['value' => e($value)]);
        }
    }


    /**
     * 系统日志资源列表数据
     *
     * @param  array $data
     * @param  array|string $extra
     * @param  string $size 分页大小
     * @return Illuminate\Support\Collection
     */
    public function index($where = [], $extra = '', $size = null)
    {
        if (!ctype_digit($size)) {
            $size = cache('page_size', '10');
        }
        return $this->model->leftJoin('users', 'system_logs.user_id', '=', 'users.id')
                          ->select('system_logs.*', 'users.username', 'users.username', 'users.realname')
                          ->where(function ($query) use ($where) {
                                if (isset($where['realname'])) {
                                    $query->where('users.realname', 'like', '%'.e($where['realname']).'%');
                                }
                                if (isset($where['type'])) {
                                    $query->where('type', $where['type']);
                                 }
                                if (isset($where['operator_ip'])) {
                                    $query->where('operator_ip', e($where['operator_ip']));
                                }
                            })
                          ->orderBy('created_at', 'desc')
                          ->paginate($size);
    }

    #********
    #* 空写未使用的接口函数update与edit START
    #********
    public function edit($id = 0, $extra = '') {
        return;
    }
    public function update($id = 0, $inputs = [], $extra = '') {
        return;
    }
    public function store($inputs = [], $extra = '') {
        return;
    }
    #********
    #* 空写未使用的接口函数update与edit END
    #********

}
