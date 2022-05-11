<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftaranVideo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function video()
    {
        return $this->belongsTo(ProdukVideo::class, 'id_produk', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_pendaftaran', 'id');
    }
}
