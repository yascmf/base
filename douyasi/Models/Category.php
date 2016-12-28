<?php

namespace Douyasi\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 分类模型
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
                            'name',
                            'sort',
                            'slug',
                        ];

}
