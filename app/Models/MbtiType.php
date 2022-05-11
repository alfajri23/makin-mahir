<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiType extends Model
{
    use HasFactory;
    protected $guarded =[];

    protected $table = 'mbti_type';

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }

    public function result()
    {
        return $this->hasMany(MbtiResult::class, 'result', 'code');
    }
}
