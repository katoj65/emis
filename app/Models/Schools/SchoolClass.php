<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'school_class';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
