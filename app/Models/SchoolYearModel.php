<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYearModel extends Model
{
    use HasFactory;
    protected $table = 'school_year';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];
}
