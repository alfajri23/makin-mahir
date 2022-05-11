<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumKategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function pertanyaan()
    {
        return $this->hasMany(ForumPertanyaan::class, 'id_kategori', 'id');
    }
}
