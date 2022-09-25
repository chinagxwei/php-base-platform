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
        Schema::create('action_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned()->comment('用户ID');
            $table->string('action_name',256)->comment('行为名称');
            $table->text('action_description')->comment('行为描述');
            $table->timestamps();
            $table->softDeletes();
            $table->comment('行为日志表');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_logs');
    }
};
