<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchoolLicensedModel extends Model
{
    use HasFactory;
    protected $table = 'primarySchoolLicensed';
    protected $hidden = ['created_at', 'updated_at', 'created_by', 'update_by'];

}
