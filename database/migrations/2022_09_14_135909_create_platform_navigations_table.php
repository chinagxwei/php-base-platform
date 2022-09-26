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
        Schema::create('platform_navigations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->comment('父导航ID');
            $table->string('navigation_name', 64)->comment('导航名称');
            $table->string('navigation_link', 64)->comment('导航链接');
            $table->string('navigation_router', 64)->comment('导航路由');
            $table->integer('navigation_sort')->comment('导航排序');
            $table->string('icon', 64)->comment('导航图标')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->comment('平台导航表');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_navigations');
    }
};
