<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //use SoftDeletes;

    protected $guarded =[];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'nama',
    //     'email',
    //     'password',
    //     'telepon',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function event(){
        return $this->belongsToMany(
            ProdukEvent::class,
            'riwayat_events',
            'id_produk',
            'id_user');    
    }

    public function komentar_blog()
    {
        return $this->hasMany(KomentarBlog::class, 'id_user', 'id');
    }

    public function mbti_test()
    {
        return $this->hasMany(MbtiType::class, 'id_user', 'id');
    }

    public function mbti_result()
    {
        return $this->hasMany(MbtiResult::class, 'id_user', 'id');
    }

    public function riasec_result()
    {
        return $this->hasMany(RiasecResult::class, 'id_user', 'id');
    }

    public function transfer()
    {
        return $this->hasMany(Transaksi::class, 'id_user', 'id');
    }

    public function pertanyaan()
    {
        return $this->hasMany(ForumPertanyaaan::class, 'id_user', 'id');
    }

    public function jawaban()
    {
        return $this->hasMany(ForumJawaban::class, 'id_user', 'id');
    }

    //* ENROLL

    public function konsultasi_enroll()
    {
        return $this->hasMany(KonsultasiEnroll::class, 'id_user', 'id');
    }

    public function kelas_enroll()
    {
        return $this->hasMany(KelasEnroll::class, 'id_user', 'id');
    }

    public function event_enroll()
    {
        return $this->hasMany(EventEnroll::class, 'id_user', 'id');
    }

    public function ebook_enroll()
    {
        return $this->hasMany(EbookEnroll::class, 'id_user', 'id');
    }

    public function cv_checker_enroll()
    {
        return $this->hasMany(CVCheckerEnroll::class, 'id_user', 'id');
    }


}
