<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryTeacherGenderQualificationRegionModel extends Model
{
    use HasFactory;
    protected $table = 'primary_teacher_gender_qualification_region';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];

}
