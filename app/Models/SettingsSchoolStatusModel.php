<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsSchoolStatusModel extends Model
{
    use HasFactory;
    protected $table = 'settings_school_status';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];

}
