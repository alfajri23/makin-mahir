<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasSoal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function ujian()
    {
        return $this->belongsTo(KelasUjian::class, 'id_ujian', 'id');
    }

    public function jawaban(){
        return $this->belongsTo(KelasJawaban::class,'id','id_soal');
    }

}
