<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'nrp',
        'thumbnail',
        'password',
        'dosen_wali_id',
        'tanggal_lahir',
        'tempat_lahir',
        'golongan_darah_id',
        'jenis_kelamin_id',
        'agama_id',
        'status_menikah_id',
        'no_hp',
        'ktp',
        'orang_tua_wali_id',
        'asal_sekolah_id',
        'alamat_id',
        'program_id',
        'mahasiswa_asing_id',
        'angkatan_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getTakeImageAttribute()
    {
        return "/storage/" .  $this->thumbnail;
    }

    public function dosen_wali()
    {
        return $this->belongsTo(dosen_wali::class);
    }

    public function golongan_darah()
    {
        return $this->belongsTo(golongan_darah::class);
    }

    public function jenis_kelamin()
    {
        return $this->belongsTo(jenis_kelamin::class);
    }

    public function agama()
    {
        return $this->belongsTo(agama::class);
    }

    public function status_menikah()
    {
        return $this->belongsTo(status_menikah::class);
    }

    public function program()
    {
        return $this->belongsTo(program::class);
    }

    public function angkatan()
    {
        return $this->belongsTo(angkatan::class);
    }


    public function orang_tua_wali()
    {
        return $this->belongsTo(orang_tua_wali::class);
    }

    public function asal_sekolah()
    {
        return $this->belongsTo(asal_sekolah::class);
    }

    public function alamat()
    {
        return $this->belongsTo(alamat::class);
    }

    public function mahasiswa_asing()
    {
        return $this->belongsTo(mahasiswa_asing::class);
    }

}
