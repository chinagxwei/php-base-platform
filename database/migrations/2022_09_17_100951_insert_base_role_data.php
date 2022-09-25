<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $time = date('Y-m-d H:i:s', time());
        DB::table('platform_roles')->insert([
            'id' => 1,
            'role_name' => '管理员',
            'created_at' => $time,
            'updated_at' => $time
        ]);

        $data = [
            ['role_id' => 1, 'navigation_id' => 1],
            ['role_id' => 1, 'navigation_id' => 2],
            ['role_id' => 1, 'navigation_id' => 3],
            ['role_id' => 1, 'navigation_id' => 4],
        ];

        DB::table('platform_roles_navigations')->insert($data);
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
