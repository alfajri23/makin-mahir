<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasJawaban extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function soal(){
        return $this->hasOne(KelasSoal::class,'id','id_soal');
    }

}
