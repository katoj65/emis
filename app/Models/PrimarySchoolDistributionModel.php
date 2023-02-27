<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchoolDistributionModel extends Model
{
    use HasFactory;
    protected $table = 'primary_school_distribution';
    protected $hidden = ['created_at', 'updated_at'];
}
