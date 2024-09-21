<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class citizenship extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'vote_users';
    protected $fillable=[
        'nameWithInitials',
        'fullName',
        'addressInSrilanka',
        'contactNo',
        'dob',
        'birthNo',
        'district',
        'nicNo',
        'sex',
        'divition_id',
        'password',
    ];
}
