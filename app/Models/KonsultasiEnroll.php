<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KonsultasiEnroll extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function konsultasi()
    {
        return $this->belongsTo(KonsultasiExpert::class, 'id_konsultasi', 'id');
    }

    public function tipe()
    {
        return $this->belongsTo(KonsultasiTipe::class, 'id_konsultasi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'id_expert', 'id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id','id_transaksi');
    }

}
