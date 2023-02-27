<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsSchoolRegionModel extends Model
{
    use HasFactory;
    protected $table = 'settings_school_region';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];
}

