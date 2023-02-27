<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;
    protected $table = 'admin_units_districts';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];

}
