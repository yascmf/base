<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'nickname', 'realname', 'phone',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //关联角色
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // 判断用户是否具有 某个或某些 角色
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
     
        return !! $role->intersect($this->roles)->count();
    }

    // 判断用户是否具有某权限
    public function hasPermission($permission)
    {
        return $this->hasRole($permission->roles);
    }

    // 给用户分配角色
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    //分配角色
    public function attachRole($role)
    {
        if(is_object($role)) {
            $role = $role->getKey();
        }

        if(is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    //解除角色
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    //分配多个角色
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    //解除多个角色
    public function detachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

}
