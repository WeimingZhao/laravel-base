<?php

use Illuminate\Database\Seeder;

class FoundationConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'test', 'title' => 'test', 'type' => 'text', 'group' => 1, 'value' => 'eee'],
            ['name' => 'test1', 'title' => 'test111', 'type' => 'textarea', 'group' => 2, 'value' => 'eee'],
            ['name' => 'test2', 'title' => 'test222', 'type' => 'boolean', 'group' => 3, 'value' => '0'],
            ['name' => 'test3', 'title' => 'test333', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test4', 'title' => 'test444', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test5', 'title' => 'test555', 'type' => 'text', 'group' => 1, 'value' => 'eee'],
            ['name' => 'test6', 'title' => 'test666', 'type' => 'text', 'group' => 3, 'value' => 'eee'],
            ['name' => 'test7', 'title' => 'test777', 'type' => 'image', 'group' => 2, 'value' => ''],
            ['name' => 'test8', 'title' => 'test888', 'type' => 'boolean', 'group' => 3, 'value' => '1'],
            ['name' => 'test9', 'title' => 'test999', 'type' => 'image', 'group' => 3, 'value' => ''],
            ['name' => 'test10', 'title' => 'test1000', 'type' => 'textarea', 'group' => 1, 'value' => 'eee'],
            ['name' => 'test11', 'title' => 'test10001', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test12', 'title' => 'test100021', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test13', 'title' => 'test100031', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test14', 'title' => 'test100041', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test15', 'title' => 'test1000a1', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test16', 'title' => 'test1000ef1', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test17', 'title' => 'test1000a1', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test18', 'title' => 'test1000fe1', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test19', 'title' => 'test1000a1', 'type' => 'image', 'group' => 1, 'value' => ''],
            ['name' => 'test20', 'title' => 'test1000ee1', 'type' => 'image', 'group' => 1, 'value' => ''],
        ];
        foreach ($data as $item) {
            \App\Models\DbConfig::create($item);
        }
    }
}
