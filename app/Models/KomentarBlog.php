<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KomentarBlog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    protected $table = 'blog_komentars';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
