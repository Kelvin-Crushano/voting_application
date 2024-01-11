<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citizenship extends Model
{
    use HasFactory;
    protected $fillable=[
        'nameWithInitials',
        'fullName',
        'addressInSrilanka',
        'addressInForeign',
        'email',
        'contactNo',
        'dob',
        'pob',
        'birthNo',
        'district',
        'nationality',
        'nicNo',
        'sex',
        'spouseName',
        'nationalityOfSpouse',
        'fatherName',
        'fatherDate_dob',
        'fatherDate_pob',
        'motherName',
        'motherDate_dob',
        'motherDate_pob',
        'fatherCertificateNo',
        'fatherDateofIssue',
        'motherCertificateNo',
        'motherDateofIssue',
        'passwordNumber',
        'passwordDateIssue',
        'passwordPlaceIssue',
        'country',
        'dateGranted',
        'citizenshipNo',
    ];
}
