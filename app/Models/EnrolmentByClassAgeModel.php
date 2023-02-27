<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolmentByClassAgeModel extends Model
{
    use HasFactory;
    protected $table = 'enrolment_by_class_age';
    protected $hidden = ['created_at', 'updated_at'];
}
