<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEnrolmentRegionModel extends Model
{
    use HasFactory;

    protected $table = 'primary_enrolment_region';
    protected $hidden = ['created_at', 'updated_at'];
}
