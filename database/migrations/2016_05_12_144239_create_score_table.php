<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comtent')->comment('成绩明细');
            $table->integer('author_id')->comment('导入人id');
            $table->integer('subject')->default(0)->comment('学科ID');
            $table->integer('target_id')->comment('目标ID');
            $table->string('batch', 10)->nullable()->comment('录入批次');
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
        Schema::drop('score');
    }
}
