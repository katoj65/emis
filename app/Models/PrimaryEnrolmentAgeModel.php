<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEnrolmentAgeModel extends BaseModel
{
    use HasFactory;

    protected $table = 'primary_enrolment_age';
    protected $hidden = ['created_at', 'updated_at'];
}
