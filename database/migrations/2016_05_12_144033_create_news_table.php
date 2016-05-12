<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable()->comment('新闻标题');
            $table->text('comtent')->comment('新闻内容');
            $table->integer('author_id')->comment('作者id');
            $table->integer('type')->default(1)->comment('新闻类型');
            $table->integer('target_id')->comment('新闻目标');
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
        Schema::drop('news');
    }
}
