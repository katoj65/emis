<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    use HasFactory;

    protected $table = 'user_role';
    protected $primaryKey = 'role_id';


    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];


}
