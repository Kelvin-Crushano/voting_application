<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs extends Model
{
    use HasFactory;
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
