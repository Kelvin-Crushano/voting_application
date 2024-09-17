<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class gs extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'gs_users';
    protected $fillable=[

        'code',
        'firstName',
        'lastName',
        'address',
        'phoneNumber',
        'email',
        'password',
        'description',
        'gsDivition',
        'image',
        'workingProvince',
        'workingDistrict',
        'workingDivition',
    ];
}

