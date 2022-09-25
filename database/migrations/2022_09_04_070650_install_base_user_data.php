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
        //
        $time = date('Y-m-d H:i:s', time());
        $base = [
            'username' => 'admin',
            'role_id' => 1,
            'email' => 'admin@ctsystem.com',
            'password' => bcrypt('admin123456'),
            'role_type' => 1,
            'created_at' => $time,
            'updated_at' => $time,
        ];
        DB::table('users')->insert($base);
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
