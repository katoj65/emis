<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimaryTeacherGenderOwnershipModel;
use App\Models\SettingsSchoolsRegistryStatusModel;
use App\Models\SettingsFoundingBodyModel;
use App\Models\PrimarySchoolLicensedModel;
use App\Models\RegionModel;
use App\Models\PrimaryEnrolmentClassYearModel;
Use App\Models\DistrictModel;
use App\Models\settings_education_grade;



class PrimaryGenderCompositionApi extends Controller
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



    //get regions
    public function getDistrict($id=''){
        if($id!=''){
        $get=DistrictModel::select('name','id','region_id')->where('id',$id)->orderBy('name','ASC')->get();
        }else{
        $get=DistrictModel::select('name','id','region_id')->orderBy('name','ASC')->get();
        }
        return $get;
        }





//get gender by class
public function getGenderBYClass($id=''){
if($id!=''){
$get=PrimaryEnrolmentClassYearModel::where('region',$id)->get();
}else{
    $get=PrimaryEnrolmentClassYearModel::get();
}
return $get;
}




//classes
public function getClasses($id=''){
    if($id!=''){
    $get=settings_education_grade::where('id',$id)->where('education_level_id',2)->get();
    }else{
        $get=settings_education_grade::where('education_level_id',2)->get();
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
$count=count(PrimaryEnrolmentClassYearModel::get());
if($count>0){

$all_regions=$this->getRegion();
$all_district=$this->getDistrict();
$all_class=$this->getClasses();
foreach($all_class as $all_c){
$cc[]=array('id'=>$all_c->id,'education_grade'=>str_replace('P','Primary ',$all_c->education_grade));
}
$all_year=$this->getSchoolYears();
foreach($all_year as $ay){
$ayl[]=$ay->school_year;
}

//get region
$region=$this->getRegion();
//district
$district=$this->getDistrict();
//classes
$class=$this->getClasses($id='');

//years
$years=$this->getSchoolYears();
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);
$maxY=max($mx);
$minY=min($mx);



//headers
$header=['REGION','DISTRICT','GENDER'];
//class
foreach($class as $item){
$str=str_replace('P','Primary ',$item->education_grade);
array_push($header,$str);
$class_list[]=array('id'=>$item->id,'name'=>$str);
$grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')->where('enrolment_year',$maxY)->where('class',$item->id)->sum('males')+PrimaryEnrolmentClassYearModel::select('females')->where('enrolment_year',$maxY)->where('class',$item->id)->sum('females'));
}


//get regions
foreach($region as $r){
$regions[]=array(
'name'=>$r->name,
'id'=>$r->id,
);



//class
foreach($class as $c){
$region_class[]=array(
'class'=>$c->education_grade,
'id'=>$r->id,
'males'=>number_format(PrimaryEnrolmentClassYearModel::select('males')->where('region',$r->id)->where('class',$c->id)->where('enrolment_year',$maxY)->sum('males')),
'females'=>number_format(PrimaryEnrolmentClassYearModel::select('females')->where('region',$r->id)->where('class',$c->id)->where('enrolment_year',$maxY)->sum('females')),
'total'=>number_format(PrimaryEnrolmentClassYearModel::select('males')->where('region',$r->id)->where('class',$c->id)->where('enrolment_year',$maxY)->sum('males')+PrimaryEnrolmentClassYearModel::select('females')->where('region',$r->id)->where('class',$c->id)->where('enrolment_year',$maxY)->sum('females'))

);
}
}






//get district
foreach($district as $d){
$districts[]=array(
'id'=>$d->id,
'name'=>$d->name,
'regionID'=>$d->region_id
);


//class
foreach($class as $c){
    $district_class[]=array(
    'class'=>$c->education_grade,
    'districtID'=>$d->id,
    'males'=>number_format(PrimaryEnrolmentClassYearModel::select('males')->where('district',$d->id)->where('class',$c->id)->where('enrolment_year',$maxY)->sum('males')),
    'females'=>number_format(PrimaryEnrolmentClassYearModel::select('females')->where('district',$d->id)->where('class',$c->id)->where('enrolment_year',$maxY)->sum('females')),
    );
    }


}







return ['grand_total'=>$grandTotal,'region_class'=>$region_class,'district_class'=>$district_class,'district'=>$districts,'region'=>$regions,'header'=>$header,'count'=>$count,'enrolment_year'=>$maxY,'option_year'=>$years,'classes'=>$class_list,'total'=>$grandTotal,'all_class'=>$cc,'all_region'=>$all_regions,'all_district'=>$all_district,'all_year'=>$ayl];





}else{
return ['count'=>0];
}
}













