<?php

use Illuminate\Database\Seeder;

class FoundationRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['title' => '超级管理员', 'mark' => '超级管理员,具有全部系统权限,不能删除,请勿随意授权'],
            ['title' => '用户管理员', 'mark' => '用户管理员,负责管理系统的用户'],
            ['title' => '系统管理员', 'mark' => '管理系统'],
            ['title' => '总编辑'],
            ['title' => '编辑']
        ];
        foreach ($roles as $role) {
            \App\Models\Foundation\Role::create($role);
        }
    }
}
