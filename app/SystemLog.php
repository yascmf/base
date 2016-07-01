<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统日志模型
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class SystemLog extends Model
{

    protected $table = 'system_logs';
    
    protected $fillable = ['user_id', 'type', 'url', 'content', 'operator_ip'];

     /**
     * 操作用户
     * 模型对象关系：系统日志对应的操作用户
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
