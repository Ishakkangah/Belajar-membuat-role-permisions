<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alamat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'alamat_rumah',
        'kota',
        'provinsi',
        'kode_pos',
        'telepon_rumah',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
