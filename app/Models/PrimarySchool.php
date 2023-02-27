<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySchool extends Model
{
    use HasFactory;
    protected $table = 'primary_school';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];

}
