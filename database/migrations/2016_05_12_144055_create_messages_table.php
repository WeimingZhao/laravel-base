<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable()->comment('消息标题');
            $table->text('comtent')->comment('消息内容');
            $table->integer('author_id')->comment('作者id');
            $table->integer('type')->default(1)->comment('消息类型');
            $table->integer('target_id')->comment('消息目标');
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
        Schema::drop('messages');
    }
}
