<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->comment('角色ID');
            $table->tinyInteger('role_type')->unsigned()->comment('用户角色 1管理员 2业务员 3会员');
            $table->string('username')->comment('用户名');
            $table->string('email',)->comment('邮箱')->unique();
            $table->timestamp('email_verified_at')->comment('邮箱验证时间')->nullable();
            $table->string('password')->comment('密码');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->comment('用户表');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
