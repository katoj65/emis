<?php

namespace App\Models\Settings\AdminUnits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{
    use HasFactory;
    protected $table = 'admin_units_subcounty';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];




    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }


    public function parish()
    {
        return $this->hasMany(Parish::class, 'subcounty_id');
    }
}
