<?php

namespace App\Models\Settings\AdminUnits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $table = 'admin_units_village';
    protected $hidden = ['created_at', 'updated_at','created_by', 'updated_by'];


    public function parish()
    {
        return $this->belongsTo(Parish::class, 'parish_id');
    }

}