//filter
public function filter(Request $request){
$count=count(PrimarySchoolLicensedModel::get());
if($count>0){


$select_class=$request->c;
$select_region=$request->r;
$select_district=$request->d;
$select_year=$request->y;


$all_regions=$this->getRegion();
$all_district=$this->getDistrict();
$all_class=$this->getClasses();
$all_year=$this->getSchoolYears();
foreach($all_year as $ay){
$ayl[]=$ay->school_year;
}

//select region
if($select_region!=''){
$region=RegionModel::where('id',$select_region)->get();
}else{
$region=RegionModel::get();
}

//select district
if($select_district!=''){
$district=DistrictModel::where('id',$select_district)->get();
foreach($district as $d){
$get_region_info=$d->region_id;
$select_region=$get_region_info;
}
$region=RegionModel::where('id',$get_region_info)->get();
}else{
$district=DistrictModel::get();
}



//select class
if($select_class!=''){
$class=settings_education_grade::where('id',$select_class)->where('education_level_id',2)->get();
}else{
$class=settings_education_grade::where('education_level_id',2)->get();
}





//all classes
foreach($all_class as $all_c){
$cc[]=array('id'=>$all_c->id,'education_grade'=>str_replace('P','Primary ',$all_c->education_grade));
}





//years
if($select_year!=''){
$years=ModelsSchoolYearModel::select('school_year')->where('school_year',$select_year)->orderBy('school_year','DESC')->get();
}else{
$years=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->orderBy('school_year','DESC')->limit(1)->get();
}
foreach($years as $yy);
$maxY=$yy->school_year;


//headers
$header=['REGION','DISTRICT','GENDER'];
//class
foreach($class as $item){
$str=str_replace('P','Primary ',$item->education_grade);
array_push($header,$str);
$class_list[]=array('id'=>$item->id,'name'=>$str);

//grand total

if($select_region!='' and $select_class=='' and $select_district==''){

$grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')
    ->where('enrolment_year',$maxY)
    ->where('class',$item->id)
    ->where('region',$select_region)
    ->sum('males')
    +PrimaryEnrolmentClassYearModel::select('females')
    ->where('enrolment_year',$maxY)
    ->where('class',$item->id)
    ->where('region',$select_region)
    ->sum('females'));

}elseif($select_class!='' and $select_district=='' and $select_region==''){

$grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')
    ->where('enrolment_year',$maxY)
    ->where('class',$select_class)
    ->sum('males')
    +PrimaryEnrolmentClassYearModel::select('females')
    ->where('enrolment_year',$maxY)
    ->where('class',$select_class)
    ->sum('females'));

}elseif($select_district!='' and $select_class==''and $select_region!=''){

$grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')
    ->where('enrolment_year',$maxY)
    ->where('district',$select_district)
    ->where('class',$item->id)
    ->sum('males')
    +PrimaryEnrolmentClassYearModel::select('females')
    ->where('enrolment_year',$maxY)
    ->where('district',$select_district)
    ->where('class',$item->id)
    ->sum('females'));

}elseif($select_district!='' and $select_class!='' and $select_region!=''){

    $grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')
    ->where('enrolment_year',$maxY)
    ->where('district',$select_district)
    ->where('class',$select_class)
    ->where('region',$select_region)
    ->sum('males')
    +PrimaryEnrolmentClassYearModel::select('females')
    ->where('enrolment_year',$maxY)
    ->where('district',$select_district)
    ->where('class',$select_class)
    ->where('region',$select_region)
    ->sum('females'));



}elseif($select_class!='' and $select_district=='' and $select_region!=''){

    $grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')
    ->where('enrolment_year',$maxY)
    ->where('class',$select_class)
    ->where('region',$select_region)
    ->sum('males')
    +PrimaryEnrolmentClassYearModel::select('females')
    ->where('enrolment_year',$maxY)
    ->where('class',$select_class)
    ->where('region',$select_region)
    ->sum('females'));


}else{

    $grandTotal[]=number_format(PrimaryEnrolmentClassYearModel::select('males')
    ->where('enrolment_year',$maxY)
    ->where('class',$item->id)
    ->sum('males')
    +PrimaryEnrolmentClassYearModel::select('females')
    ->where('enrolment_year',$maxY)
    ->where('class',$item->id)
    ->sum('females'));


}
}




//get regions
foreach($region as $r){
$regions[]=array(
'name'=>$r->name,
'id'=>$r->id,
);



//class
foreach($class as $c){
$region_class[]=array(
'class'=>$c->education_grade,
'id'=>$r->id,
'males'=>number_format(PrimaryEnrolmentClassYearModel::select('males')
->where('region',$r->id)
->where('class',$c->id)
->where('enrolment_year',$maxY)
->sum('males')),
'females'=>number_format(PrimaryEnrolmentClassYearModel::select('females')
->where('region',$r->id)
->where('class',$c->id)
->where('enrolment_year',$maxY)
->sum('females')),

'total'=>number_format(PrimaryEnrolmentClassYearModel::select('males')
->where('region',$r->id)
->where('class',$c->id)
->where('enrolment_year',$maxY)
->sum('males')+PrimaryEnrolmentClassYearModel::select('females')
->where('region',$r->id)
->where('class',$c->id)
->where('enrolment_year',$maxY)
->sum('females'))

);
}
}






