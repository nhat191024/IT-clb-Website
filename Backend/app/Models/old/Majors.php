<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    use HasFactory;

    protected $fillable = [
            'Name'
        ];

    public function user()
    {
        return $this->hasMany(User::class, 'Major', 'Id');
    }
}
