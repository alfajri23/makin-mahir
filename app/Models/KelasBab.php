<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasBab extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    protected $table = 'produk_kelas_bab';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function isi_bab()
    {
        return $this->hasMany(KelasMateri::class, 'id_bab', 'id');
    }
}
