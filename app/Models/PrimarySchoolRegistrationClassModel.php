<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchoolRegistrationClassModel extends Model
{
    use HasFactory;
    protected $table = 'primary_school_registration_class';
    protected $hidden = ['created_at', 'updated_at'];
}
