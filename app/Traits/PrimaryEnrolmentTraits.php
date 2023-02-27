<?php


namespace App\Traits;
use App\Models\PrimaryEnrolmentAgeModel;
use App\Models\PrimaryEnrolmentDistrictModel;
use App\Models\PrimaryEnrolmentNationalityAgeModel;
use App\Models\PrimaryEnrolmentNationalityClassModel;
use App\Models\PrimaryEnrolmentRegionModel;
use App\Models\SchoolModel;


trait PrimaryEnrolmentTraits
{
    public function CreatePrimaryEnrolmentAge(){
        /*
         class       varchar(25)                      not null,
    gender      enum ('male', 'female', 'total') not null,
    years5less  int                              not null,
    years6      int                              not null,
    years7      int                              not null,
    years8      int                              not null,
    years9      int                              not null,
    years10     int                              not null,
    years11     int                              not null,
    years12     int                              not null,
    years13more int                              not null,
         */

       $school=SchoolModel::select();
       $where=[];
       $where['intEduLevelId']=2;
       $school->where($where);

    }

    public function GetSchoolby($field='',$value){
        SchoolModel::select()->where();
    }

}