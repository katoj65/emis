<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherQualificationModel extends Model
{
    use HasFactory;
    protected $table = 'teacher_qualification';
    protected $hidden = ['created_at', 'updated_at'];

}
