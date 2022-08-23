<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasKategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    protected $table = 'produk_kelas_kategoris';

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_kategori', 'id');
    }
}
