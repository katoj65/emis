<?php

namespace App\Models\Settings\AdminUnits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table = 'admin_units_districts';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];




    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }


    public function county()
    {
        return $this->hasMany(County::class, 'district_id');
    }



}
