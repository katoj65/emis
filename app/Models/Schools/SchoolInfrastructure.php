<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInfrastructure extends Model
{
    use HasFactory;

    protected $table = 'school_infrastructure';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];

}
