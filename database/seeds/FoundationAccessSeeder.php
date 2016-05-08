<?php

use Illuminate\Database\Seeder;

class FoundationAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['pid' => 0, 'name' => 'foundation.home', 'title' => '工作台', 'display' => 1, 'acl' => 0, 'level' => 0, 'image' => 'dashboard', 'mark' => '工作台,一级菜单,无实际功能'],
            ['pid' => 0, 'name' => 'foundation.system', 'title' => '系统管理', 'display' => 1, 'level' => 0, 'image' => 'cogs', 'mark' => '系统管理,一级菜单,无实际功能'],
            ['pid' => 1, 'name' => 'foundation.home.index', 'title' => '首页', 'display' => 1, 'acl' => 0, 'level' => 1, 'image' => 'home', 'mark' => '系统首页'],

            ['pid' => 2, 'name' => 'foundation.access.index', 'title' => '功能管理', 'display' => 1, 'level' => 1, 'image' => 'cubes', 'mark' => '系统功能权限及菜单'],//4
            ['pid' => 4, 'name' => 'foundation.access.create', 'title' => '添加功能', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '添加功能'],
            ['pid' => 4, 'name' => 'foundation.access.update', 'title' => '编辑功能', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '编辑修改功能'],
            ['pid' => 4, 'name' => 'foundation.access.delete', 'title' => '删除功能', 'display' => 0, 'level' => 2, 'image' => 'remove', 'mark' => '删除功能'],
            ['pid' => 4, 'name' => 'foundation.role.sort', 'title' => '排序', 'display' => 0, 'level' => 2, 'image' => 'sort', 'mark' => '对功能进行排序'],
            ['pid' => 2, 'name' => 'foundation.role.index', 'title' => '角色管理', 'display' => 1, 'level' => 1, 'image' => 'user', 'mark' => '系统角色管理'],//9
            ['pid' => 9, 'name' => 'foundation.role.create', 'title' => '添加角色', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '添加系统角色'],
            ['pid' => 9, 'name' => 'foundation.role.update', 'title' => '编辑角色', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '编辑系统角色'],
            ['pid' => 9, 'name' => 'foundation.role.delete', 'title' => '删除角色', 'display' => 0, 'level' => 2, 'image' => 'remove', 'mark' => '删除系统角色'],
            ['pid' => 9, 'name' => 'foundation.role.sort', 'title' => '排序', 'display' => 0, 'level' => 2, 'image' => 'sort', 'mark' => '对系统角色排序'],
            ['pid' => 9, 'name' => 'foundation.role.access', 'title' => '角色权限设置', 'display' => 0, 'level' => 2, 'image' => 'cube', 'mark' => '设置角色的权限'],

            ['pid' => 2, 'name' => 'foundation.user.index', 'title' => '用户管理', 'display' => 1, 'level' => 1, 'image' => 'users', 'mark' => '系统用户管理'],//15
            ['pid' => 15, 'name' => 'foundation.user.create', 'title' => '添加用户', 'display' => 1, 'level' => 2, 'image' => 'user-plus', 'mark' => '添加系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.update', 'title' => '编辑用户', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '编辑系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.delete', 'title' => '删除用户', 'display' => 0, 'level' => 2, 'image' => 'user-times', 'mark' => '删除系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.password', 'title' => '修改密码', 'display' => 0, 'level' => 2, 'image' => 'key', 'mark' => '修改用户的登录密码'],

            ['pid' => 2, 'name' => 'foundation.config.index', 'title' => '配置管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '系统通用配置列表'], //20
            ['pid' => 20, 'name' => 'foundation.config.create', 'title' => '添加配置', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '添加配置'],
            ['pid' => 20, 'name' => 'foundation.config.update', 'title' => '编辑配置', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '编辑修改配置'],
            ['pid' => 20, 'name' => 'foundation.config.delete', 'title' => '删除配置', 'display' => 0, 'level' => 2, 'image' => 'remove', 'mark' => '删除配置'],
            ['pid' => 20, 'name' => 'foundation.config.sort', 'title' => '排序', 'display' => 0, 'level' => 2, 'image' => 'sort', 'mark' => '对配置进行排序'],
            ['pid' => 2, 'name' => 'foundation.config.group', 'title' => '配置设置', 'display' => 1, 'level' => 1, 'image' => 'wrench', 'mark' => '根据组配置参数'],//25
            ['pid' => 2, 'name' => 'foundation.log.index', 'title' => '系统日志', 'display' => 1, 'level' => 1, 'image' => 'history', 'mark' => '后台系统操作日志'],//26
            ['pid' => 2, 'name' => 'foundation.log.login', 'title' => '用户登录日志', 'display' => 1, 'level' => 1, 'image' => 'history', 'mark' => '用户登录日志'],//27

            ['pid' => 1, 'name' => 'foundation.i.index', 'title' => '个人资料', 'display' => 0, 'acl' => 0, 'level' => 1, 'image' => 'key', 'mark' => '我的个人资料'],//28
            ['pid' => 28, 'name' => 'foundation.i.password', 'title' => '修改个人密码', 'display' => 0, 'acl' => 0, 'level' => 2, 'image' => 'key', 'mark' => '修改我的个人密码'],
            ['pid' => 28, 'name' => 'foundation.i.map', 'title' => '功能地图', 'display' => 0, 'acl' => 0, 'level' => 2, 'image' => 'key', 'mark' => '我的功能地图'],
        ];
        foreach ($datas as $data) {
            \App\Models\Foundation\Access::create($data);
        }
    }
}
