<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTabMenuModel extends Model
{
    use HasFactory;
    protected $table='user_tab';
    protected $hidden=['created_at','updated_at'];




}
