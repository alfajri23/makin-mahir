<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogKategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function blog()
    {
        return $this->hasMany(Blog::class, 'id_kategori', 'id');
    }
}
