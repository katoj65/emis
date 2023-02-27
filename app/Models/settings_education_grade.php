<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings_education_grade extends Model
{
    use HasFactory;
    protected $table = 'settings_education_grade';
    protected $hidden = ['created_at', 'updated_at'];
}
