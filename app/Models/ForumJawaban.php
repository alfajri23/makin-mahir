<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumJawaban extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    public function pertanyaan()
    {
        return $this->belongsTo(ForumPertanyaaan::class, 'id_pertanyaan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(USer::class, 'id_user', 'id');
    }
    
}
