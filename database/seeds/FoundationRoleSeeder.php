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
            ['title' => '校区管理员', 'mark' => '校级管理员，对学校内数据有操作权限'],
            ['title' => '班主任', 'mark' => '班级管理员，对班级内数据有操作权限'],
            ['title' => '教师','mark' => '普通教师，对科目有操作权限'],
            ['title' => '学生','mark' => '学生，仅浏览权限'],
            ['titile' => '学生家长','mark' => '对指定学生的内容，有浏览权限'],
        ];
        foreach ($roles as $role) {
            \App\Models\Foundation\Role::create($role);
        }
    }
}
