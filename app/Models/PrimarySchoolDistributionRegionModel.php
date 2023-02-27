<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchoolDistributionRegionModel extends Model
{
    use HasFactory;
    protected $table = 'primaryDistributionRegion';
    protected $hidden = ['created_at', 'updated_at', 'created_by', 'update_by'];

}
