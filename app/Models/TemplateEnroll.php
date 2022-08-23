<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemplateEnroll extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    protected $table = 'enroll_templates';

    public function template()
    {
        return $this->belongsTo(Template::class, 'id_template', 'id');
    }

    public function transaksi(){
        return $this->hasOne(Transaksi::class,'id','id_transaksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
