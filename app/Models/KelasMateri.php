<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasMateri extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    protected $table = 'produk_kelas_materis';

    public function bab_kelas()
    {
        return $this->belongsTo(KelasBab::class, 'id_bab', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
