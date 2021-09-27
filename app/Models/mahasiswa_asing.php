<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mahasiswa_asing extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
            'paspor_tipe',
            'paspor_kode',
            'paspor_nomor',
            'visa_tipe',
            'visa_indeks',
            'expired_date',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
