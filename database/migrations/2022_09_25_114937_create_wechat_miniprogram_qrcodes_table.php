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
        Schema::create('wechat_miniprogram_qrcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned()->comment('用户ID');
            $table->string('wechat_qrcode_url',256)->comment('小程序码地址');
            $table->string('remarks',256)->comment('备注');
            $table->timestamps();
            $table->softDeletes();
            $table->comment('微信小程序码表');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wechat_miniprogram_qrcodes');
    }
};
