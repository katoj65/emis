<?php

namespace App\Models\Districts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table='district';
    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

}
