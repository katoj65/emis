<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\PrimaryTeacherPayrollModel;






class PrimaryTeacherPayRollApi extends Controller{
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






//gender function
public function selectGender($gender=''){
if($gender!=''){
if($gender=='Male' or $gender=='Female'){
return $gender;
}else{
return null;
}
}else{
return ['Males','Female'];
}
}







//chart format
public function chartFormation($id,$years){
foreach($years as $y){
$yr=$y->school_year;
$response[]=array(
$yr,
PrimaryTeacherPayrollModel::select('teacher_total')
->where('school_year',$yr)->where('pay_roll',$id)->sum('teacher_total')
);

}

return $response;

}




//the main Api
public function index(){

    $numRow=PrimaryTeacherPayrollModel::count();

    if($numRow>0) {
$years=$this->getSchoolYears();

// get years
$header=['PAYROLL STATUS','GENDER'];
foreach($years as $yy){
$yr[]=$yy->school_year;
array_push($header,$yy->school_year);
$grandTotal[]=number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('school_year',$yy->school_year)->sum('teacher_total'));
}

$maxYear=max($yr);
$minYear=min($yr);




$payRollStatus=[['name'=>'On Payroll','id'=>'true'],['name'=>'Not on Payroll','id'=>'false']];

foreach($payRollStatus as $status){
$id=$status['id'];
$name=$status['name'];

foreach($yr as $y){

//males
$males[]=array(
'id'=>$id,
'enrolment_year'=>$y,
'males'=>number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','male')->sum('teacher_total')),
);

//females
$females[]=array(
    'id'=>$id,
    'females'=>number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','female')->sum('teacher_total'))

);




//totals
$total[]=array(
    'id'=>$id,
    'totals'=>number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','female')->sum('teacher_total')+
    PrimaryTeacherPayrollModel::select('total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','male')->sum('teacher_total'))

);


}


}





//chart
foreach($payRollStatus as $status){
    $id=$status['id'];
    $name=$status['name'];
$chart[]=array(
'name'=>$name,
'data'=>$this->chartFormation($id,$years)

);
}






return ['payroll'=>$payRollStatus,'filterYears'=>$yr,'header'=>$header,'males'=>$males,'females'=>$females,'totals'=>$total,'grand_total'=>$grandTotal,'chart'=>$chart,'numRow'=>$numRow,'minYear'=>$minYear,'maxYear'=>$maxYear];
}else{

    return ['numRow'=>$numRow];
}

}








//filter
public function filterpayroll(Request $request){

    $yearfilter=$request->input('year');
    $years=$this->getSchoolYears($yearfilter);
    // get years
    $header=['PAYROLL STATUS','GENDER'];
    foreach($years as $yy){
    $yr[]=$yy->school_year;
    array_push($header,$yy->school_year);
    $grandTotal[]=number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('school_year',$yy->school_year)->sum('teacher_total'));


    }






    $payRollStatus=[['name'=>'Not on Payroll','id'=>'false'],['name'=>'On Payroll','id'=>'true']];

    foreach($payRollStatus as $status){
    $id=$status['id'];
    $name=$status['name'];

    foreach($yr as $y){

    //males
    $males[]=array(
    'id'=>$id,
    'enrolment_year'=>$y,
    'males'=>number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','male')->sum('teacher_total')),
    );

    //females
    $females[]=array(
        'id'=>$id,
        'females'=>number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','female')->sum('teacher_total'))

    );




    //totals
    $total[]=array(
        'id'=>$id,
        'totals'=>number_format(PrimaryTeacherPayrollModel::select('teacher_total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','female')->sum('teacher_total')+
        PrimaryTeacherPayrollModel::select('total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','male')->sum('teacher_total'))

    );


    }


    }





    //chart
    foreach($payRollStatus as $status){
        $id=$status['id'];
        $name=$status['name'];
    $chart[]=array(
    'name'=>$name,
    'data'=>$this->chartFormation($id,$years)

    );
    }



    return ['payroll'=>$payRollStatus,'filterYears'=>$yr,'header'=>$header,'males'=>$males,'females'=>$females,'totals'=>$total,'grand_total'=>$grandTotal,'chart'=>$chart];

    }








//advanced filter

public function advancedFilter(request $request){
    $fromYear=$request->input('fromYear');
    $toYear=$request->input('toYear');

    if($fromYear < $toYear ){

 $startYear=$fromYear;
$endYear=$toYear;
    }else{
        $startYear=$toYear;
        $endYear= $fromYear;
    }



//header
$header=['PAYROLL STATUS','GENDER'];
$years=ModelsSchoolYearModel::select('id','school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($years as $y){
$school_year[]=$y->school_year;
array_push($header,$y->school_year);

//grand total
$grandTotal[]=number_format(PrimaryTeacherPayrollModel::select('total')->where('school_year',$y->school_year)->sum('teacher_total'));

}


$payRollStatus=[['name'=>'Not on Payroll','id'=>'false'],['name'=>'On Payroll','id'=>'true']];


//loop rolls status
foreach($payRollStatus as $status){
    $id=$status['id'];
    $name=$status['name'];

    foreach($school_year as $y){

//males
        $males[]=array(
            'id'=>$id,
            'enrolment_year'=>$y,
            'males'=>number_format(PrimaryTeacherPayrollModel::select('total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','male')->sum('teacher_total')),
            );



//females
$females[]=array(
    'id'=>$id,
    'females'=>number_format(PrimaryTeacherPayrollModel::select('total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','female')->sum('teacher_total'))

);



//totals
$total[]=array(
    'id'=>$id,
    'totals'=>number_format(PrimaryTeacherPayrollModel::select('total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','female')->sum('teacher_total')+
    PrimaryTeacherPayrollModel::select('total')->where('pay_roll',$id)->where('school_year',$y)->where('gender','male')->sum('teacher_total'))

);


    }

}


return ['payroll'=>$payRollStatus,'filterYears'=>$school_year,'header'=>$header,'males'=>$males,'females'=>$females,'totals'=>$total,'grand_total'=>$grandTotal];

}


















}
