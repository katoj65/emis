<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimarySchoolBorderStatusModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolTypeModel;
use App\Models\primarySchoolStatusByRegionModel;



class PrimarySchoolBoarderStatusByRegionAPI extends Controller{
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
public function chartFormatter($enrolment_year,$schoolType,$region){
foreach($schoolType as $t){
$response[]=array(
$t->type,
primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)->where('school_status',$t->id)->where('region',$region)->sum('school_count')
);
}
return $response;
}









//the main Api
public function index(){

    $numRows=primarySchoolStatusByRegionModel::count();
    if($numRows>0){
$years=$this->getSchoolYears();
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);

$region=$this->getRegion();
$district=$this->getDistrict();
$schoolType=$this->school_type();

//school type
$header=['REGION','DISTRICT'];
foreach($schoolType as $t){
array_push($header,$t->type);
}


//school status
foreach($district as $d){
foreach($schoolType as $t){
$school_count[]=array(
'id'=>$d->id,
'name'=>$d->name,
'year'=>$enrolment_year,
'type'=>$t->type,
'item'=>number_format(
    primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)->where('district',$d->id)->where('school_status',$t->id)->sum('school_count')
)
);

}

}





//grand total
foreach($schoolType as $t){
$grand_total[]=number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)->where('school_status',$t->id)->sum('school_count'));

}



//region total
foreach($region as $r){
foreach($schoolType as $t){
$region_total[]=array(
'region'=>$r->id,
'name'=>$r->name,
'type'=>$t->type,
'item'=>number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)
->where('region',$r->id)->where('school_status',$t->id)->sum('school_count'))
);
}



//chart
$chart[]=array(
    'name'=>$r->name,
    'data'=>$this->chartFormatter($enrolment_year,$schoolType,$r->id));

}



return ['region_total'=>$region_total,'bottom_total'=>$grand_total,'school_count'=>$school_count,'header'=>$header,'chartData'=>$chart,'numRows'=>$numRows,'allyears'=>$years,'region'=>$region,'district'=>$district,'school_type'=>$schoolType,'defaultYear'=>$enrolment_year];

 }else{
    return ['numRows'=>$numRows];
 }

}










//filterRegion
public function filterRegion(Request $request){
 $regionfilter=$request->input('region');
 $districtfilter=$request->input('district');
 $yearfilter=$request->input('year');
 $schoolTyped=$request->input('schoolTyped');
 $selectedId='';
   if($districtfilter!='' ){
            if($districtfilter!=''and $regionfilter!=''){


                $district=AdminUnitsDistrictModel::where('id',$districtfilter)->get();

            foreach($district as $getDistrict);
            if($getDistrict->region_id != $regionfilter){
                $district=AdminUnitsDistrictModel::get();

        $region=$this->getRegion($regionfilter);
        $selectedId=$regionfilter;
            }else{
            $region= AdminUnitsRegionModel::where('id',$getDistrict->region_id)->orderBy('name','ASC')->get();
            $selectedId=$getDistrict->region_id;
        }
            }else{

                $district=AdminUnitsDistrictModel::where('id',$districtfilter)->get();
            foreach($district as $getDistrict);
            $region= AdminUnitsRegionModel::where('id',$getDistrict->region_id)->orderBy('name','ASC')->get();
            $selectedId=$getDistrict->region_id;
            }



         }else{

            $region=$this->getRegion($regionfilter);
 $district=$this->getDistrict();


            $selectedId=$regionfilter;
         }














$years=$this->getSchoolYears($yearfilter);
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);


$schoolType=$this->school_type($schoolTyped);

//school type
$header=['REGION','DISTRICT'];
foreach($schoolType as $t){
array_push($header,$t->type);
}


//school status
foreach($district as $d){
foreach($schoolType as $t){
$school_count[]=array(
'id'=>$d->id,
'name'=>$d->name,
'year'=>$enrolment_year,
'type'=>$t->type,
'item'=>number_format(
    primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)->where('district',$d->id)->where('school_status',$t->id)->sum('school_count')
)
);

}

}

//grand total
if($selectedId!=''){
    foreach($schoolType as $t){
    $grand_total[]=number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)->where('school_status',$t->id)->where('region',$selectedId)->sum('school_count'));
}
}else{
foreach($schoolType as $t){
$grand_total[]=number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)->where('school_status',$t->id)->sum('school_count'));

}
}


//region total
foreach($region as $r){
foreach($schoolType as $t){
$region_total[]=array(
'region'=>$r->id,
'name'=>$r->name,
'type'=>$t->type,
'item'=>number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$enrolment_year)
->where('region',$r->id)->where('school_status',$t->id)->sum('school_count'))
);
}



//chart
$chart[]=array(
    'name'=>$r->name,
    'data'=>$this->chartFormatter($enrolment_year,$schoolType,$r->id));

}



return ['region_total'=>$region_total,'bottom_total'=>$grand_total,'school_count'=>$school_count,'header'=>$header,'chartData'=>$chart,'allyears'=>$years,'region'=>$region,'district'=>$district,'school_type'=>$schoolType,'defaultYear'=>$enrolment_year];



}











//advanced filter

public function advancedFilter(Request $request){
    $fromYear=$request->input('fromYear');
    $toYear=$request->input('toYear');
    $schoolTypedd=$request->input('schoolTypedd');

    $region=$this->getRegion();
    $district=$this->getDistrict();



//selectables
if($fromYear < $toYear ){
    $startYear=$fromYear;
$endYear=$toYear;
}else{

    $startYear=$toYear;
$endYear=$fromYear;

}

$select_type=$schoolTypedd;
$schoolType=$this->school_type($select_type);
foreach($schoolType as $t);
$selectedID=$t->id;
$selectedName=$t->type;



$selectYear=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
$header=['REGION','DISTRICT'];


foreach($selectYear as $y){
$enrolment_years[]=$y->school_year;
array_push($header,$y->school_year.' - '.$selectedName);


}



//region total
foreach($region as $r){
    foreach($schoolType as $t){
foreach($enrolment_years as $y){
    $region_total[]=array(
    'region'=>$r->id,
    'name'=>$r->name,
    'type'=>$t->type,
    'year'=>$y,
    'item'=>number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$y)
    ->where('region',$r->id)->where('school_status',$t->id)->sum('school_count'))
    );
    }
}

}






//grand total
foreach($schoolType as $t){
foreach($enrolment_years as $y){
    $grand_total[]=number_format(primarySchoolStatusByRegionModel::select('school_count')->where('year',$y)->where('school_status',$t->id)->sum('school_count'));
}
    }




//school status
foreach($district as $d){
    foreach($schoolType as $t){
foreach($enrolment_years as $y){
    $school_count[]=array(
    'id'=>$d->id,
    'name'=>$d->name,
    'year'=>$y,
    'type'=>$t->type,
    'item'=>number_format(
        primarySchoolStatusByRegionModel::select('school_count')->where('year',$y)->where('district',$d->id)->where('school_status',$t->id)->sum('school_count')
    )
    );

    }
    }
    }




return ['header'=>$header,'region_total'=>$region_total,'bottom_total'=>$grand_total,'school_count'=>$school_count,'region'=>$region,'district'=>$district,'selectedItem'=>$selectedName,'selectedYear'=>$enrolment_years];


}
























}
