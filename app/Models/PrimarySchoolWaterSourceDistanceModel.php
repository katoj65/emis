<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchoolWaterSourceDistanceModel extends Model
{
    use HasFactory;

    protected $table = 'primary_school_water_source_distance';
    protected $hidden = ['created_at', 'updated_at'];
}
