<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function kategori(){
        return $this->hasOne(ProdukKategori::class,'id','id_produk_kategori');
    }

}
