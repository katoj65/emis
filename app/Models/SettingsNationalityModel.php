<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsNationalityModel extends Model
{
    use HasFactory;
    protected $table = 'settings_nationality';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];
}
