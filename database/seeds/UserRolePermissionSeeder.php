<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * 生成 管理员 角色 权限 等复杂关系数据
 * 
 * @author raoyc
 */
class UserRolePermissionSeeder extends Seeder
{
    /**
     * @var array 角色
     */
    protected $roles = [
        'Admin' => '普通管理员',  // 默认拥有所有功能
        'Founder' => '创始人',  // 建议分配用户、角色、权限相关功能
        'Editor' => '编辑',  // 建议分配文章、分类相关功能
        'Demo' => '演示',  // 建议分配只读类功能
    ];

    /**
     * @var array 权限
     */
    protected $permissions = [
        // 系统基础权限START
        /* -- YASCMF/BASE YASCMF/API YASCMF/ADMIN 基础权限 START -- */
        /* 特别注意: `member` 与 `tag` 功能组件只在前后端分离版本（即 YASCMF/API 与 YASCMF/ADMIN 两者）中实现 */
        '@member'             => '会员',
        'member-show'         => '会员查看',
        'member-block'        => '会员冻结',
        'member-search'       => '会员搜索',
        '@article'            => '文章',
        'article-show'        => '文章查看',
        'article-write'       => '文章写入',
        'article-search'      => '文章搜索',
        '@category'           => '分类',
        'category-show'       => '分类查看',
        'category-write'      => '分类写入',
        '@me'                 => '个人资料',
        'me-write'            => '个人资料写入',
        '@user'               => '用户',
        'user-write'          => '用户写入',
        'user-search'         => '用户搜索',
        '@role'               => '角色',
        'role-write'          => '角色写入',
        '@permission'         => '权限',
        '@option'             => '系统配置',
        'option-write'        => '系统配置写入',
        '@log'                => '系统日志',
        'log-show'            => '系统日志查看',
        'log-search'          => '系统日志搜索',
        '@tag'                => '标签',
        'tag-show'            => '标签查看',
        'tag-write'           => '标签写入',
        'tag-search'          => '标签搜索',
        /* -- YASCMF/BASE YASCMF/API YASCMF/ADMIN 基础权限 END -- */
        // 系统基础权限END

        // 系统二次开发权限START
        /* -- YASCMF/ECMS 版本二开权限 START -- */
        '@page'           => '单页',
        'page-show'       => '单页查看',
        'page-write'      => '单页写入',
        'page-search'     => '单页搜索',
        '@fragment'       => '碎片',
        'fragment-show'   => '碎片查看',
        'fragment-write'  => '碎片写入',
        'fragment-search' => '碎片搜索',
        '@picture'        => '图链',
        'picture-show'    => '图链查看',
        'picture-write'   => '图链写入',
        'picture-search'  => '图链搜索',
        /* -- YASCMF/ECMS 版本二开权限 END -- */
    
        /* 
        TODO  这里开发者可以新增自己二开的权限
        */

        // 系统二次开发权限END
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s');

        // 生成角色
        $roles = $this->roles;
        $rolesData = [];
        foreach ($roles as $k => $v) {
            $rolesData[] = [
                'name' => $k,
                'display_name' => $v,
                'created_at' => $time,
                'updated_at' => $time,
            ];
        }

        DB::table('roles')->insert($rolesData);

        // 生成权限
        $permissions = $this->permissions;
        $permissionsData = [];
        foreach ($permissions as $k => $v) {
            $data[] = [
                'name' => $k,
                'display_name' => $v,
                'created_at' => $time,
                'updated_at' => $time,
            ];
        }
        DB::table('permissions')->insert($permissionsData);

        // 生成普通管理员
        $adminId = DB::table('users')->insertGetId([
            'username' => 'admin',
            'email' => 'admin@example.com',
            // 'password' => bcrypt('admin'),
            'password' => app('hash')->make('admin'),
            'nickname' => 'yascmf',
            'phone' => '888888888888',
            'realname' => '芽丝网',
            'is_locked' => 0,
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        // 生成角色与用户关系表
        $role = DB::table('roles')->where('name', 'Admin')->first();
        DB::table('role_user')->insert([
            'user_id' => $adminId,
            'role_id' => $role->id,
        ]);

        // 生成权限与角色对应关系
        $permissions = DB::table('permissions')->get();
        $data = [];
        foreach ($permissions as $permission) {
            $data[] = [
                'permission_id' => $permission->id,
                'role_id' => $role->id,
            ];
        }
        /* 将所有权限赋给 Admin 角色 */
        DB::table('permission_role')->insert($data);
    }
}
