<?php

namespace App\Models\Sports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsFacility extends Model
{
    use HasFactory;

    protected $table = 'sports_facility';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
