<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryTeacherSchoolGenderRegionModel extends Model
{
    use HasFactory;
    protected $table = 'primary_teacher_school_gender_region';
    protected $hidden = ['created_at', 'updated_at'];
}
