<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles',function(Blueprint $table){
            $table->increments('id');
            $table->string('title',30)->unique()->comment('角色名称');
            $table->tinyInteger('level')->default(0)->comment('角色等级:低等级用户不能修改高等级');
            $table->boolean('status')->default(1)->index()->comment('角色状态:0禁用,1正常');
            $table->string('mark')->nullable()->comment('备注');
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_roles');
    }
}
