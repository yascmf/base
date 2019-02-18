<?php

namespace Douyasi\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'type',
        'descript',
        'ref_count'
    ];

    public static function getTagsFormat()
    {
        $tags       = parent::all();
        $tags       = objectToArray($tags);
        $_tags = [];
        foreach ($tags as $v) {
            $_tags[$v['id']] = $v['name'];
        }

        return $_tags;
    }
}
