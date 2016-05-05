<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_access', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0)->index()->comment('父节点id');
            $table->string('name')->comment('节点标志:module.class.action');
            $table->string('title')->comment('节点名称');
            $table->boolean('display')->default(1)->index()->comment('菜单:0不显示,1显示');
            $table->boolean('acl')->default(1)->index()->comment('是否需要权限才能访问');
            $table->tinyInteger('level')->default(0)->index()->comment('第几级菜单');
            $table->tinyInteger('sort')->default(0)->index()->comment('排序');
            $table->string('mark')->nullable()->comment('备注');
            $table->string('image', 32)->nullable()->comment('图标');
//            $table->string('url')->nullable()->comment('url地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_access');
    }
}
