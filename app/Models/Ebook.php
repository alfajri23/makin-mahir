<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ebook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function produk(){
        return $this->belongsTo(Produk::class,'id','id_produk')
        ->where('id_kategori',5);
    }

    public function enroll()
    {
        return $this->hasMany(EbookEnroll::class, 'id_ebook', 'id');
    }
}
