<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKonsul extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produk_konsultasis';

    protected $guarded =[];

    // public function member(){
    //     return $this->belongsToMany(
    //         User::class,
    //         'member_konsultasis',
    //         'id_member',
    //         'id_produk');    
    // }

    // public function riwayat(){
    //     return $this->belongsTo(RiwayatEvent::class,'id','id_konsul');
    // }

    public function produk(){
        return $this->belongsTo(Produk::class,'id','id_produk')
        ->where('id_kategori',[3]);
    }

    public function pendaftaranKonsultasi()
    {
        return $this->hasMany(pendaftaranKonsultasi::class, 'id_produk', 'id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'id_expert', 'id');
    }
}
