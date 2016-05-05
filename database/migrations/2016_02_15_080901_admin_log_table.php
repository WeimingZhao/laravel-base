<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 用户id,用户名,时间,ip,模型,操作类型(路由),主键(多),
         */
        Schema::create('admin_user_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index();
            $table->string('username', 48)->comment('操作者');
            $table->string('ip', 30)->comment('ip地址');
            $table->timestamps();
            $table->string('route_name', 32)->nullable()->index()->comment('路由名称');
            $table->string('method', 10)->comment('请求方式');
            $table->string('system')->nullable()->comment('系统');
            $table->string('module')->nullable()->comment('模块');
            $table->string('action_title')->nullable()->index()->comment('操作名称');//由系统权限表获取

            $table->string('server_name')->nullable();
            $table->string('uri')->nullable();
            $table->string('host')->nullable();
            $table->string('connection')->nullable();
            $table->string('accept')->nullable();
            $table->string('upgrade_insecure_requests')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->string('accpet_encoding')->nullable();
            $table->string('accept_language')->nullable();
            $table->string('cookie')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_logs');
    }
}
