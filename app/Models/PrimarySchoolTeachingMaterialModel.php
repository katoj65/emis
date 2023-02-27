<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchoolTeachingMaterialModel extends Model
{
    use HasFactory;
    protected $table = 'primary_school_teaching_material';
    protected $hidden = ['created_at', 'updated_at'];
}
