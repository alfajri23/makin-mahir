<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasUjian extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function soal()
    {
        return $this->hasMany(KelasSoal::class, 'id_ujian', 'id');
    }

}
