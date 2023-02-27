<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\DistrictModel;
use App\Models\PrimaryTeacherGenderQualificationModel;
use App\Models\TeacherQualificationModel;





class PrimaryTeacherGenderQualificationApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





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




//get status


function getStatus($state=''){
$status=['government','private'];
if($state!=''){
foreach($status as $item){
if($state==$item){
return $item;
}
}
}else{
    return $status;
}
}







public function index(){

    $numRows=PrimaryTeacherGenderQualificationModel::count();
    if($numRows >0 ){
$years=$this->getSchoolYears();
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);

$getQualification=$this->getQualification();
$getStatus=$this->getStatus();

//header
$header=['QUALIFICATION','GENDER'];
foreach($getStatus as $s){
array_push($header,strtoupper($s));

$bottom_total[]=number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'));
}


//gender

foreach($getQualification as $q){

foreach($getStatus as $s){
$males[]=array(
'id'=>$q->id,
'name'=>$q->qualification,
'year'=>$enrolment_year,
'males'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('gender','male')->where('qualification',$q->id)->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'))
);


$females[]=array(
    'id'=>$q->id,
    'name'=>$q->qualification,
    'year'=>$enrolment_year,
    'females'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('gender','female')->where('qualification',$q->id)->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'))
    );

    $totals[]=array(
        'id'=>$q->id,
        'name'=>$q->qualification,
        'year'=>$enrolment_year,
        'totals'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('qualification',$q->id)->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'))
        );

}

}

return ['header'=>$header,'qualification'=>$getQualification,'status'=>$getStatus,'males'=>$males,'females'=>$females,'totals'=>$totals,'school_year'=>$enrolment_year,'bottom_total'=>$bottom_total,'numRows'=>$numRows,'allYear'=>$years];
 }else {
    return ['numRows'=>$numRows];
 }
}













//filter

public function filterQualification(Request $request){
$name=$request->input('name');
$statused=$request->input('status');
$yearr=$request->input('year');
    $numRows=PrimaryTeacherGenderQualificationModel::count();
    if($numRows >0 ){
$years=$this->getSchoolYears($yearr);
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);

$getQualification=$this->getQualification($name);
if($statused=='government'){
    $getStatus=['government'];
}elseif($statused=='private') {
    $getStatus=['private'];
}else{
$getStatus=['government','private'];
}


//header
$header=['QUALIFICATION','GENDER'];

if($name!=''){
foreach($getStatus as $s){
array_push($header,strtoupper($s));

$bottom_total[]=number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('status',$s)->where('school_year',$enrolment_year)
->where('qualification',$name)
->sum('teacher_count'));
}
}else{

    foreach($getStatus as $s){
        array_push($header,strtoupper($s));

        $bottom_total[]=number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'));
        }
}


//gender

foreach($getQualification as $q){

foreach($getStatus as $s){
$males[]=array(
'id'=>$q->id,
'name'=>$q->qualification,
'year'=>$enrolment_year,
'males'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('gender','male')->where('qualification',$q->id)->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'))
);


$females[]=array(
    'id'=>$q->id,
    'name'=>$q->qualification,
    'year'=>$enrolment_year,
    'females'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('gender','female')->where('qualification',$q->id)->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'))
    );

    $totals[]=array(
        'id'=>$q->id,
        'name'=>$q->qualification,
        'year'=>$enrolment_year,
        'totals'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('qualification',$q->id)->where('status',$s)->where('school_year',$enrolment_year)->sum('teacher_count'))
        );

}

}

return ['header'=>$header,'qualification'=>$getQualification,'status'=>$getStatus,'males'=>$males,'females'=>$females,'totals'=>$totals,'school_year'=>$enrolment_year,'bottom_total'=>$bottom_total,'numRows'=>$numRows,'allYear'=>$years];
 }else {
    return ['numRows'=>$numRows];
 }
}











//advanced filter
public function advancedFilter(Request $request){
    $fromYear=$request->input('fromYear');
    $toYear=$request->input('toYear');
    $status=$request->input('status');
//selectable
if($fromYear < $toYear){
$startYear=$fromYear;
$endYear=$toYear;

  }else {

    $startYear=$toYear;
    $endYear=$fromYear;
  }
$selectedOption=$status;
$getStatus=$this->getStatus($selectedOption);
$selectYears=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
$getQualification=$this->getQualification();
//header
$header=['QUALIFICATION','GENDER'];
foreach($selectYears as $y){
$school_years[]=$y->school_year;
array_push($header,strtoupper($y->school_year.' - '.$getStatus));
$bottom_total[]=number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('status',$selectedOption)->where('school_year',$y->school_year)->sum('teacher_count'));

}



//gender

foreach($getQualification as $q){
    foreach($selectYears as $y){


        $males[]=array(
            'id'=>$q->id,
            'name'=>$q->qualification,
            'year'=>$y->school_year,
            'males'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('gender','male')->where('qualification',$q->id)->where('status',$selectedOption)->where('school_year',$y->school_year)->sum('teacher_count'))
            );


            $females[]=array(
                'id'=>$q->id,
                'name'=>$q->qualification,
                'year'=>$y->school_year,
                'females'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('gender','female')->where('qualification',$q->id)->where('status',$selectedOption)->where('school_year',$y->school_year)->sum('teacher_count'))
                );



                $totals[]=array(
                    'id'=>$q->id,
                    'name'=>$q->qualification,
                    'year'=>$y->school_year,
                    'totals'=>number_format(PrimaryTeacherGenderQualificationModel::select('teacher_count')->where('qualification',$q->id)->where('status',$selectedOption)->where('school_year',$y->school_year)->sum('teacher_count'))
                    );




    }





}




return ['header'=>$header,'qualification'=>$getQualification,'status'=>$getStatus,'males'=>$males,'females'=>$females,'totals'=>$totals,'school_year'=>$selectYears,'bottom_total'=>$bottom_total];







}




















}
