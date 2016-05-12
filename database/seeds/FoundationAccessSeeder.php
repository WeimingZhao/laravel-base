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

            ['pid' => 1, 'name' => 'foundation.user.index', 'title' => '用户管理', 'display' => 1, 'level' => 1, 'image' => 'users', 'mark' => '系统用户管理'],//15
            ['pid' => 15, 'name' => 'foundation.user.create', 'title' => '添加用户', 'display' => 1, 'level' => 2, 'image' => 'user-plus', 'mark' => '添加系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.import', 'title' => '导入用户', 'display' => 1, 'level' => 2, 'image' => 'user-plus', 'mark' => '导入系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.update', 'title' => '编辑用户', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '编辑系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.delete', 'title' => '删除用户', 'display' => 0, 'level' => 2, 'image' => 'user-times', 'mark' => '删除系统用户'],
            ['pid' => 15, 'name' => 'foundation.user.password', 'title' => '修改密码', 'display' => 0, 'level' => 2, 'image' => 'key', 'mark' => '修改用户的登录密码'],

            ['pid' => 2, 'name' => 'foundation.config.index', 'title' => '配置管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '系统通用配置列表'], //21
            ['pid' => 21, 'name' => 'foundation.config.create', 'title' => '添加配置', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '添加配置'],
            ['pid' => 21, 'name' => 'foundation.config.update', 'title' => '编辑配置', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '编辑修改配置'],
            ['pid' => 21, 'name' => 'foundation.config.delete', 'title' => '删除配置', 'display' => 0, 'level' => 2, 'image' => 'remove', 'mark' => '删除配置'],
            ['pid' => 21, 'name' => 'foundation.config.sort', 'title' => '排序', 'display' => 0, 'level' => 2, 'image' => 'sort', 'mark' => '对配置进行排序'],

            ['pid' => 2, 'name' => 'foundation.config.group', 'title' => '配置设置', 'display' => 1, 'level' => 1, 'image' => 'wrench', 'mark' => '根据组配置参数'],//26
            ['pid' => 2, 'name' => 'foundation.log.index', 'title' => '系统日志', 'display' => 1, 'level' => 1, 'image' => 'history', 'mark' => '后台系统操作日志'],//27
            ['pid' => 2, 'name' => 'foundation.log.login', 'title' => '用户登录日志', 'display' => 1, 'level' => 1, 'image' => 'history', 'mark' => '用户登录日志'],//28

            ['pid' => 1, 'name' => 'foundation.i.index', 'title' => '个人资料', 'display' => 0, 'acl' => 0, 'level' => 1, 'image' => 'key', 'mark' => '我的个人资料'],//29
            ['pid' => 29, 'name' => 'foundation.i.password', 'title' => '修改个人密码', 'display' => 0, 'acl' => 0, 'level' => 2, 'image' => 'key', 'mark' => '修改我的个人密码'],
            ['pid' => 29, 'name' => 'foundation.i.map', 'title' => '功能地图', 'display' => 0, 'acl' => 0, 'level' => 2, 'image' => 'key', 'mark' => '我的功能地图'],
//checked at 160506 15：09
            ['pid' => 1, 'name' => 'foundation.news.index', 'title' => '消息管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '消息列表'], //32
            ['pid' => 32, 'name' => 'foundation.news.create', 'title' => '发布消息', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '发布消息'],
            ['pid' => 32, 'name' => 'foundation.news.update', 'title' => '修改消息', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '修改消息'],
            ['pid' => 32, 'name' => 'foundation.news.detail', 'title' => '浏览消息', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '浏览消息'],
            ['pid' => 32, 'name' => 'foundation.news.delete', 'title' => '删除消息', 'display' => 0, 'level' => 2, 'image' => 'remove', 'mark' => '删除消息'],

            ['pid' => 1, 'name' => 'foundation.apply.index', 'title' => '请假管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '请假列表'], //37
            ['pid' => 37, 'name' => 'foundation.apply.create', 'title' => '请假', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '请假'],
            ['pid' => 37, 'name' => 'foundation.apply.update', 'title' => '请假确认', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '请假确认'],
            ['pid' => 37, 'name' => 'foundation.apply.detail', 'title' => '请假详情', 'display' => 0, 'level' => 2, 'image' => 'plus', 'mark' => '请假详情'],

            ['pid' => 1, 'name' => 'foundation.score.index', 'title' => '成绩管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '成绩总表'], //41
            ['pid' => 41, 'name' => 'foundation.score.import', 'title' => '导入', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '导入成绩'],            
            ['pid' => 41, 'name' => 'foundation.score.detail', 'title' => '成绩明细', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '成绩明细'],
            ['pid' => 41, 'name' => 'foundation.score.delete', 'title' => '删除成绩', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '删除成绩'],

            ['pid' => 1, 'name' => 'foundation.homework.index', 'title' => '作业管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '消息列表'], //45
            ['pid' => 45, 'name' => 'foundation.homework.create', 'title' => '发布作业', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '发布作业'],
            ['pid' => 45, 'name' => 'foundation.homework.update', 'title' => '修改作业', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '修改作业'],            
            ['pid' => 45, 'name' => 'foundation.homework.detail', 'title' => '作业明细', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '作业明细'],
            ['pid' => 45, 'name' => 'foundation.homework.delete', 'title' => '删除作业', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '删除作业'],

            ['pid' => 1, 'name' => 'foundation.zone.index', 'title' => '社区留言列表', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '社区留言列表'], //50 
            ['pid' => 50, 'name' => 'foundation.zone.create', 'title' => '发起留言', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '发起社区留言'],             
            ['pid' => 50, 'name' => 'foundation.zone.detail', 'title' => '社区留言详情', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '社区留言明细'],
            ['pid' => 50, 'name' => 'foundation.zone.delete', 'title' => '删除留言', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '删除留言'],

            ['pid' => 1, 'name' => 'foundation.message.index', 'title' => '通知管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '通知列表'], //54
            ['pid' => 54, 'name' => 'foundation.message.import', 'title' => '发布通知', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '发布通知'],            
            ['pid' => 54, 'name' => 'foundation.message.detail', 'title' => '通知详情', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '通知详情'],
            ['pid' => 54, 'name' => 'foundation.message.update', 'title' => '修改通知', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '修改通知'],
            ['pid' => 54, 'name' => 'foundation.message.delete', 'title' => '删除通知', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '删除通知'],

            ['pid' => 1, 'name' => 'foundation.performance.index', 'title' => '表现管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '表现列表'], //59
            ['pid' => 59, 'name' => 'foundation.performance.import', 'title' => '导入表现', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '导入表现'],            
            ['pid' => 59, 'name' => 'foundation.performance.detail', 'title' => '表现内容', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '表现内容'],
            ['pid' => 59, 'name' => 'foundation.performance.delete', 'title' => '删除表现', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '删除表现'],

            ['pid' => 1, 'name' => 'foundation.profile.index', 'title' => '简介管理', 'display' => 1, 'level' => 1, 'image' => 'cog', 'mark' => '简介列表'], //63
            ['pid' => 63, 'name' => 'foundation.profile.import', 'title' => '导入简介', 'display' => 1, 'level' => 2, 'image' => 'plus', 'mark' => '发布简介'], 
            ['pid' => 63, 'name' => 'foundation.profile.detail', 'title' => '简介内容', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '简介内容'],           
            ['pid' => 63, 'name' => 'foundation.profile.update', 'title' => '修改简介', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '修改简介'],
            ['pid' => 63, 'name' => 'foundation.profile.delete', 'title' => '删除简介', 'display' => 0, 'level' => 2, 'image' => 'edit', 'mark' => '删除简介'],
        ];
        foreach ($datas as $data) {
            \App\Models\Foundation\Access::create($data);
        }
    }
}
