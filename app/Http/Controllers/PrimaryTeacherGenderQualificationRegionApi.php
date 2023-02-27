<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\DistrictModel;
use App\Models\PrimaryTeacherGenderQualificationRegionModel;
use App\Models\TeacherQualificationModel;


class PrimaryTeacherGenderQualificationRegionApi extends Controller
{

//get enrolment years
public function getSchoolYears($year=''){
   if($year!=''){
   $get=ModelsSchoolYearModel::select('school_year')->where('school_year',$year)->orderBy('school_year','DESC')->get();
   }else{
   $get=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->orderBy('school_year','DESC')->get();
   }
   return $get;
   }






//get regions
public function getRegion($id=''){
   if($id!=''){
   $get=AdminUnitsRegionModel::select('name','id')->where('id',$id)->orderBy('name','ASC')->get();
   }else{
   $get=AdminUnitsRegionModel::select('name','id')->orderBy('name','ASC')->get();
   }
   return $get;
   }



//get districts
public function getDistricts($id=''){
   if($id==''){
   $district=DistrictModel::orderBy('name','ASC')->get();
   }else{
   $district=DistrictModel::where('id',$id)->orderBy('name','ASC')->get();
   }
   return $district;
   }





//get qualification

function getQualification($id=''){
if($id){
$get=TeacherQualificationModel::select('intHighestTeachingQualificationId as id','comment as qualification')->where('intEduLevelId',2)->where('intHighestTeachingQualificationId',$id)->orderBy('id','ASC')->get();
}else{
   $get=TeacherQualificationModel::select('intHighestTeachingQualificationId as id','comment as qualification')->where('intEduLevelId',2)->orderBy('id','ASC')->get();
}
return $get;
}










public function index(){

    $numRows=PrimaryTeacherGenderQualificationRegionModel::count();
    if($numRows>0){
$getRegion=$this->getRegion();
$getDistrict=$this->getDistricts();
$getQualification=$this->getQualification();
$getYear=$this->getSchoolYears();
foreach($getYear as $y){
$yy[]=$y->school_year;
}
$school_year=max($yy);



//header
$header=['REGION','DISTRICT','GENDER'];
foreach($getQualification as $q){
array_push($header,strtoupper($q->qualification));
$bottom_total[]=number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')->where('school_year',$school_year)->where('qualification',$q->id)->sum('teacher_count'));
}


foreach($getDistrict as $d){
foreach($getQualification as $q){

$males[]=array(
'id'=>$d->id,
'year'=>$school_year,
'qualification'=>$q->qualification,
'males'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
->where('gender','Male')->sum('teacher_count')
)

);




$females[]=array(
    'id'=>$d->id,
    'year'=>$school_year,
    'qualification'=>$q->qualification,
    'females'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
    ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
    ->where('gender','Female')->sum('teacher_count')
    )

);


    $totals[]=array(
        'id'=>$d->id,
        'year'=>$school_year,
        'qualification'=>$q->qualification,
        'totals'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
        ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
        ->sum('teacher_count')),

        'females'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
        ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
        ->where('gender','Female')->sum('teacher_count')
    ),

        'males'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
        ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
        ->where('gender','Male')->sum('teacher_count')
        )

    );

}
}




//region total
foreach($getRegion as $r){
    foreach($getQualification as $q){
$region_total[]=array(
'id'=>$r->id,
'year'=>$school_year,
'total'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
->where('region',$r->id)->where('school_year',$school_year)->where('qualification',$q->id)
->sum('teacher_count')));
    }
    }

return ['header'=>$header,'district'=>$getDistrict,'region'=>$getRegion,'select_qualification'=>$getQualification,'males'=>$males,'females'=>$females,'totals'=>$totals,'bottom_total'=>$bottom_total,'region_total'=>$region_total,'school_year'=>$school_year,'select_years'=>$yy,'numRows'=>$numRows];
 }else{
return ['numRows'=>$numRows];
 }

}


















