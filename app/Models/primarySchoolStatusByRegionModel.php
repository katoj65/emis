<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class primarySchoolStatusByRegionModel extends Model
{
    use HasFactory;
    protected $table = 'primary_school_status_by_district';
    protected $hidden = ['created_at', 'updated_at'];
}
