<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDistrictEnrolment extends Model
{
    use HasFactory;

    protected $table = 'class_district_enrolment';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
