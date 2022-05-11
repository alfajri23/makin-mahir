<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function kategori()
    {
        return $this->belongsTo(KelasKategori::class, 'id_kategori', 'id');
    }

    public function bab()
    {
        return $this->hasMany(KelasBab::class, 'id_kelas', 'id');
    }

    public function ujian()
    {
        return $this->hasMany(KelasSoal::class, 'id_kelas', 'id');
    }

    public function isi_bab()
    {
        return $this->hasMany(KelasMateri::class, 'id_kelas', 'id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class,'id','id_produk')
        ->where('id_kategori',1);
    }

    public function enroll()
    {
        return $this->hasMany(KelasEnroll::class, 'id_kelas', 'id');
    }

    //! Yang di produk belum
}
