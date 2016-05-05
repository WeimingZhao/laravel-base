<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->index()->comment('角色id');
            $table->string('username', 48)->unique()->comment('唯一用户名');
            $table->string('password', 100)->comment('密码');
            $table->string('realname', 48)->nullable()->comment('真实姓名');
            $table->string('mobile', 20)->nullable()->comment('手机');
            $table->boolean('status')->default(1)->index()->comment('账户状态:0锁定,1正常');
            $table->string('mark')->nullable()->comment('备注');
            $table->string('last_login_ip', 48)->comment('最近登录ip');
            $table->dateTime('last_login')->comment('最近登录时间');
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
        Schema::drop('admin_users');
    }
}
