<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEnrolmentNationalityAgeModel extends Model
{
    use HasFactory;

    protected $table = 'primary_enrolment_nationality_age';
    protected $hidden = ['created_at', 'updated_at'];
}
