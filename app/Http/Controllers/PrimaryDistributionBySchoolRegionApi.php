<?php

namespace App\Http\Controllers;

use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\AdminUnitsCountyModel;
use Illuminate\Http\Request;
use App\Models\PrimarySchoolDistributionModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel as SchoolRegisterModel;
use App\Models\SettingsFoundingBodyModel as SchoolFounderModel;
use App\Model\SettingsSchoolRegionModel;
use App\Models\SettingsSchoolRegionModel as ModelsSettingsSchoolRegionModel;
use App\Models\PrimarySchoolDistributionRegionModel;


class PrimaryDistributionBySchoolRegionApi extends Controller
{
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






//school founder
public function getSchoolFounder($founder=''){
if($founder!=''){
$get=SchoolFounderModel::where('name',$founder)->orderBy('id','ASC')->get();
}else{
$get=SchoolFounderModel::orderBy('id','ASC')->get();
}
return $get;
}





//chart formation
public function getChartFormation($schoolYear,$region,$schoolFounder){
foreach($schoolFounder as $founder){
$response[]=array(
$founder->name,
PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$schoolYear)
->where('founded_by',$founder->name)
->where('region',$region)
->sum('school_total')
);

}
return $response;
}


//school region function
public function getSchoolRegion($item=''){
if($item!=''){
$response=ModelsSettingsSchoolRegionModel::where('school_region',$item)->orderBy('school_region','DESC')->get();
}else{
    $response=ModelsSettingsSchoolRegionModel::orderBy('school_region','DESC')->get();
}

return $response;

}




//chart formation
public function chartFormation($founder,$schoolRegionList,$year){
foreach($schoolRegionList as $list){
$response[]=array(
$list->school_region,
100





);
}




}







public function index(){
$numRows=PrimarySchoolDistributionRegionModel::count();
if($numRows > 0){
    $allFounder=SchoolFounderModel::orderBy('id','ASC')->get();
//selectable
$years=$this->getSchoolYears();
// get years
foreach($years as $yy){
$yr[]=$yy->school_year;
}
$defaultYear=max($yr);





//school founder
$schoolFounder=$this->getSchoolFounder();
//$regionList=$this->getRegion();
$schoolRegionList=$this->getSchoolRegion();


//School region
$header=['School Founding Body'];
$grandTotal=[];
foreach($schoolRegionList as $regionList){
//header
$heading=$regionList->school_region;
array_push($header,$heading);

//grand total
$schoolGrandTotal=$item[]=PrimarySchoolDistributionRegionModel::select('school_total')
->where('school_region',$regionList->school_region)
->where('enrolment_year',$defaultYear)
->sum('school_total');
array_push($grandTotal,$schoolGrandTotal);

}
array_push($header,'TOTAL');
array_push($grandTotal,array_sum($item));




//school founder
foreach($schoolFounder as $founder){
$tableFounder[]=array(
'founder_id'=>$founder->id,
'name'=>$founder->name
);


//chart data
$chartData[]=array(
'name'=>$founder->name,
'data'=>array(
$this->chartFormation($founder->name,$schoolRegionList,$defaultYear)
)
);





//table body
foreach($schoolRegionList as $region){
$tableBody[]=array(
'founder'=>$founder->name,
'item'=>PrimarySchoolDistributionRegionModel::select('school_total')
->where('founded_by',$founder->name)
->where('enrolment_year',$defaultYear)
->where('school_region',$region->school_region)
->sum('school_total')
);
}



//founder organisation total
$founderTotal[]=array(
'founder'=>$founder->name,
'total'=>PrimarySchoolDistributionRegionModel::select('school_total')
->where('founded_by',$founder->name)
->where('enrolment_year',$defaultYear)
->sum('school_total')
);





}




return $chartData;



//get api
return ['header'=>$header,'schoolFounder'=>$tableFounder,'tableBody'=>$tableBody,'founderTotal'=>$founderTotal,'grandTotal'=>$grandTotal,'numRows'=>$numRows,'defaultYear'=>$defaultYear,'filterYear'=>$yr,'allFounder'=>$allFounder,'schoolRegion'=>$schoolRegionList,
'chartData'=>$chartData];
}else{

    return ['numRows'=>$numRows];

}


}















