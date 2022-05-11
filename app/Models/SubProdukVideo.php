<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubProdukVideo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function video()
    {
        return $this->belongsTo(ProdukVideo::class, 'id_produk', 'id');
    }
}
