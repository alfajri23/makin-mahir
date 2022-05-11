<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiResult extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function type()
    {
        return $this->belongsTo(MbtiType::class,'result','code');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