public function filterQualification(Request $request){
    $regioni=$request->input('region');
    $districti=$request->input('district');
    $fyear=$request->input('year');
    $qualificationId=$request->input('qualificationId');
    $selectId='';
    $numRows=PrimaryTeacherGenderQualificationRegionModel::count();
    if($numRows>0){


        if($districti!=''){

            $getDistricti=$this->getDistricts($districti);

            foreach($getDistricti as $regionId);
            if($regioni==''){
            $getRegion=$this->getRegion($regionId->region_id);
            $getDistrict=$this->getDistricts($districti);
            $selectId=$regionId->region_id;
             }else{
                if($regioni==$regionId->region_id){

                $getRegion=$this->getRegion($regionId->region_id);

     $getDistrict=$this->getDistricts($districti);
        $selectId=$regionId->region_id;

                }else{
$getRegion=$this->getRegion($regioni);
$getDistrict=$this->getDistricts();
$selectId=$regioni;
                     }


             }
        }
        else{
$getRegion=$this->getRegion($regioni);
$selectId=$regioni;
$getDistrict=$this->getDistricts();

 }



$getQualification=$this->getQualification($qualificationId);
$getYear=$this->getSchoolYears($fyear);
foreach($getYear as $y){
$yy[]=$y->school_year;
}
$school_year=max($yy);



//header
$header=['REGION','DISTRICT','GENDER'];

if($selectId!=''){

    foreach($getQualification as $q){
        array_push($header,strtoupper($q->qualification));
        $bottom_total[]=number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')->where('school_year',$school_year)->where('qualification',$q->id)->where('region',$selectId)->sum('teacher_count'));
        }
}else{


    foreach($getQualification as $q){
        array_push($header,strtoupper($q->qualification));
        $bottom_total[]=number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')->where('school_year',$school_year)->where('qualification',$q->id)->sum('teacher_count'));
        }
}



foreach($getDistrict as $d){
foreach($getQualification as $q){

$males[]=array(
'id'=>$d->id,
'year'=>$school_year,
'qualification'=>$q->qualification,
'males'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
->where('gender','Male')->sum('teacher_count')
)

);




$females[]=array(
    'id'=>$d->id,
    'year'=>$school_year,
    'qualification'=>$q->qualification,
    'females'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
    ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
    ->where('gender','Female')->sum('teacher_count')
    )


);


    $totals[]=array(
        'id'=>$d->id,
        'year'=>$school_year,
        'qualification'=>$q->qualification,
        'totals'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
        ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
        ->sum('teacher_count')
    ),


    'females'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
    ->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
    ->where('gender','Female')->sum('teacher_count')
),


'males'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
->where('district',$d->id)->where('school_year',$school_year)->where('qualification',$q->id)
->where('gender','Male')->sum('teacher_count')
)







    );

}
}




//region total
foreach($getRegion as $r){
    foreach($getQualification as $q){
$region_total[]=array(
'id'=>$r->id,
'year'=>$school_year,
'total'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
->where('region',$r->id)->where('school_year',$school_year)->where('qualification',$q->id)
->sum('teacher_count')));
    }
    }

return ['header'=>$header,'district'=>$getDistrict,'region'=>$getRegion,'select_qualification'=>$getQualification,'males'=>$males,'females'=>$females,'totals'=>$totals,'bottom_total'=>$bottom_total,'region_total'=>$region_total,'school_year'=>$school_year,'select_years'=>$yy,'numRows'=>$numRows];
 }else{
return ['numRows'=>$numRows];
 }

}
















//advanced filter
public function advancedFilter(Request $request){
    $fromYear=$request->input('fromYear');
    $toYear=$request->input('toYear');
    $selectedId=$request->input('selectedId');
    if($fromYear < $toYear){
$startYear=$fromYear;
$endYear=$toYear;
 }
$option=$selectedId;
$selectOption=$this->getQualification($option);
foreach($selectOption as $s);
$selectName=$s->qualification;
$selectID=$s->id;

//selected years
$get=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($get as $y){
$years[]=$y->school_year;
}


$getRegion=$this->getRegion();
$getDistrict=$this->getDistricts();
$getQualification=$this->getQualification();
//header
$header=['REGION','DISTRICT','GENDER'];
foreach($years as $y){
array_push($header,strtoupper($y.' - '.$selectName));

$bottom_total[]=number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')->where('school_year',$y)->where('qualification',$selectID)->sum('teacher_count'));

}



foreach($getDistrict as $d){
foreach($years as $y){

    $males[]=array(
        'id'=>$d->id,
        'year'=>$y,
        'qualification'=>$selectID,
        'males'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
        ->where('district',$d->id)->where('school_year',$y)->where('qualification',$selectID)
        ->where('gender','Male')->sum('teacher_count')
        ));





        $females[]=array(
            'id'=>$d->id,
            'year'=>$y,
            'qualification'=>$selectID,
            'females'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
            ->where('district',$d->id)->where('school_year',$y)->where('qualification',$selectID)
            ->where('gender','Female')->sum('teacher_count'))

        );



            $totals[]=array(
                'id'=>$d->id,
                'year'=>$y,
                'qualification'=>$selectID,
                'totals'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
                ->where('district',$d->id)->where('school_year',$y)->where('qualification',$selectID)->sum('teacher_count')
            ),

            'females'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
            ->where('district',$d->id)->where('school_year',$y)->where('qualification',$selectID)
            ->where('gender','Female')->sum('teacher_count')),



  'males'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
  ->where('district',$d->id)->where('school_year',$y)->where('qualification',$selectID)
  ->where('gender','Male')->sum('teacher_count'))






            );

}
}


//region total
foreach($getRegion as $r){
    foreach($years as $y){

        $region_total[]=array(
            'id'=>$r->id,
            'year'=>$y,
            'total'=>number_format(PrimaryTeacherGenderQualificationRegionModel::select('teacher_count')
            ->where('region',$r->id)->where('school_year',$y)->where('qualification',$selectID)
            ->sum('teacher_count')));
    }

    }








return ['selectedOption'=>$selectName,'selectedYears'=>$years,'region_total'=>$region_total,'totals'=>$totals,'females'=>$females,'males'=>$males,'header'=>$header,'bottom_total'=>$bottom_total,'region'=>$getRegion,'district'=>$getDistrict];










}




























}
