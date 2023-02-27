<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolStatusModel;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimarySchoolWaterSourceDistanceModel;
use App\Models\WaterSourceModel;
class PrimarySchoolWaterSourceDistanceApi extends Controller
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






//school status
public function getSchoolStatus($id=''){
if($id!=''){
$get=SettingsSchoolStatusModel::select('id','status')->where('id',$id)->orderBy('status','ASC')->get();
}else{
    $get=SettingsSchoolStatusModel::select('id','status')->where('id',1)->orWhere('id',2)->orderBy('status','ASC')->get();
}

return $get;
}







//Distance to nearest water source
public function getWaterSourceDistance($id=''){
    if($id!=''){
$get=WaterSourceModel::select('id','distance')->where('id',$id)->orderBy('distance','ASC')->get();
    }else{

        $get=WaterSourceModel::select('id','distance')->orderBy('distance','ASC')->get();
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







//Api
    public function index()
    {

$numRows=PrimarySchoolWaterSourceDistanceModel::count();


if($numRows > 0){

$getDistance=$this->getWaterSourceDistance();
$getStatus=$this->getSchoolStatus();
$getYear=$this->getSchoolYears();
$getDistrict=$this->getDistrict();
$getRegion=$this->getRegion();

foreach($getYear as $y){
$year[]=$y->school_year;
}
$school_year=max($year);




//header
$header=['REGION','DISTRICT','OWNERSHIP'];
foreach($getDistance as $d){
array_push($header,strtoupper($d->distance));
$bottom_total[]=number_format( PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('distance',$d->id)->sum('school_count'));
}

//district
foreach($getDistrict as $d){
foreach($getDistance as $ds){

$body[]=array(
'id'=>$d->id,
'distance'=>$ds->id,
'year'=>$school_year,

'government'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('distance',$ds->id)->where('district',$d->id)->where('status',1)->sum('school_count')),


'private'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('distance',$ds->id)->where('district',$d->id)->where('status',2)->sum('school_count')),


'totals'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')
->where('school_year',$school_year)->where('distance',$ds->id)
->Where('status',1)
->where('district',$d->id)->sum('school_count')+
PrimarySchoolWaterSourceDistanceModel::select('school_count')
->where('school_year',$school_year)->where('distance',$ds->id)
->Where('status',2)
->where('district',$d->id)->sum('school_count')


)

);


}
}


foreach($getRegion as $r){
foreach($getDistance as $d){
$region_total[]=array(
'id'=>$r->id,
'year'=>$school_year,
'distance'=>$d->id,
'total'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)
->where('region',$r->id)
->where('distance',$d->id)
->sum('school_count')

)





);

}


}
return ['header'=>$header,'distance'=>$getDistance,'status'=>$getStatus,'school_year'=>$school_year,'select_year'=>$year,'region'=>$getRegion,'district'=>$getDistrict,'body'=>$body,'region_total'=>$region_total,'bottom_total'=>$bottom_total,'numRows'=>$numRows];
 }else{

    return ['numRows'=>$numRows];

 }






}










//filter
public function filter( Request  $request)
{

    $regioni= $request->input('region');
    $districti= $request->input('district');
    $distance= $request->input('distance');
    $status= $request->input('status');
    $sYear= $request->input('year');

$getDistance=$this->getWaterSourceDistance($distance);
$getStatus=$this->getSchoolStatus($status);
$getYear=$this->getSchoolYears($sYear);
$selectId='';
if($districti!=''){

    $getDistricti=$this->getDistrict($districti);

    foreach($getDistricti as $regionId);
    if($regioni==''){
    $getRegion=$this->getRegion($regionId->region_id);
    $getDistrict=$this->getDistrict($districti);
    $selectId=$regionId->region_id;
     }else{
        if($regioni==$regionId->region_id){

        $getRegion=$this->getRegion($regionId->region_id);

$getDistrict=$this->getDistrict($districti);
$selectId=$regionId->region_id;

        }else{
$getRegion=$this->getRegion($regioni);
$getDistrict=$this->getDistrict();
$selectId=$regioni;
             }


     }
}
else{
$getRegion=$this->getRegion($regioni);
$selectId=$regioni;
$getDistrict=$this->getDistrict();

}
foreach($getYear as $y){
$year[]=$y->school_year;
}
$school_year=max($year);




//header
$header=['REGION','DISTRICT','OWNERSHIP'];
if($selectId!=''){

    foreach($getDistance as $d){
        array_push($header,strtoupper($d->distance));
        $bottom_total[]=number_format( PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('region',$selectId)->where('distance',$d->id)->sum('school_count'));
        }
}else{
foreach($getDistance as $d){
array_push($header,strtoupper($d->distance));
$bottom_total[]=number_format( PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('distance',$d->id)->sum('school_count'));
}
}
//district
foreach($getDistrict as $d){
foreach($getDistance as $ds){

$body[]=array(
'id'=>$d->id,
'distance'=>$ds->id,
'year'=>$school_year,

'government'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('distance',$ds->id)->where('district',$d->id)->where('status',1)->sum('school_count')),


'private'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)->where('distance',$ds->id)->where('district',$d->id)->where('status',2)->sum('school_count')),


'totals'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')
->where('school_year',$school_year)->where('distance',$ds->id)
->Where('status',1)
->where('district',$d->id)->sum('school_count')+
PrimarySchoolWaterSourceDistanceModel::select('school_count')
->where('school_year',$school_year)->where('distance',$ds->id)
->Where('status',2)
->where('district',$d->id)->sum('school_count')


)

);


}
}


