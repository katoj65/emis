<?php

namespace App\Http\Controllers;

use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;


use Illuminate\Http\Request;
use App\Models\PrimarySchoolDistributionModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel as SchoolRegisterModel;
use App\Models\SettingsFoundingBodyModel as SchoolFounderModel;


class PrimarySchoolDistributionByRegionFoundedBodyApi extends Controller
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



//get regions
public function getDistrict($id=''){
    if($id!=''){
    $get=AdminUnitsDistrictModel::select('name','id','region_id')->where('id',$id)->orderBy('name','ASC')->get();
    }else{
    $get=AdminUnitsDistrictModel::select('name','id','region_id')->orderBy('name','ASC')->get();
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










//get api
public function index(){

    $numRows=PrimarySchoolDistributionModel::count();

    //selectable
    if($numRows > 0){

        $getstatus=SchoolFounderModel::orderBy('id','ASC')->get();

//selectable
$years=$this->getSchoolYears();
// get years
foreach($years as $yy){
$yr[]=$yy->school_year;
}
$defaultYear=max($yr);

//school founder
//selectable
$schoolFounder=$this->getSchoolFounder();
$regionList=$this->getRegion();
$districtList=$this->getDistrict();
//school registration header
$header=['Region','District'];

$uganda=[];
foreach($schoolFounder as $founder){
$ugandaItem=$t[]=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('founded_by',$founder->name)
->sum('school_total'));
array_push($uganda,$ugandaItem);
array_push($header,$founder->name);
}




//content
foreach($districtList as $dl){
    $district=$dl->id;
    $year=$defaultYear;
    foreach($schoolFounder as $found){
$school[]=array(
'district'=>$district,
'item'=>number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$year)
->where('district',$district)
->where('founded_by',$found->name)
->sum('school_total'))
);
    }



//district sum
$districtSum[]=array(
'district'=>$district,
'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$year)
->where('district',$district)
->sum('school_total'))
);

}




//region sum
foreach($regionList as $region){
$year=$defaultYear;
$name=$region->name;
$region=$region->id;

foreach($schoolFounder as $found){
$regionSum[]=array(
'region'=>$region,
'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$year)
->where('region',$region)
->where('founded_by',$found->name)
->sum('school_total'))
);
}

//region total
$regionTotal[]=array(
'region'=>$region,
'total'=>number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$year)
->where('region',$region)
->sum('school_total'))
);




//chart data
$chart[]=array(
'name'=>$name,
'data'=>$this->getChartFormation($year,$region,$schoolFounder)

);

}




$allYear=ModelsSchoolYearModel::select('school_year')->orderBy('school_year','desc')
->whereBetween('school_year',['2006','2011'])->get();





//response
return ['table_region'=>$regionList,'table_district'=>$districtList,'table_years'=>$allYear,'enrolment_year'=>$defaultYear,'tableHeader'=>$header,'tableSchool'=>$school,'numRows'=>$numRows,'sumDistrict'=>$districtSum,'sumRegion'=>$regionSum,'uganda'=>$uganda,'regionTotal'=>$regionTotal,'getstatus'=>$getstatus,'chartData'=>$chart];
}else{

    return ['numRows'=>$numRows];
}
     }





