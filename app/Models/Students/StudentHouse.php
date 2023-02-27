<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHouse extends Model
{
    use HasFactory;

    protected $table='student_house';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
