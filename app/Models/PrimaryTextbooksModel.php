<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryTextbooksModel extends Model
{
    use HasFactory;
    protected $table = 'primary_text_books';
    protected $hidden = ['created_at', 'updated_at'];
}
