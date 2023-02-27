<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  StudentRegistration extends Model
{
    use HasFactory;


    protected $table = 'StudentRegistration';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
