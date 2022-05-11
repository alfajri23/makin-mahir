<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukKonsulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_konsuls')->insert([
            [
                'judul' => 'Bedah CV langsung sama HRD',
                'deskripsi' => 'CV kamu akan dicek dan dibenerin langsung sama HRD,Private',
                'pemateri' => 'HRD Aldino Radiansyah',
                'harga' => '49000',
                'poster' => 'asset/img/produk/konsul/konsul_cv.jpg',
                'status' => 1
            ],
        ]);
    }
}
