<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUnitsDistrictModel extends Model
{
    use HasFactory;
    protected $table = 'admin_units_districts';
    protected $hidden = ['created_at', 'updated_at'];
}
