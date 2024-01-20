<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Id',
        'Name',
        'Surname',
        'Birthday',
        'JoinDate',
        'Major',
        'Course',
        'Phone',
        'Email',
        'username',
        'password',
        'Avatar',
        'Active',
        'SocialAccount',
        'Role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function major()
    {
        return $this->belongsTo(Majors::class, 'Major', 'Id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'Course', 'Id');
    }

    public function projectMembers()
    {
        return $this->belongsToMany(ProjectMembers::class);
    }

    public function task()
    {
        return $this->hasMany(Tasks::class);
    }

    public function blog()
    {
        return $this->hasMany(Blogs::class);
    }

}
