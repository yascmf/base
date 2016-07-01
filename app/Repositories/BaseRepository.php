<?php

namespace App\Repositories;

use App\Interfaces\IRepository;

abstract class BaseRepository implements IRepository
{

    /**
     * The Model instance.
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Get Model by id.
     *
     * @param  int $id
     * @return App\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }


    /**
     * IRepository接口destory方法
     * [为保证数据完整性，一般不 销毁/删除 某数据对象，故此接口方法废弃不用，只空写实现体]
     * 
     * @param  int $id
     * @param  string|array $extra
     * @return void
     */
    public function destroy($id = 0, $extra = '')
    {
        return;
    }


}
