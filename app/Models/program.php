<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class program extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'slug',
        'kurikulum_id',
        'status_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function kurikulum()
    {
        return $this->belongsTo(kurikulum::class);
    }

    public function status()
    {
        return $this->belongsTo(status::class);
    }

}
