<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $time = date('Y-m-d H:i:s', time());
        $base = [
            [
                'navigation_name' => '导航管理',
                'navigation_link' => './navigation',
                'navigation_router' => 'platform/navigation',
                'navigation_sort' => 1,
                'icon' => 'line-chart',
                'created_at' => $time,
                'updated_at' => $time
            ],

            [
                'navigation_name' => '用户角色管理',
                'navigation_link' => './role',
                'navigation_router' => 'platform/role',
                'navigation_sort' => 2,
                'icon' => 'line-chart',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'navigation_name' => '用户管理',
                'navigation_link' => './manager',
                'navigation_router' => 'platform/manager',
                'navigation_sort' => 3,
                'icon' => 'line-chart',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'navigation_name' => '管理员日志',
                'navigation_link' => './action-log',
                'navigation_router' => 'platform/action-log',
                'navigation_sort' => 4,
                'icon' => 'line-chart',
                'created_at' => $time,
                'updated_at' => $time
            ],
        ];
        DB::table('platform_navigations')->insert($base);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
