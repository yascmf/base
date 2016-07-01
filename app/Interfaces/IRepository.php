<?php 

namespace App\Interfaces;

/**
 * 定义仓库接口[该接口主要用于Eloquent ORM]
 * 需特别说明下，为了快捷开发权限认证类，跟 会员/(管理员)用户认证、 权限与角色 相关的 操作采用 Eloquent ORM 模型来实现，其它的可读写数据直接采用查询构造器(Query Builder)方法来实现
 * 
 *
 * @author raoyc<raoyc2009@gmail.com>
 */
interface IRepository
{

    #********
    #* 与资源 REST 相关的接口函数 START
    #********

    /**
     * 资源列表
     *
     * @param  array $data 必须传入与模型查询相关的数据
     * @param  string|array $extra 可选额外传入的参数
     * @param  string $size 分页大小（存在默认值）
     * @return mixed Illuminate\Support\Collection
     */
    public function index($data, $extra, $size);

    /**
     * 存储资源
     *
     * @param  array $inputs 必须传入与存储模型相关的数据
     * @param  string|array $extra 可选额外传入的参数
     * @return mixed Illuminate\Database\Eloquent\Model
     */
    public function store($inputs, $extra);

    /**
     * 编辑特定id资源
     *
     * @param  int $id 资源id
     * @param  string|array $extra 可选额外传入的参数
     * @return App\Model
     */
    public function edit($id, $extra);

    /**
     * 更新特定id资源
     *
     * @param  int $id 资源id
     * @param  array $inputs 必须传入与更新模型相关的数据
     * @param  string|array $extra 可选额外传入的参数
     * @return void
     */
    public function update($id, $inputs, $extra);

    /**
     * 删除特定id资源
     *
     * @param  int $id 资源id
     * @param  string|array $extra 可选额外传入的参数
     * @return void
     */
    public function destroy($id, $extra);

    #********
    #* 与资源 REST 相关的接口函数 END
    #********
}
