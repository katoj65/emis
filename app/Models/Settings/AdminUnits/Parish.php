<?php

namespace App\Models\Settings\AdminUnits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use HasFactory;
    protected $table = 'admin_units_parish';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];




    public function subcounty()
    {
        return $this->belongsTo(Subcounty::class, 'subcounty_id');
    }


    public function villages()
    {
        return $this->hasMany(Village::class, 'parish_id');
    }

}
