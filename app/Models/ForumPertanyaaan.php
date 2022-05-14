<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumPertanyaaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function jawaban()
    {
        return $this->hasMany(ForumJawaban::class, 'id_pertanyaan', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(ForumKategori::class, 'id_kategori', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
