<?php

namespace App\Models\Settings\AdminUnits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $table = 'admin_units_county';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];



    public function districts()
    {
        return $this->belongsTo(Region::class, 'district_id');
    }


    public function subcounty()
    {
        return $this->hasMany(Subcounty::class, 'county_id');
    }

}
