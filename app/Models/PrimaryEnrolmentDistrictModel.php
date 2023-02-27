<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEnrolmentDistrictModel extends Model
{
    use HasFactory;

    protected $table = 'primary_enrolment_district';
    protected $hidden = ['created_at', 'updated_at'];
}
