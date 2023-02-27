<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsFoundingBodyModel extends Model
{
    use HasFactory;
    protected $table = 'settings_founding_body';
    protected $hidden = ['created_at', 'updated_at'];
}
