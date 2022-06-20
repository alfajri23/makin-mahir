<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function kelas(){
        return $this->hasOne(Kelas::class,'id','id_produk');
    }

    public function konsultasi(){
        return $this->hasOne(KonsultasiExpert::class,'id','id_produk');
    }

    public function event(){
        return $this->hasOne(ProdukEvent::class,'id','id_produk');
    }

    public function ebook(){
        return $this->hasOne(Ebook::class,'id','id_produk');
    }

    public function template(){
        return $this->hasOne(Template::class,'id','id_produk');
    }


    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_produk', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'id_kategori', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Expert::class, 'id_expert', 'id');
    }
}
