<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];


    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id');
    }

    public function form(){
        return $this->belongsTo(FormSetting::class,'id','id_produk_kategori');
    }
}
