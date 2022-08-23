<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukVideo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    protected $table = 'produk_kelas';

    // public function pendaftaranWebinar()
    // {
    //     return $this->hasMany(PendaftaranVideo::class, 'id_produk', 'id');
    // }

    public function subvideo()
    {
        return $this->hasMany(SubProdukVideo::class, 'id_produk', 'id');
    }
}
