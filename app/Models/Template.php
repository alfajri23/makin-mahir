<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    protected $table = 'produk_templates';
    

    public function produk(){
        return $this->belongsTo(Produk::class,'id','id_produk')
        ->where('id_kategori',4);
    }

    public function enroll()
    {
        return $this->hasMany(TemplateEnroll::class, 'id_template', 'id');
    }


}
