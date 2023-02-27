<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructionalMaterial extends Model
{
    use HasFactory;

    protected $table = 'InstructionalMaterial';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