foreach($getRegion as $r){

foreach($getDistance as $d){

$region_total[]=array(
'id'=>$r->id,
'year'=>$school_year,
'distance'=>$d->id,
'total'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$school_year)
->where('region',$r->id)
->where('distance',$d->id)
->sum('school_count')

)





);

}


}
return ['header'=>$header,'distance'=>$getDistance,'status'=>$getStatus,'school_year'=>$school_year,'select_year'=>$year,'region'=>$getRegion,'district'=>$getDistrict,'body'=>$body,'region_total'=>$region_total,'bottom_total'=>$bottom_total];


}











//Api
public function advancedFilter(Request $request)
{
$fromYear=$request->input('fromYear');
$toYear=$request->input('toYear');
$selectedId=$request->input('selectedId');
$startYear=$fromYear;
$endYear=$toYear;
$selectedOption=$selectedId;

$getDistance=$this->getWaterSourceDistance($selectedOption);
foreach($getDistance as $d);
$distanceName=$d->distance;
$distanceID=$d->id;

$getStatus=$this->getSchoolStatus();
$getYear=$get=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($getYear as $y){
$years[]=$y->school_year;
}

$getDistrict=$this->getDistrict();
$getRegion=$this->getRegion();

$header=['REGION','DISTRICT','OWNERSHIP'];
foreach($getDistance as $d){
foreach($years as $y){
array_push($header,$y.' - '.$distanceName);



$bottom_total[]=number_format( PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$y)->where('distance',$distanceID)
->where('status',1)
->sum('school_count')+
PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$y)->where('distance',$distanceID)
->where('status',2)
->sum('school_count')


);

}

}





//district
foreach($getDistrict as $d){
    foreach($years as $y){

    $body[]=array(
    'id'=>$d->id,
    'distance'=>$distanceID,
    'year'=>$y,

    'government'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$y)->where('distance',$distanceID)->where('district',$d->id)->where('status',1)->sum('school_count')),


    'private'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$y)->where('distance',$distanceID)->where('district',$d->id)->where('status',2)->sum('school_count')),


    'totals'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')
    ->where('school_year',$y)->where('distance',$distanceID)
    ->Where('status',1)
    ->where('district',$d->id)->sum('school_count')+
    PrimarySchoolWaterSourceDistanceModel::select('school_count')
    ->where('school_year',$y)->where('distance',$distanceID)
    ->Where('status',2)
    ->where('district',$d->id)->sum('school_count')


    )

    );


    }
    }







    foreach($getRegion as $r){

        foreach($years as $y){

        $region_total[]=array(
        'id'=>$r->id,
        'year'=>$y,
        'distance'=>$distanceID,
        'total'=>number_format(PrimarySchoolWaterSourceDistanceModel::select('school_count')->where('school_year',$y)
        ->where('region',$r->id)
        ->where('distance',$distanceID)
        ->sum('school_count')

        )





        );

        }


        }





        return ['header'=>$header,'distance'=>$getDistance,'status'=>$getStatus,'select_year'=>$years,'region'=>$getRegion,'district'=>$getDistrict,'body'=>$body,'region_total'=>$region_total,'bottom_total'=>$bottom_total];




}















}






