<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experts')->insert([
            [
                'nama' => 'feri',
                'email' => 'feri@gmail.com',
                'password' => bcrypt('12345'),
                'foto' => 'asset/img/profile/profile.jpg'
            ],
        ]);
    }
}
