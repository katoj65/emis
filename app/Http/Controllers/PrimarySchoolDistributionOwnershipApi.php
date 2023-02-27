<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimarySchoolDistributionModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel as SchoolRegisterModel;
use App\Models\PrimaryEnrolmentSchoolFounderGenderModel;



class PrimarySchoolDistributionOwnershipApi extends Controller{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */



//get enrolment years
public function getSchoolYears($year=''){
if($year!=''){
$get=ModelsSchoolYearModel::select('school_year')->where('school_year',$year)->get();
}else{
$get=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->get();
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



















public function index(){
$years=$this->getSchoolYears();

// get years
foreach($years as $yy){
$yr[]=$yy->school_year;
}
$defaultYear=max($yr);





$ownership=[];
$main=PrimarySchoolDistributionModel::select('founded_by')
->distinct()
->orderBy('founded_by','ASC')
->get();
foreach($main as $content){
array_push($ownership,$content->founded_by);
}



//school registration header
$header=[];
$register=SchoolRegisterModel::select('status')->orderBy('status','DESC')->get();
foreach($register as $reg){
array_push($header,$reg->status);
}


//get
$content=PrimarySchoolDistributionModel::select('founded_by')
->distinct()
->orderBy('founded_by','ASC')
->get();
foreach($content as $list){
    $t1=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('founded_by',$list->founded_by)
    ->where('registration_status','Registered')
    ->sum('school_total'));

    $t2=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('founded_by',$list->founded_by)
    ->where('registration_status','Not Registered')
    ->sum('school_total'));

    $t3=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('founded_by',$list->founded_by)
    ->where('registration_status','Licensed')
    ->sum('school_total'));

    $t4=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('founded_by',$list->founded_by)
    ->where('registration_status','Dont Know')
    ->sum('school_total'));



$founded[]=array(
'founded_by'=>$list->founded_by,
'registered'=>number_format($t1),

'none_registered'=>number_format($t2),

'licensed'=>number_format($t3),

'unknown'=>number_format($t4),


);


}














return ['ownership'=>$ownership,'filterYears'=>$yr,'defaultYear'=>$defaultYear,'header'=>$header,'body'=>$founded];


}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
