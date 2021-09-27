<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orang_tua_wali extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'nama_ayah_wali',
        'ktp_ayah',
        'perkerjaan_ayah',
        'nip_ayah',
        'pangkat_ayah',
        'nama_instansi_ayah',
        'alamat_instansi_ayah',
        'nama_ibu',
        'ktp_ibu',
        'perkerjaan_ibu',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
