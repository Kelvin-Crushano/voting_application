<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;
    protected $fillable=[

        'citizen_nic',
        'party_no1',
        'candidate_no1',
        'party_no2',
        'candidate_no2',
        'party_no3',
        'candidate_no3',
        'gsProvince',
        'gsDistrict',
        'gsDivition',
    ];

}
