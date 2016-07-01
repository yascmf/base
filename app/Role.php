<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 建立与 permission 关联关系
     */
    public function perms()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo($permission)
    {
        return $this->perms()->save($permission);
    }

}
