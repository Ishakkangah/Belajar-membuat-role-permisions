<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kurikulum extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    
    protected $fillable = ['name', 'slug'];
    
    public function programs()
    {
        return $this->hasMany(program::class);
    }
}
