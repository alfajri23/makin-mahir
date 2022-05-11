<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingFormBedukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_form_beduks')->insert([
            [
                'nama' => 'umur',
                'data' => '',
                'tipe' => 'number',
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
            [
                'nama' => 'bukti_subscribe',
                'data' => '',
                'tipe' => 'file',
                'desc' => 'bukti anda',
            ],
            [
                'nama' => 'reward',
                'data' => '',
                'tipe' => 'file',
                'desc' => 'upload bukti untuk hadiah',
            ],
        ]);
    }
}
