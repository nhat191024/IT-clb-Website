<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Content',
        'Author'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'Id', 'Author');
    }
}
