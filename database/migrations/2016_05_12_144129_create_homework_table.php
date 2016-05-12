<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable()->comment('作业标题');
            $table->text('comtent')->comment('作业内容');
            $table->integer('author_id')->comment('作者id');
            $table->integer('type')->default(1)->comment('作业类型');
            $table->integer('target_id')->comment('作业对象');
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
        Schema::drop('homework');
    }
}