//filter
     public function filterRegion(Request $request){

        $numRows=PrimarySchoolDistributionModel::count();
$id=$request->input('id');
$districtid=$request->input('district');
$selectedId='';
$enrolmentyear=$request->input('enrolment_year');

$status=$request->input('status');
        //selectable
        if($numRows > 0){
    //selectable
    $years=$this->getSchoolYears($enrolmentyear);

    $schoolFounder=$this->getSchoolFounder($status);

    $districtfilt=$this->getDistrict($districtid);

if($districtid!=''){
    foreach($districtfilt as $getDistrict);
    if($getDistrict->region_id==$id){
    $regionList=$this->getRegion($getDistrict->region_id);
    $districtList=$this->getDistrict($districtid);
    $selectedId=$id;
}else{
    if($districtid!='' and $id==''){
        $regionList=$this->getRegion($getDistrict->region_id);
        $districtList=$this->getDistrict($districtid);
        $selectedId=$getDistrict->region_id;
}else{
    $regionList=$this->getRegion($id);
    $selectedId=$id;
    $districtList=$this->getDistrict();
}

}

}else{
    $selectedId=$id;
    $regionList=$this->getRegion($id);
    $districtList=$this->getDistrict();
}

foreach($regionList as $getDistrict);
    $getDistrictall=AdminUnitsDistrictModel::where('region_id',$getDistrict->id)->select('id','name')->orderBy('name','ASC')
    ->get();
    // get years
    foreach($years as $yy){
    $yr[]=$yy->school_year;
    }
    $defaultYear=max($yr);

    //school founder
    //selectable

    //school registration header
    $header=['Region','District'];
    $uganda=[];

    if($selectedId!=''){


        foreach($schoolFounder as $founder){
            $ugandaItem=$t[]=number_format(PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('region',$selectedId)
            ->where('founded_by',$founder->name)
            ->sum('school_total'));
            array_push($uganda,$ugandaItem);
            array_push($header,$founder->name);
            }


    }else{
    foreach($schoolFounder as $founder){
    $ugandaItem=$t[]=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('founded_by',$founder->name)
    ->sum('school_total'));
    array_push($uganda,$ugandaItem);
    array_push($header,$founder->name);
    }
 }




    //content
    foreach($districtList as $dl){
        $district=$dl->id;
        $year=$defaultYear;
        foreach($schoolFounder as $found){
    $school[]=array(
    'district'=>$district,
    'item'=>number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$year)
    ->where('district',$district)
    ->where('founded_by',$found->name)
    ->sum('school_total'))
    );
        }



    //district sum
    $districtSum[]=array(
    'district'=>$district,
    'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$year)
    ->where('district',$district)
    ->sum('school_total'))
    );

    }




    //region sum
    foreach($regionList as $region){
    $year=$defaultYear;
    $name=$region->name;
    $region=$region->id;
    foreach($schoolFounder as $found){
    $regionSum[]=array(
    'region'=>$region,
    'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$year)
    ->where('region',$region)
    ->where('founded_by',$found->name)
    ->sum('school_total'))
    );
    }

    //region total
    $regionTotal[]=array(
    'region'=>$region,
    'total'=>number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$year)
    ->where('region',$region)
    ->sum('school_total'))
    );


    //chart data
$chart[]=array(
    'name'=>$name,
    'data'=>$this->getChartFormation($year,$region,$schoolFounder)

    );
    }





    $allYear=ModelsSchoolYearModel::select('school_year')->orderBy('school_year','desc')
    ->whereBetween('school_year',['2006','2011'])->get();


    //response
    return ['table_region'=>$regionList,'table_district'=>$districtList,'table_years'=>$allYear,'enrolment_year'=>$defaultYear,'tableHeader'=>$header,'tableSchool'=>$school,'numRows'=>$numRows,'sumDistrict'=>$districtSum,'sumRegion'=>$regionSum,'uganda'=>$uganda,'regionTotal'=>$regionTotal,'allRegionsDis'=>$getDistrictall,'chartData'=>$chart];
    }else{

        return ['numRows'=>$numRows];
    }
         }













//advanced filter
public function advancedFilter( Request $request){

    $fromYear=$request->input('fromYear');
    $toYear=$request->input('toYear');
    $statused=$request->input('statused');

$regionList=$this->getRegion();
$districtList=$this->getDistrict();

if($fromYear <  $toYear){
$startYear=$fromYear;
$endYear=$toYear;

 }else{

    $startYear= $toYear;
$endYear=$fromYear;

 }
$selectedFounder=$statused;
//selected
$schoolFounder=$this->getSchoolFounder($selectedFounder);
foreach($schoolFounder as $found);
$founderID=$found->id;
$founderName=$found->name;


$enrolment_years=ModelsSchoolYearModel::select('id','school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($enrolment_years as $y){
$selected_years[]=$y->school_year;
}


//selected years
$header=['REGION','DISTRICT'];
foreach($selected_years as $y){
array_push($header,$y.' - '.$founderName);
}




//content
foreach($districtList as $dl){
    $district=$dl->id;


    foreach($schoolFounder as $found){
foreach($enrolment_years as $y){
$school[]=array(
'district'=>$district,
'year'=>$y->school_year,
'name'=>$founderName,
'district_name'=>$dl->name,
'item'=>number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$y->school_year)
->where('district',$district)
->where('founded_by',$founderName)
->sum('school_total'))
);
}

}

}









//region sum
foreach($regionList as $region){
    $name=$region->name;
    $region=$region->id;

    foreach($schoolFounder as $found){

foreach($enrolment_years as $y){

    $regionSum[]=array(
    'region'=>$region,
    'name'=>$name,
    'year'=>$y->school_year,
    'founder'=>$founderName,
    'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$y->school_year)
    ->where('region',$region)
    ->where('founded_by',$founderName)
    ->sum('school_total'))
    );
}

}

}





//bottom total
$uganda=[];
foreach($schoolFounder as $founder){
    foreach($enrolment_years as $y){
$ugandaItem=$t[]=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$y->school_year)
->where('founded_by',$founderName)
->sum('school_total'));
array_push($uganda,$ugandaItem);

    }
}









return['tableHeader'=>$header,'tableSchool'=>$school,'sumRegion'=>$regionSum,'uganda'=>$uganda,'enrolment_year'=>$selected_years,'table_region'=>$regionList,'table_district'=>$districtList];


}




























}










//get api














