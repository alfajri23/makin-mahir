<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'nama' => 'admin',
                'email' => 'admin@mm.id',
                'password' => bcrypt('adminmm'),
            ]
        ]);
    }
}
