<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationGrade extends Model
{
    use HasFactory;

    protected $table = 'settings_education_grade';
    protected $hidden = [
        'updated_at',
        'created_at',
    ];



    public function education_level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
}
