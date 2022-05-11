<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'judul' => '25 Layanan Belajar Online Terbaik Untuk Upgrade Skill Kamu',
                'kategori' => 'kerja',
                'link' => '19.00',
                'penulis' => 'Hari',
                'isi' => 'Bedah jawaban interview',
                'pengunjung' => '3',
                'komentar' => 'Ini adalah komentar',
                'tag' => 'bagus,dan,baik',
                'gambar' => 'asset/img/produk/webinar/webinar.jpg',
                'meta_title' => 'bagus,dan,baik',
                'meta_description' => 'bagus,dan,baik',
                'meta_keyword' => 'bagus,dan,baik',
                'publish' => '1'
            ],
            [
                'judul' => 'Online Terbaik Untuk Upgrade Skill Kamu',
                'kategori' => 'pendidikan',
                'link' => '19.00',
                'penulis' => 'Hari',
                'isi' => 'Bedah jawaban interview',
                'pengunjung' => '3',
                'komentar' => 'Ini adalah komentar',
                'tag' => 'bagus,dan,baik',
                'gambar' => 'asset/img/produk/webinar/webinar.jpg',
                'meta_title' => 'bagus,dan,baik',
                'meta_description' => 'bagus,dan,baik',
                'meta_keyword' => 'bagus,dan,baik',
                'publish' => '1'
            ]
        ]);
    }
}
