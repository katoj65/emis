<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings_education_level extends Model
{
    use HasFactory;
    protected $table = 'settings_education_level';
    protected $hidden = ['created_at', 'updated_at'];
}
