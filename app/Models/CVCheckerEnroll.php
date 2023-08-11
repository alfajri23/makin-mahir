<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CVCheckerEnroll extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id','id_transaksi');
    }
}