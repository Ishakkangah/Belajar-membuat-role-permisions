<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class status extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function programs()
    {
        return $this->hasMany(program::class);
    }
}
