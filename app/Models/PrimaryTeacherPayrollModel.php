<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryTeacherPayrollModel extends Model
{
    use HasFactory;
    protected $table = 'primary_teacher_payroll';
    protected $hidden = ['created_at', 'updated_at'];
}
