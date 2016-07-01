<?php

namespace App\Interfaces;

/**
 * 定义数据层接口[主要为只读数据]
 *
 * @author raoyc<raoyc2009@gmail.com>
 */
Interface IData
{

    /**
     * 资源列表
     *
     * @param  array $data 必须传入与模型查询相关的数据
     * @param  string|array $extra 可选额外传入的参数
     * @param  string $size 分页大小（存在默认值）
     * @return Illuminate\Support\Collection|Object-Array (Collection)结果集对象|对象数组
     */
    public function index($data, $extra, $size);

    /**
     * 特定ID资源
     *
     * @param  int|string $id 主键ID
     * @param  string|array $extra 可选额外传入的参数
     * @return App\Model|Qucheng\Models\Model|Object (模型)对象
     */
    public function find($id, $extra);

}
