<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->unique()->comment('配置名称');
            $table->string('title', 32)->comment('配置标题');
            $table->string('type', 16)->index()->comment('配置类型');
            $table->integer('group')->index()->commnet('配置组');
            $table->text('value')->comment('配置值');
            $table->string('mark')->comment('配置说明');
            $table->boolean('status')->index()->comment('0:不可修改,1:可修改');
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
        Schema::drop('db_configs');
    }
}
