<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminUserLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_login_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index()->comment('用户id');
            $table->string('username', 50)->nullable()->comment('用户名');
            $table->string('ip', 20)->nullable()->comment('登录ip');
            $table->string('address')->nullable()->comment('登录ip详细地址');
            $table->string('device_type')->nullable()->comment('来源设备类型');
            $table->string('device')->nullable()->comment('来源设备');
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
        Schema::drop('admin_user_logs');
    }
}
