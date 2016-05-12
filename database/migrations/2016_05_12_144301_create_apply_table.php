<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comtent')->comment('请假理由');
            $table->integer('author_id')->comment('请假人id');
            $table->integer('status')->default(1)->comment('批准状态');
            $table->integer('target_id')->comment('所在班级');
            $table->dateTime('start_time')->comment('请假起始');
            $table->dateTime('end_time')->comment('请假终止');
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
        Schema::drop('apply');
    }
}
