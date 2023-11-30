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

    public function member()
    {
        return $this->hasOne(Members::class, 'Id', 'Author');
    }
}
