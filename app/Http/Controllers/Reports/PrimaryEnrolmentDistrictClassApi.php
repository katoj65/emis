<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryEnrolmentDistrictClassModel;
use App\Traits\AdminUnits;
use App\Models\AdminUnitsDistrictModel;
use App\Models\DistrictModel;
use App\Models\RegionModel;
use App\Models\SchoolYearModel;
use App\Models\Settings\EducationGrade;
use District;
use Illuminate\Support\Facades\DB;
class PrimaryEnrolmentDistrictClassApi extends Controller{

  use AdminUnits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



//get districts
public function getDistricts($id=''){
    if($id==''){
    $district=DistrictModel::orderBy('name','ASC')->get();
    }else{
    $district=DistrictModel::where('id',$id)->orderBy('name','ASC')->get();
    }
    return $district;
    }





//get region
public function getRegions($id=''){
    if($id==''){
    $region=RegionModel::orderBy('name','ASC')->get();
    }else{
    $region=RegionModel::where('id',$id)->orderBy('name','ASC')->get();
    }
    return $region;
    }




    //get class
public function getClasses($class=''){
    if($class!=''){
$get=EducationGrade::select('id','education_grade')->where('education_grade',$class)->where('education_level_id',2)->get();
    }else{
$get=EducationGrade::select('id','education_grade')->where('education_level_id',2)->get();
    }
    return $get;
    }





//get school years
public function getSchoolYears($year=''){
if($year!=''){
$get=SchoolYearModel::select('id','school_year')->where('school_year',$year)->whereBetween('school_year',[2006,2011])->orderBy('school_year','DESC')->get();
}else{
$get=SchoolYearModel::select('id','school_year')->whereBetween('school_year',[2006,2011])->orderBy('school_year','DESC')->get();
}

return $get;
}



//chart response data
public function chartRegionEnrolmentYear($region,$classList,$defYear){


    foreach($classList as $class){

$className=$class->education_grade;
$className=str_replace('P','Primary ',$className);

    $item=PrimaryEnrolmentDistrictClassModel::select('males')->where('class',$class->id)->where('region',$region->id)->where('enrolment_year',$defYear)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('class',$class->id)->where('region',$region->id)->where('enrolment_year',$defYear)->sum('females');

    $response[]=array($className,
    $item);





}

    return $response;
    }









public function index(){

    $numRows=PrimaryEnrolmentDistrictClassModel::count();
    if( $numRows > 0 ){
$districtList=$this->getDistricts();
$regionList=$this->getRegions();
$classList=$this->getClasses();
$yearList=$this->getSchoolYears();

//default year
foreach($yearList as $yy){
$defYear[]=$yy->school_year;
$years[]=$yy->school_year;
}
$defYear=max($defYear);




//header
$header=['REGION','DISTRICT'];
foreach($classList as $class){
$grand_total[]=number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('enrolment_year',$defYear)->where('class',$class->id)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('enrolment_year',$defYear)->where('class',$class->id)->sum('females'));
$str=str_replace('P','Primary ',$class->education_grade);
array_push($header,$str);
}


//get district total
foreach($districtList as $district){
foreach($classList as $class){

$males=PrimaryEnrolmentDistrictClassModel::select('males')->where('district',$district->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('males');
$females=PrimaryEnrolmentDistrictClassModel::select('females')->where('district',$district->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('females');

$body[]=array(
'district'=>$district->id,
'class'=>$class->education_grade,
'item'=>array(
number_format($males+$females)
),
'males'=>number_format($males),
'females'=>number_format($males));
}

//district row total
$row_district_total[]=array(
'district'=>$district->id,
'item'=>number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('district',$district->id)->where('enrolment_year',$defYear)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('district',$district->id)->where('enrolment_year',$defYear)->sum('females')));

}


//region totals
foreach($regionList as $region){
foreach($classList as $class){
    $males=PrimaryEnrolmentDistrictClassModel::select('males')->where('region',$region->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('males');
    $females=PrimaryEnrolmentDistrictClassModel::select('females')->where('region',$region->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('females');
$row_region[]=array(
'region'=>$region->id,
'item'=>array(
number_format($males+$females)
));






//total for the region.
$row_region_total[]=array(
    'region'=>$region->id,
    'item'=>number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('region',$region->id)->where('enrolment_year',$defYear)->where('class',$class->id)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('region',$region->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('females')));










}





//chart data
$chartData[]=array(
'name'=>$region->name,
'data'=>$this->chartRegionEnrolmentYear($region,$classList,$defYear));

}


//return $chartData;
return ['header'=>$header,'district'=>$districtList,'region'=>$regionList,'tableBody'=>$body,'district_total'=>$row_district_total,'region_total'=>$row_region_total,'bottom_total'=>$grand_total,'enrolment_year'=>$defYear,'filterYears'=>$years,'tableChart'=>$chartData,'row_region'=>$row_region,'allRegions'=>$regionList,'allDistricts'=>$districtList,'numRows'=>$numRows,'allclasses'=>$classList];



}else{
    return ['numRows'=>$numRows];

}

}












//advanced filter
public function advancedFilter(Request $request){
$year1=$request->input('fromYear');
$year2=$request->input('toYear');
$selectClass=$request->input('advClass');
if($year2 < $year1){
$year=[$year2,$year1];
}else{
    $year=[$year1,$year2];
}
$districtList=$this->getDistricts();
$regionList=$this->getRegions();
$filterYears=$this->getSchoolYears();
$classList=$this->getClasses($selectClass);
foreach($classList as $c);
$defClass=$c->id;
$className=$c->education_grade;
$className=str_replace('P','Primary ',$className);

$schoolYear=SchoolYearModel::select('school_year')->whereBetween('school_year',$year)->orderBy('school_year','DESC')->get();



//header
$header=['REGION','DISTRICT'];
foreach($schoolYear as $y){
array_push($header,$className.' - '.$y->school_year);

$bottom_total[]=number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('enrolment_year',$y->school_year)->where('class',$defClass)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('enrolment_year',$y->school_year)->where('class',$defClass)->sum('females'));


}



//get region totals
foreach($regionList as $region){
foreach($schoolYear as $y){
$row_region[]=array(
'region'=>$region->id,
'item'=>array(

    number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('class',$defClass)->where('region',$region->id)->where('enrolment_year',$y->school_year)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('class',$defClass)->where('region',$region->id)->where('enrolment_year',$y->school_year)->sum('females'))


)

);

}
}







//districts
foreach($districtList as $district){
    foreach($schoolYear as $y){
        $body[]=array(
        'district'=>$district->id,

        'males'=>number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('class',$defClass)->where('district',$district->id)->where('enrolment_year',$y->school_year)->sum('males')),

        'females'=>number_format(PrimaryEnrolmentDistrictClassModel::select('females')->where('class',$defClass)->where('district',$district->id)->where('enrolment_year',$y->school_year)->sum('females')),

        'item'=>array(
            number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('class',$defClass)->where('district',$district->id)->where('enrolment_year',$y->school_year)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('class',$defClass)->where('district',$district->id)->where('enrolment_year',$y->school_year)->sum('females')))
        );

        }
}








