<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeSchoolEnrolment extends Model
{
    use HasFactory;

    protected $table = 'age_school_enrolment';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
