<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\DistrictModel;
use App\Models\PrimaryTeacherGenderOwnershipModel;
use App\Models\SettingsSchoolsRegistryStatusModel;
use App\Models\SettingsFoundingBodyModel;
use App\Models\PrimarySchoolLicensedModel;

class PrimarySchoolLicenced extends Controller
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

//school registration status
public function registration($id=''){
if($id!=''){
$get=SettingsSchoolsRegistryStatusModel::where('id',$id)->orderBy('id','ASC')->get();
}else{
$get=SettingsSchoolsRegistryStatusModel::orderBy('id','ASC')->get();
}
return $get;
}




//founding body
public function founder($id=''){
if($id!=''){
$get=SettingsFoundingBodyModel::where('id',$id)->orderBy('id','ASC')->get();
}else{
$get=SettingsFoundingBodyModel::orderBy('id','ASC')->get();
}
return $get;
}





//chart functionality
public function chartFunctionality($year,$reg){
foreach($reg as $r){
$response[]=array(
$r->status,
PrimarySchoolLicensedModel::select('school')->where('reg_status',$r->id)->where('year',$year)->sum('school')
);
}
return $response;
}







public function index(){
$count=count(PrimarySchoolLicensedModel::get());
if($count>0){


//years
$years=$this->getSchoolYears();
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);
$maxY=max($mx);
$minY=min($mx);

//registration list
$reg=$this->registration();
//founder
$founder=$this->founder();


//options
$reg_list=$this->registration();
$founder_list=$this->founder();
$years_select=$this->getSchoolYears();


//header
$header=['SCHOOL FOUNDER'];
foreach($reg as $r){
array_push($header,$r->status);

$total[]=number_format(PrimarySchoolLicensedModel::select('school')->where('year',$enrolment_year)->where('reg_status',$r->id)->sum('school'));
}



//school
foreach($founder as $f){
foreach($reg as $r){
$school[]=array(
'founder'=>$f->name,
'register'=>$r->status,
'id'=>$f->id,
'year'=>$enrolment_year,
'item'=>number_format(PrimarySchoolLicensedModel::select('school')->where('founder',$f->id)->where('year',$enrolment_year)->where('reg_status',$r->id)->sum('school')));
}



//chart
$chartData[]=array(
'name'=>$f->name,
'data'=>$this->chartFunctionality($enrolment_year,$reg)
);
}




return ['chartData'=>$chartData,'school'=>$school,'header'=>$header,'registration'=>$reg,'founder'=>$founder,'year'=>$enrolment_year,'count'=>$count,'total'=>$total,'option_year'=>$years_select,'maxY'=>$maxY,'minY'=>$minY,'option_reg'=>$reg_list,'option_founder'=>$founder_list];


}else{
return ['count'=>0];
}
}







//filter
public function filter(Request $request){
    $count=count(PrimarySchoolLicensedModel::get());
    if($count>0){
$select_founder=$request->f;
$select_year=$request->y;
$select_reg=$request->r;

if($select_founder!='' or $select_reg!='' or $select_year!=''){
//registration list
$reg=$this->registration($select_reg);
//founder
$founder=$this->founder($select_founder);
//options
$reg_list=$this->registration();
$founder_list=$this->founder();





//years
$years_select=$this->getSchoolYears();
$years=$this->getSchoolYears($select_year);
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);
$maxY=max($mx);
$minY=min($mx);



//header
$header=['SCHOOL FOUNDER'];
foreach($reg as $r){
array_push($header,$r->status);


if($select_founder!=''){
    $total[]=number_format(PrimarySchoolLicensedModel::select('school')->where('year',$enrolment_year)->where('founder',$select_founder)->where('reg_status',$r->id)->sum('school'));
}else{

$total[]=number_format(PrimarySchoolLicensedModel::select('school')->where('year',$enrolment_year)->where('reg_status',$r->id)->sum('school'));
}



}



//school
foreach($founder as $f){
    foreach($reg as $r){
    $school[]=array(
    'founder'=>$f->name,
    'register'=>$r->status,
    'id'=>$f->id,
    'year'=>$enrolment_year,
    'item'=>number_format(PrimarySchoolLicensedModel::select('school')->where('founder',$f->id)->where('year',$enrolment_year)->where('reg_status',$r->id)->sum('school')));
    }



    //chart
    $chartData[]=array(
    'name'=>$f->name,
    'data'=>$this->chartFunctionality($enrolment_year,$reg)
    );
    }


    return ['chartData'=>$chartData,'school'=>$school,'header'=>$header,'registration'=>$reg,'founder'=>$founder,'year'=>$enrolment_year,'count'=>$count,'total'=>$total,'option_year'=>$years_select,'maxY'=>$maxY,'minY'=>$minY,'option_reg'=>$reg_list,'option_founder'=>$founder_list];


}

    }else{
        return(['count'=>0]);
    }
}





//get date range
public function getDateRange($start,$end){
if($start!='' and $end!=''){
$get=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$start,$end])->orderBy('school_year','DESC')->get();
return $get;
}else{
return ('error');
}
}






//advanced filter
public function advancedFilter(Request $request){
$start=$request->s;
$end=$request->e;
$select_reg=$request->r;
$select_founder=$request->f;
if($end>$start){

//founder
$founder=$this->founder($select_founder);
//registration
$reg=$this->registration($select_reg);
$years=$this->getDateRange($start,$end);

//header
$header=['YEAR','SCHOOL FOUNDER'];
foreach($reg as $r){
array_push($header,$r->status);
//year total
foreach($years as $yy){

if($select_founder!=''){
    $num=number_format(PrimarySchoolLicensedModel::select('school')->where('year',$yy->school_year)->where('reg_status',$r->id)->where('founder',$select_founder)->sum('school'));
}else{
    $num=number_format(PrimarySchoolLicensedModel::select('school')->where('year',$yy->school_year)->where('reg_status',$r->id)->sum('school'));
}

$year_total[]=array(
'year'=>$yy->school_year,
'status'=>$r->status,
'num'=>$num
);

}

//grand total
if($select_founder!=''){
    $grandTotal[]=number_format(PrimarySchoolLicensedModel::select('school')->whereBetween('year',[$start,$end])->where('reg_status',$r->id)->where('founder',$select_founder)->sum('school'));
}else{
    $grandTotal[]=number_format(PrimarySchoolLicensedModel::select('school')->whereBetween('year',[$start,$end])->where('reg_status',$r->id)->sum('school'));
}
}


//years selected
foreach($years as $yy){
$year_list[]=array(
'year'=>$yy->school_year,
);

//


}

//founder
foreach($founder as $f){
foreach($years as $y){
$founder_list[]=array(
'name'=>$f->name,
'id'=>$f->id,
'year'=>$y->school_year
);


//register
foreach($reg as $r){
$founder_data[]=array(
'year'=>$y->school_year,
'founderID'=>$f->id,
'num'=>number_format(PrimarySchoolLicensedModel::select('school')->where('founder',$f->id)->where('year',$y->school_year)->where('reg_status',$r->id)->sum('school'))


);
}

}
}













return['header'=>$header,'list_year'=>$year_list,'year_total'=>$year_total,'grand_total'=>$grandTotal,'founder_list'=>$founder_list,'founder_data'=>$founder_data];




}else{
    return['error'=>'Start year must be greater than end year'];
}

}



















}
