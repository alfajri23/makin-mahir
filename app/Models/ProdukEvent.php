<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'my_flights';

    protected $table = 'produk_events';

    protected $guarded =[];

    public function user(){
        return $this->belongsToMany(
            User::class,
            'riwayat_events',
            'id_user',
            'id_produk');    
    }

    public function enroll()
    {
        return $this->hasMany(EventEnroll::class, 'id_produk', 'id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'id_expert', 'id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class,'id','id_produk')
        ->whereIn('id_kategori',[1,2]);
    }

    // public function produk(){
    //     return $this->hasOne(Produk::class,'id','id_produk');
    // }

   
}
