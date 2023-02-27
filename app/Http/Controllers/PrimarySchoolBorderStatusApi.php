<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimarySchoolBorderStatusModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolTypeModel;


class PrimarySchoolBorderStatusApi extends Controller{
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





//get regions
public function getDistrict($id=''){
if($id!=''){
$get=AdminUnitsDistrictModel::select('name','id','region_id')->where('id',$id)->orderBy('name','ASC')->get();
}else{
$get=AdminUnitsDistrictModel::select('name','id','region_id')->orderBy('name','ASC')->get();
}
return $get;
}




//get school type
public function school_type($type=''){
if($type!=''){
$get=SettingsSchoolTypeModel::where('id',$type)->get();
}else{
$get=SettingsSchoolTypeModel::get();
}
return $get;
}




//chart functionality
public function chartFormatter($years,$type){
foreach($years as $y){
$response[]=array(
$y->school_year,
PrimarySchoolBorderStatusModel::select('school_count')->where('year',$y->school_year)->where('school_status',$type)->sum('school_count')
);
}
return $response;
}









//the main Api
public function index(){

    $numRows=PrimarySchoolBorderStatusModel::count();
    if($numRows>0){
$years=$this->getSchoolYears();
$region=$this->getRegion();
$district=$this->getDistrict();


$schoolType=$this->school_type();

//school type
$header=['SCHOOL TYPE'];
foreach($years as $y){
array_push($header,$y->school_year);
}


//school status

foreach($schoolType as $t){
$schoolT[]=array(
'id'=>$t->id,
'item'=>$t->type
);

//school status
foreach($years as $y){
$school_count[]=array(
'id'=>$t->id,
'name'=>$t->type,
'year'=>$y->school_year,
'item'=>number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('school_status',$t->id)->where('year',$y->school_year)->sum('school_count'))
);

}



//chart
$chart[]=array(
    'name'=>$t->type,
    'data'=>$this->chartFormatter($years,$t->id));

}


//grand total
foreach($years as $y){
$grand_total[]=number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('year',$y->school_year)->sum('school_count'));

}



return ['grand_total'=>$grand_total,'school_count'=>$school_count,'school_type'=>$schoolT,'header'=>$header,'chartData'=>$chart,'numRows'=>$numRows,'allyears'=>$years];
 }else{
    return ['numRows'=>$numRows];
 }

}








//filterSchool
public function filterSchool(Request $request ){


$yearfilter=$request->input('year');

$id=$request->input('id');

$years=$this->getSchoolYears($yearfilter);

$schoolType=$this->school_type($id);

//school type
$header=['SCHOOL TYPE'];
foreach($years as $y){
array_push($header,$y->school_year);
}


//school status

foreach($schoolType as $t){
$schoolT[]=array(
'id'=>$t->id,
'item'=>$t->type
);

//school status
foreach($years as $y){
$school_count[]=array(
'id'=>$t->id,
'name'=>$t->type,
'year'=>$y->school_year,
'item'=>number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('school_status',$t->id)->where('year',$y->school_year)->sum('school_count'))
);

}





//chart
$chart[]=array(
    'name'=>$t->type,
    'data'=>$this->chartFormatter($years,$t->id));

}


//grand total
if($id!=''){

    foreach($years as $y){
        $grand_total[]=number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('year',$y->school_year)
        ->where('school_status',$id)
        ->sum('school_count'));

        }
}else{

    foreach($years as $y){
        $grand_total[]=number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('year',$y->school_year)->sum('school_count'));

        }
}




return ['grand_total'=>$grand_total,'school_count'=>$school_count,'school_type'=>$schoolT,'header'=>$header,'chartData'=>$chart,'allyears'=>$years];


}




//advanced filter

public function advancedFilter( Request $request){
    $from=$request->input('fromYear');
    $toYear=$request->input('toYear');
    if( $from < $toYear ){
        $startYear=$from;
        $endYear=$toYear;
    }else{
        $startYear= $toYear;
        $endYear=$from;
    }


//selectable
$years=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();


$schoolType=$this->school_type();

    //school type
    $header=['SCHOOL TYPE'];
    foreach($years as $y){
    array_push($header,$y->school_year);
    }


    //school status

    foreach($schoolType as $t){
    $schoolT[]=array(
    'id'=>$t->id,
    'item'=>$t->type
    );

    //school status
    foreach($years as $y){
    $school_count[]=array(
    'id'=>$t->id,
    'name'=>$t->type,
    'year'=>$y->school_year,
    'item'=>number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('school_status',$t->id)->where('year',$y->school_year)->sum('school_count'))
    );

    }



    //chart
    $chart[]=array(
        'name'=>$t->type,
        'data'=>$this->chartFormatter($years,$t->id));

    }


    //grand total
    foreach($years as $y){
    $grand_total[]=number_format(PrimarySchoolBorderStatusModel::select('school_count')->where('year',$y->school_year)->sum('school_count'));

    }



    return ['grand_total'=>$grand_total,'school_count'=>$school_count,'school_type'=>$schoolT,'header'=>$header,'chartData'=>$chart,'allyears'=>$years];

}













}
