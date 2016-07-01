<?php

namespace Douyasi\Data;

use App\Interfaces\IData;
use Douyasi\AppException;

abstract class BaseData implements IData
{

    /**
     * The Model instance.
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The table name in database query operation
     *
     * @var string
     */
    protected $table;

    /**
     * Get Model by id.
     *
     * @param  int $id
     * @return App\Model|Douyasi\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get the database query Builder instance
     *
     * @return \Illuminate\Database\Query\Builder|AppException
     */
    public function query()
    {
        if(isset($this->table) && is_string($this->table)) {
            return $this->query = app('db')->table($this->table);
        } else {
            throw new AppException('No table have set and the table name must be a string !');
        }
    }

    /**
     * Void function for find() , you can overwrite in your derived class
     *
     * @param  int|string $id 主键ID
     * @param  string|array $extra 可选额外传入的参数
     * @return void
     */
    public function find($id, $extra = '')
    {
        return;
    }

}
