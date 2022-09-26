<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_miniprogram_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned()->comment('用户ID');
            $table->string('openid',128)->comment('小程序openid');
            $table->string('unionid',128)->comment('同主体唯一的用户标识');
            $table->string('nickname',128)->comment('昵称');
            $table->tinyInteger('sex')->comment('性别');
            $table->string('city',64)->comment('城市');
            $table->string('province',64)->comment('省份');
            $table->string('country',64)->comment('国家');
            $table->string('headimgurl',128)->comment('用户头像');
            $table->timestamps();
            $table->softDeletes();
            $table->comment('微信小程序信息表');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wechat_miniprogram_accounts');
    }
};