//get district
foreach($district as $d){
    $districts[]=array(
    'id'=>$d->id,
    'name'=>$d->name,
    'regionID'=>$d->region_id
    );


    //class
    foreach($class as $c){
        $district_class[]=array(
        'class'=>$c->education_grade,
        'districtID'=>$d->id,
        'males'=>number_format(PrimaryEnrolmentClassYearModel::select('males')
        ->where('district',$d->id)
        ->where('class',$c->id)
        ->where('enrolment_year',$maxY)
        ->sum('males')),
        'females'=>number_format(PrimaryEnrolmentClassYearModel::select('females')->where('district',$d->id)
        ->where('class',$c->id)
        ->where('enrolment_year',$maxY)
        ->sum('females')),
        );
        }


    }













return['grand_total'=> $grandTotal,'all_year'=>$ayl,'all_district'=>$all_district,'all_region'=>$all_regions,'all_class'=>$cc,'option_year'=>$years,'enrolment_year'=>$maxY,'district'=>$districts,'region'=>$regions,'district_class'=>$district_class,'region_class'=>$region_class,'count'=>$count,'header'=>$header,'total'=> $grandTotal,];




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
$select_region=$request->r;
$select_district=$request->d;
$select_class=$request->c;


if($end>$start){
$count=count(PrimaryEnrolmentClassYearModel::get());
if($count>0){
$years=$this->getDateRange($start,$end);
$all_regions=$this->getRegion();
$all_district=$this->getDistrict();
$all_class=$this->getClasses();
foreach($all_class as $all_c){
    $cc[]=array('id'=>$all_c->id,'education_grade'=>str_replace('P','Primary ',$all_c->education_grade));
    }

    $all_year=$this->getSchoolYears();
foreach($all_year as $ay){
$ayl[]=$ay->school_year;
}

//select region
if($select_region!=''){
$region=$region=RegionModel::where('id',$select_region)->get();
}else{
$region=RegionModel::get();
}





//district
$district=$this->getDistrict();
//classes
//$class=$this->getClasses();
if($select_class!=''){
$class=settings_education_grade::where('id',$select_class)->where('education_level_id',2)->get();
}else{
$class=settings_education_grade::where('education_level_id',2)->get();
}



//headers
$header=['YEAR','REGION','GENDER'];
//class
foreach($class as $item){
$str=str_replace('P','Primary ',$item->education_grade);
array_push($header,$str);
$class_list[]=array('id'=>$item->id,'name'=>$str);

}



//

foreach($years as $y){
foreach($class as $c){

    if($select_region!=''){


        $year_total[]=array('year'=>$y->school_year,
        'class'=>$c->education_grade,
        'item'=>number_format(PrimaryEnrolmentClassYearModel::select('males')
        ->where('enrolment_year',$y->school_year)
        ->where('class',$c->id)
        ->where('region',$select_region)
        ->sum('males')
        +PrimaryEnrolmentClassYearModel::select('females')
        ->where('enrolment_year',$y->school_year)
        ->where('class',$c->id)
        ->where('region',$select_region)
        ->sum('females')));


    }else{


        $year_total[]=array('year'=>$y->school_year,
        'class'=>$c->education_grade,
        'item'=>number_format(PrimaryEnrolmentClassYearModel::select('males')
        ->where('enrolment_year',$y->school_year)
        ->where('class',$c->id)
        ->sum('males')
        +PrimaryEnrolmentClassYearModel::select('females')
        ->where('enrolment_year',$y->school_year)
        ->where('class',$c->id)
        ->sum('females')));


    }







}
}


//region totals
foreach($region as $r){
foreach($class as $c){
foreach($years as $y){
$region_totals[]=array(
'region'=>$r->name,
'id'=>$r->id,
'year'=>$y->school_year,
'males'=>number_format(PrimaryEnrolmentClassYearModel::select('males')
->where('enrolment_year',$y->school_year)
->where('class',$c->id)
->where('region',$r->id)
->sum('males')),

'females'=>number_format(PrimaryEnrolmentClassYearModel::select('females')
->where('enrolment_year',$y->school_year)
->where('class',$c->id)
->where('region',$r->id)
->sum('females'))

);

}
}


}








 return ['count'=>$count,'ayears'=>$years,'header'=>$header,'ayear_total'=>$year_total,'aregion'=>$region,'aregion_total'=>$region_totals,'all_district'=>$all_district,'all_class'=>$cc,'all_region'=>$all_regions,'all_year'=>$ayl];








    }else{
    return(['count'=>0]);
    }

}else{
    return['error'=>'Start year must be greater than end year'];
}

}



















}
