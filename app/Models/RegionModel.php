<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    use HasFactory;
    protected $table = 'admin_units_region';
    protected $hidden = ['created_at', 'updated_at', 'created_by', 'update_by'];

}
