<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingFormWebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_form_webinars')->insert([
            [
                'nama' => 'umur',
                'data' => '',
                'tipe' => 'text',
                'desc' => '',
            ],
            [
                'nama' => 'info_event',
                'data' => '',
                'tipe' => 'option',
                'desc' => 'telegram,linkedin,whatapps,line,facebook',
            ],
            [
                'nama' => 'status',
                'data' => '',
                'tipe' => 'text',
                'desc' => '',
            ],
            [
                'nama' => 'telepon',
                'data' => '',
                'tipe' => 'number',
                'desc' => '',
            ],
            [
                'nama' => 'alasan',
                'data' => '',
                'tipe' => 'text',
                'desc' => '',
            ],
            [
                'nama' => 'gabung_grup',
                'data' => '',
                'tipe' => 'text',
                'desc' => '',
            ],
        ]);
    }
}
