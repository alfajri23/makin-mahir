<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expert extends Authenticatable
{
    use HasFactory; 
    protected $guarded =[];

    public function event()
    {
        return $this->hasMany(ProdukEvent::class, 'id_expert', 'id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_expert', 'id');
    }

    public function konsultasi_enroll()
    {
        return $this->hasMany(KonsultasiEnroll::class, 'id_expert', 'id');
    }

}
