<?php

use Illuminate\Database\Seeder;

class FoundationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['role_id' => 1, 'username' => 'admin', 'password' => '123456', 'realname' => '超级管理员'],
            ['role_id' => 2, 'username' => 'test', 'password' => '123456', 'realname' => '张三'],
            ['role_id' => 3, 'username' => 'test2', 'password' => '123456', 'realname' => '李四'],
            ['role_id' => 4, 'username' => 'test3', 'password' => '123456', 'realname' => '王五'],
            ['role_id' => 5, 'username' => 'test4', 'password' => '123456', 'realname' => '王麻子'],
            ['role_id' => 3, 'username' => 'test5', 'password' => '123456', 'realname' => '陈思'],
            ['role_id' => 3, 'username' => 'test6', 'password' => '123456', 'realname' => '李思思'],
        ];
        foreach ($users as $user) {
            \App\Models\Foundation\User::create($user);
        }
    }
}
