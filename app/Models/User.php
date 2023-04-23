<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
    ];

    public const STATE = [
        1 => 'Johor',   
        2 => 'Kedah',
        3 => 'Kelantan',
        4 => 'Kuala Lumpur',
        5 => 'Labuan',
        6 => 'Melaka',
        7 => 'Negeri Sembilan',
        8 => 'Pahang',
        9 => 'Perak',
        10 => 'Perlis',
        11 => 'Penang',
        12 => 'Sabah',
        13 => 'Sarawak',
        14 => 'Selangor',
        15 => 'Terengganu',
    ];
}
