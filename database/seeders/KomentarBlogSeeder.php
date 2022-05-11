<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomentarBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komentar_blogs')->insert([
            [
                'id_user' => 1,
                'id_blog' => 1,
                'tanggal' => now()->format('Y-m-d'),
                'waktu' => '12.00',
                'isi' => 'sangat bagus sekali'
            ],
            [
                'id_user' => 2,
                'id_blog' => 1,
                'tanggal' => now()->format('Y-m-d'),
                'waktu' => '12.00',
                'isi' => 'sangat baik sekali'
            ]
        ]);
    }
}
