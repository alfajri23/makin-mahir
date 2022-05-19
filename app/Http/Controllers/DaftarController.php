<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranBeduk;
use App\Models\PendaftaranVideo;
use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranWebinar;
use App\Models\RiwayatEvent;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\ProdukEvent;
use App\Models\ProdukKonsul;
use App\Models\ProdukVideo;
use App\Models\SettingFormBeduk;
use App\Models\SettingFormWebinar;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function guest(){

        //! Ini untuk yg belum login,tp minor

    }
}
