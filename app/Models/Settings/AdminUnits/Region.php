<?php

namespace App\Models\Settings\AdminUnits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'admin_units_region';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];


    public function districts()
    {
        return $this->hasMany(Districts::class, 'region_id');
    }

}
