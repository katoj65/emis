<?php


namespace App\Traits;


use App\Models\Settings\AdminUnits\Region;
use App\Models\Settings\EducationGrade;
use App\Models\Settings\EducationLevel;

trait Settings
{

    /**
     * Education Grade Consists of:-
     * 6,University
     * 3,Secondary
     * 2,Primary
     * 1,Pre Primary
     * 4,Post Primary
     * 5,Non Formal
     * 7,Non Degree
     */

    public function EducationLevel($level = null)
    {
        $education_level = new EducationLevel;
        return $level ? $education_level->where('id', $level)->with('classes')->first() : $education_level->with('classes')->get();

    }
    /**
     * AdminUnits Consists of:-
     * 1,Region
     * 2,Districts
     * 3,County
     * 4,Subcounty
     * 5,Parish
     * 6,Village
     */
    public function AdminUnits($level = null,$value=null)
    {
        $regions=Region::with('districts')->get();

        return $regions;

       $districts->with('county')->with('subcounty')->with('parish')->with('village')->limit(2)->get();
//        return $level ? $education_level->where('id', $level)->with('classes')->first() : $education_level->with('classes')->get();

    }
}