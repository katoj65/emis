<?php

namespace App\Models\Schools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

}
