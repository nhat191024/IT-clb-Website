<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->hasMany(Members::class, 'Major', 'Id');
    }
}
