<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_pembayarans')->insert([
            [
                'nama' => 'xendit',
                'secret_key' => '',
                'public_key' => '',
                'payment_methods' => "CREDIT_CARD,BCA,BNI,BSI,BRI,MANDIRI,PERMATA,ALFAMART,INDOMARET,OVO,DANA,SHOPEEPAY,LINKAJA,DD_BRI,DD_BCA_KLIKPAY,KREDIVO,AKULAKU,UANGME,QRIS",
            ],
        ]);
    }
}
