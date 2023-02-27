<?php


namespace App\Traits\Enrollment;


use App\Models\EnrolmentByClassAgeModel;
use App\Traits\AdminUnits;

trait RegionDistricts
{
    use AdminUnits;


    public function ByClassAge($values){

        $getMales = EnrolmentByClassAgeModel::
        select($values)->
        join('school', 'enrolment_by_class_age.school_id', '=', 'school.id')
            ->join('admin_units_districts', 'school.intDistrictId', '=', 'admin_units_districts.id')
            ->join('admin_units_region', 'admin_units_districts.region_id', '=', 'admin_units_region.id')
            ->limit(10)->get();
    }

}

