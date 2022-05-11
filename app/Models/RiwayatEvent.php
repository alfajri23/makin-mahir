<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatEvent extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded =[];

    public function produk(){
        return $this->hasOne(ProdukEvent::class,'id','id_produk');
    }

    public function konsultasi(){
        return $this->hasOne(ProdukKonsul::class,'id','id_konsul');
    }


    // public function user(){
    //     return $this->belongsToMany(
    //         User::class,
    //         'riwayat_events',
    //         'id_member',
    //         'id_produk');    
    // }

   
}