public function filterFounder(Request  $request ){
    $numRows=PrimarySchoolDistributionRegionModel::count();
    if($numRows > 0){
$eFounder=$request->input('id');
$eyear=$request->input('enrolment_year');
$status=$request->input('status');
    $years=$this->getSchoolYears($eyear);
    // get years
    foreach($years as $yy){
    $yr[]=$yy->school_year;
    }
    $defaultYear=max($yr);





    //school founder
    $schoolFounder=$this->getSchoolFounder($eFounder);
    //$regionList=$this->getRegion();
    $schoolRegionList=$this->getSchoolRegion($status);


    //School region
    $header=['School Founding Body'];
    $grandTotal=[];
    foreach($schoolRegionList as $regionList){
    //header
    $heading=$regionList->school_region;
    array_push($header,$heading);

    //grand total
    $schoolGrandTotal=$item[]=PrimarySchoolDistributionRegionModel::select('school_total')
    ->where('school_region',$regionList->school_region)
    ->where('enrolment_year',$defaultYear)
    ->sum('school_total');
    array_push($grandTotal,$schoolGrandTotal);

    }
    array_push($header,'TOTAL');
    array_push($grandTotal,array_sum($item));




    //school founder
    foreach($schoolFounder as $founder){
    $tableFounder[]=array(
    'founder_id'=>$founder->id,
    'name'=>$founder->name
    );

    //table body

    foreach($schoolRegionList as $region){
    $tableBody[]=array(
    'founder'=>$founder->name,
    'item'=>PrimarySchoolDistributionRegionModel::select('school_total')
    ->where('founded_by',$founder->name)
    ->where('enrolment_year',$defaultYear)
    ->where('school_region',$region->school_region)
    ->sum('school_total')
    );
    }



    //founder organisation total
    $founderTotal[]=array(
    'founder'=>$founder->name,
    'total'=>PrimarySchoolDistributionRegionModel::select('school_total')
    ->where('founded_by',$founder->name)
    ->where('enrolment_year',$defaultYear)
    ->sum('school_total')
    );

    }




    //get api
    return ['header'=>$header,'schoolFounder'=>$tableFounder,'tableBody'=>$tableBody,'founderTotal'=>$founderTotal,'grandTotal'=>$grandTotal,'numRows'=>$numRows,'defaultYear'=>$defaultYear,'filterYear'=>$yr];
    }else{

        return ['numRows'=>$numRows];

    }


    }






///search
public function searchFounder(Request $request){
        $search=$request->input('founder');
        $schoolFounder=SchoolFounderModel::where('name','like','%'.$search.'%')->orderBy('id','ASC')->get();
        $numRows=count($schoolFounder);
        if($numRows > 0){

    $years=$this->getSchoolYears();
    // get years
    foreach($years as $yy){
    $yr[]=$yy->school_year;
    }
    $defaultYear=max($yr);

    //school founder

    //$regionList=$this->getRegion();
    $schoolRegionList=$this->getSchoolRegion();


    //School region
    $header=['School Founding Body'];
    $grandTotal=[];
    foreach($schoolRegionList as $regionList){
    //header
    $heading=$regionList->school_region;
    array_push($header,$heading);

    //grand total
    $schoolGrandTotal=$item[]=PrimarySchoolDistributionRegionModel::select('school_total')
    ->where('school_region',$regionList->school_region)
    ->where('enrolment_year',$defaultYear)
    ->sum('school_total');
    array_push($grandTotal,$schoolGrandTotal);

    }
    array_push($header,'TOTAL');
    array_push($grandTotal,array_sum($item));




    //school founder
    foreach($schoolFounder as $founder){
    $tableFounder[]=array(
    'founder_id'=>$founder->id,
    'name'=>$founder->name
    );

    //table body

    foreach($schoolRegionList as $region){
    $tableBody[]=array(
    'founder'=>$founder->name,
    'item'=>PrimarySchoolDistributionRegionModel::select('school_total')
    ->where('founded_by',$founder->name)
    ->where('enrolment_year',$defaultYear)
    ->where('school_region',$region->school_region)
    ->sum('school_total')
    );
    }



    //founder organisation total
    $founderTotal[]=array(
    'founder'=>$founder->name,
    'total'=>PrimarySchoolDistributionRegionModel::select('school_total')
    ->where('founded_by',$founder->name)
    ->where('enrolment_year',$defaultYear)
    ->sum('school_total')
    );

    }




    //get api
    return ['header'=>$header,'schoolFounder'=>$tableFounder,'tableBody'=>$tableBody,'founderTotal'=>$founderTotal,'grandTotal'=>$grandTotal,'noResults'=>$numRows,'defaultYear'=>$defaultYear,'filterYear'=>$yr];
    }else{

        return ['noResults'=>$numRows];

    }


    }









//advanced filter
public function advancedFilter(){

//selectable
$startYear=2016;
$endYear=2009;
//$selectd=


//school founder
$schoolFounder=$this->getSchoolFounder();
//$regionList=$this->getRegion();
$schoolRegionList=$this->getSchoolRegion();







}





























}






