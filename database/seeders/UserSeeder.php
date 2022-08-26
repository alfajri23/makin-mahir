<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'foto' => 'asset/img/profile/profile.jpg'
            ],
            [
                'nama' => 'feri',
                'email' => 'feri@gmail.com',
                'password' => bcrypt('12345'),
                'foto' => 'asset/img/profile/profile.jpg'
            ],
        ]);
    }
}
