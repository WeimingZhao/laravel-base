<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comtent')->comment('留言内容');
            $table->integer('author_id')->comment('作者id');
            $table->integer('type')->default(1)->comment('留言类型');
            $table->integer('target_id')->comment('留言目标');
            $table->softDeletes();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zone');
    }
}
