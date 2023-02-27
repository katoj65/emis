<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSourceModel extends Model
{
    use HasFactory;
    protected $table = 'school_distance_to_nearest_water_source';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];

}
