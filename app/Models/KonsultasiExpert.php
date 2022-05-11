<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KonsultasiExpert extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function tipe()
    {
        return $this->belongsTo(KonsultasiTipe::class, 'id_konsultasi', 'id');
    }

    public function user_enroll()
    {
        return $this->hasMany(KonsultasiUserEnroll::class, 'id_konsultasi_expert', 'id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'id_expert', 'id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class,'id','id_produk')
        ->where('id_kategori',4);
    }

    public function enroll()
    {
        return $this->hasMany(KonsultasiEnroll::class, 'id_konsultasi', 'id');
    }

}
