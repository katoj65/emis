<?php

namespace App\Models\Sanitation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanitationFacility extends Model
{
    use HasFactory;

    protected $table = 'sanitation_facility';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
