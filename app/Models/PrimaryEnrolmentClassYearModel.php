<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEnrolmentClassYearModel extends Model
{
    use HasFactory;
    protected $table = 'primary_enrolment_class_year';
    protected $hidden = ['created_at', 'updated_at'];
}

