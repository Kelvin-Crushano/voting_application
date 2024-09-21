<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class party_candidate extends Model
{
    use HasFactory;
    protected $fillable=[

        'party_id',
        'candidate_id',
        'status',
    ];
}
