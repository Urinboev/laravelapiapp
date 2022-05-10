<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'login',
        'date_in',
        'date_at',
        'status',
        'token'
    ];

    // protected $hidden = [
    //     'parol',
    // ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
