<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_events')->insert([
            [
                'judul' => 'Bedah jawaban interview',
                'tipe' => 'webinar',
                'waktu' => '19.00 WIB',
                'tanggal' => now(),
                'deskripsi' => 'Bedah jawaban interview',
                'pemateri' => 'HRD Aldino Radiansyah',
                'harga' => '39000',
                'harga_promo' => '50000',
                'poster' => 'asset/img/produk/webinar/webinar.jpg',
                'status' => 1
            ],
            [
                'judul' => 'Beduk Pertanyaan Kerja',
                'waktu' => '19.00 WIB',
                'tipe' => 'beduk',
                'tanggal' => now(),
                'deskripsi' => 'CV kamu akan dicek dan dibenerin langsung sama HRD,Private',
                'pemateri' => 'HRD Aldino Radiansyah',
                'harga' => '0',
                'harga_promo' => '0',
                'poster' => 'asset/img/produk/beduk/beduk_1.jpg',
                'status' => 1
            ],
        ]);
    }
}