return['tableBody'=>$body,'header'=>$header,'row_region'=>$row_region,'region'=>$regionList,'district'=>$districtList,'filterYears'=>$filterYears,'bottom_total'=>$bottom_total];


}



















public function filterRegion(Request $request){

    $numRows=PrimaryEnrolmentDistrictClassModel::count();
    $selectedId='';
$filterDistrict=$request->input('district');
$filterRegion=$request->input('id');
$filterClass=$request->input('class');
$filterYear=$request->input('enrolment_year');
//$districtList=$this->getDistricts($filterDistrict);
//$regionList=$this->getRegions($filterRegion);
$classList=$this->getClasses($filterClass);
$yearList=$this->getSchoolYears($filterYear);

if($filterDistrict!='' ){
    if($filterDistrict!=''and $filterRegion!=''){


        $districtList=DistrictModel::where('id',$filterDistrict)->get();

    foreach($districtList as $getDistrict);
    if($getDistrict->region_id!=$filterRegion){
        $districtList=DistrictModel::get();

$regionList=$this->getRegions($filterRegion);
$selectedId=$filterRegion;
    }else{
    $regionList= RegionModel::where('id',$getDistrict->region_id)->orderBy('name','ASC')->get();
    $selectedId=$getDistrict->region_id;
}
    }else{

        $districtList=DistrictModel::where('id',$filterDistrict)->get();
    foreach($districtList as $getDistrict);
    $regionList= RegionModel::where('id',$getDistrict->region_id)->orderBy('name','ASC')->get();
    $selectedId=$getDistrict->region_id;
    }



 }else{
$districtList=DistrictModel::get();

$regionList=$this->getRegions($filterRegion);
$selectedId=$filterRegion;
//chart data



 }
 foreach($regionList as $getDistrict);
     $getDistrictall=DistrictModel::where('region_id',$getDistrict->id)->select('id','name')->orderBy('name','ASC')
            ->get();




//default year
foreach($yearList as $yy){
    $defYear[]=$yy->school_year;
    $years[]=$yy->school_year;
    }
    $defYear=max($defYear);




    //header
    $header=['REGION','DISTRICT'];
    if($selectedId!=''){

        foreach($classList as $class){
            $grand_total[]=number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('enrolment_year',$defYear)->where('region',$selectedId)->where('class',$class->id)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('enrolment_year',$defYear)->where('region',$selectedId)->where('class',$class->id)->sum('females'));

            $str=str_replace('P','Primary ',$class->education_grade);
            array_push($header,$str);
            }

    }else{


        foreach($classList as $class){
            $grand_total[]=number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('enrolment_year',$defYear)->where('class',$class->id)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('enrolment_year',$defYear)->where('class',$class->id)->sum('females'));

            $str=str_replace('P','Primary ',$class->education_grade);
            array_push($header,$str);
            }

    }


    //get district total
    foreach($districtList as $district){
    foreach($classList as $class){

    $males=PrimaryEnrolmentDistrictClassModel::select('males')->where('district',$district->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('males');
    $females=PrimaryEnrolmentDistrictClassModel::select('females')->where('district',$district->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('females');

    $body[]=array(
    'district'=>$district->id,
    'class'=>$class->education_grade,
    'item'=>array(
    number_format($males+$females)
    ),
    'males'=>number_format($males),
    'females'=>number_format($males));
    }

    //district row total
    $row_district_total[]=array(
    'district'=>$district->id,
    'item'=>number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('district',$district->id)->where('enrolment_year',$defYear)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('district',$district->id)->where('enrolment_year',$defYear)->sum('females')));

    }


    //region totals
    foreach($regionList as $region){
    foreach($classList as $class){
        $males=PrimaryEnrolmentDistrictClassModel::select('males')->where('region',$region->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('males');
        $females=PrimaryEnrolmentDistrictClassModel::select('females')->where('region',$region->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('females');
    $row_region[]=array(
    'region'=>$region->id,
    'item'=>array(
    number_format($males+$females)
    ));






    //total for the region.
    $row_region_total[]=array(
        'region'=>$region->id,
        'item'=>number_format(PrimaryEnrolmentDistrictClassModel::select('males')->where('region',$region->id)->where('enrolment_year',$defYear)->where('class',$class->id)->sum('males')+PrimaryEnrolmentDistrictClassModel::select('females')->where('region',$region->id)->where('class',$class->id)->where('enrolment_year',$defYear)->sum('females')));



    }



    //chart data
    $chartData[]=array(
    'name'=>$region->name,
    'data'=>$this->chartRegionEnrolmentYear($region,$classList,$filterYear));

    }





return ['header'=>$header,'district'=>$districtList,'region'=>$regionList,'tableBody'=>$body,'district_total'=>$row_district_total,'region_total'=>$row_region_total,'bottom_total'=>$grand_total,'enrolment_year'=>$defYear,'filterYears'=>$years,'tableChart'=>$chartData,'row_region'=>$row_region,'allRegions'=>$regionList,'allRegionsDis'=>$getDistrictall,'allclasses'=>$classList];






}



















































}
