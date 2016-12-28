<?php

namespace Douyasi\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 内容模型
 */
class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'id';

    protected $fillable = [
                            'title',
                            'flag',
                            'thumb',
                            'slug',
                            'cid',
                            'description',
                            'content',
                        ];

    public function category()
    {
        //模型名 外键 本键
        return $this->hasOne('Douyasi\Models\Category', 'id', 'cid');
    }

}
