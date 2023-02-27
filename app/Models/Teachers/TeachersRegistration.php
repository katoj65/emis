<?php

namespace App\Models\Teachers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersRegistration extends Model
{
    use HasFactory;


    protected $table = 'teacher_registration';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
