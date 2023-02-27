<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicInstitutions extends Model
{
    use HasFactory;

    protected $table = 'academic_institutions';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
