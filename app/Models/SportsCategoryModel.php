<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'sports_category';
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];

}
