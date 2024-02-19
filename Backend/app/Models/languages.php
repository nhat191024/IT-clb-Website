<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class languages extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projectLanguage()
    {
        return $this->belongsToMany(projects::class);
    }
}
