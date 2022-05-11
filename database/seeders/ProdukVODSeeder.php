<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukVODSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_videos')->insert([
            [
                'judul' => 'Kelas pembuatan cv langsung sama hrd',
                'subjudul' => '',
                'deskripsi' => 'Ikuti bedah CV bareng HR Rekruter dan buat dirimu menjadi kandidat pencari kerja yang paling SiapKerja',
                'pemateri' => 'HRD Aldino Radiansyah',
                'harga' => '25000',
                'poster' => 'asset/img/produk/vod/vod_1.jpg',
                'link' => 'https://www.youtube.com/watch?v=J-KsUGz6mGQ&feature=youtu.be',
                'status' => 1
            ],
        ]);
    }
}
