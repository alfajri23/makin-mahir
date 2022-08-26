<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kelas_enroll(){
        return $this->belongsTo(KelasEnroll::class,'id','id_transaksi');
    }

    public function konsultasi_enroll(){
        return $this->belongsTo(Konsultasi::class,'id','id_transaksi');
    }

    public function event_enroll(){
        return $this->belongsTo(ProdukEvent::class,'id','id_transaksi');
    }

    // public function ebook_enroll(){
    //     return $this->belongsTo(Ebook::class,'id','id_transaksi');
    // }

    // public function cv_enroll(){
    //     return $this->belongsTo(CVCheckerEnroll::class,'id','id_transaksi');
    // }

    public function template_enroll(){
        return $this->belongsTo(TemplateEnroll::class,'id','id_transaksi');
    }

}
