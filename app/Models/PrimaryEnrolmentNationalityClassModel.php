<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEnrolmentNationalityClassModel extends Model
{
    use HasFactory;

    protected $table = 'primary_enrolment_nationality_class';
    protected $hidden = ['created_at', 'updated_at'];
}
