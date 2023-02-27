<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\EducationGrade;

class EducationLevel extends Model
{
    use HasFactory;

    protected $table = 'settings_education_level';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];


    public function classes()
    {
        return $this->hasMany(EducationGrade::class, 'education_level_id');
    }
}
