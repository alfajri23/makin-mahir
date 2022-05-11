<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KonsultasiTipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function konsultasi()
    {
        return $this->hasMany(KonsultasiExpert::class, 'id_konsultasi', 'id');
    }

}
