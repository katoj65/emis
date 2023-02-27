<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel as SchoolRegisterModel;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\SettingsFoundingBodyModel as SchoolFounderModel;
use App\Models\PrimaryEnrolmentSchoolFounderGenderModel;


class PrimaryEnrolmentSchoolOwnershipApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getSchoolYears($year=''){
        if($year!=''){
        $get=ModelsSchoolYearModel::select('school_year')->where('school_year',$year)->orderBy('school_year','DESC')->get();
        }else{
        $get=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])
        ->orderBy('school_year','DESC')
        ->get();
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
    $get=SchoolFounderModel::select('name','id')->where('name',$founder)->orderBy('id','ASC')->get();
    }else{
    $get=SchoolFounderModel::select('name','id')->orderBy('id','ASC')->get();
    }
    return $get;
    }





    public function getSchoolFounderfi($founder=''){
        if($founder!=''){
        $get=SchoolFounderModel::select('name','id')->where('id',$founder)->orderBy('id','ASC')->get();
        }else{
        $get=SchoolFounderModel::select('name','id')->orderBy('id','ASC')->get();
        }
        return $get;
        }





    // The Main API
    public function index()
    {


        $nuwRows=PrimaryEnrolmentSchoolFounderGenderModel::count();
        if($nuwRows>0){
        //
        $years=$this->getSchoolYears();
        // get years
        //header
        $header=['OWNERSHIP','GENDER'];
        foreach($years as $yy){
        $yr[]=$yy->school_year;
        array_push($header,$yy->school_year);

//totals
        $bottomTotal[]=number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('enrolment_year',$yy->school_year)->sum('males')+
        PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('enrolment_year',$yy->school_year)->sum('females'));
        }
        $defaultYear=max($yr);

        //school founder
        //selectable
        $schoolFounder=$this->getSchoolFounder();

//list founding
foreach($schoolFounder as $founder){
$foundingBody[]=array(
'founder'=>$founder->name);
foreach($years as $yearList){
$tableBody[]=array(
'founder'=>$founder->id,
'enrolment_year'=>$yearList->school_year,
'males'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('males')),
'females'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('females')),
'total'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('males')+
PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('females'))

);

}




//chart data
$chartData[]=array(
    'name'=>$founder->name,
    'data'=>$this->chartFunctionality($years,$founder->id)

   );

}




//from to
$from=PrimaryEnrolmentSchoolFounderGenderModel::select('enrolment_year')
->orderBy('enrolment_year','ASC')
->limit(1)
->get();
foreach($from as $fromYear);
$to=PrimaryEnrolmentSchoolFounderGenderModel::select('enrolment_year')
->orderBy('enrolment_year','DESC')
->limit(1)
->get();
foreach($to as $toYear);
$fromTo=' '.$fromYear->enrolment_year.' - '.$toYear->enrolment_year;






//return $chartData;
return ['bottomTotal'=>$bottomTotal,'tableBody'=>$tableBody,'tableFounder'=>  $schoolFounder,'header'=>$header,'defaultYear'=>$defaultYear,
'years'=>$yr,'nuwRows'=>$nuwRows,'tableChart'=>$chartData,'fromTo'=>$fromTo];

}else{

    return ['nuwRows'=>$nuwRows];
}
}







//chart functionality
public function chartFunctionality($years,$founder){
foreach($years as $i){
$response[]=array(
$i->school_year,
PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('enrolment_year',$i->school_year)->where('founder',$founder)->sum('males')
 );

}


return $response;


}















    // filterOwnership
    public function filterOwnership( Request $request)
    {
        $nuwRows=PrimaryEnrolmentSchoolFounderGenderModel::count();
        if($nuwRows>0){
           $yearFilter=$request->input('year');
           $founderFilter=$request->input('founder');
          $years=$this->getSchoolYears($yearFilter);
        $schoolFounder=$this->getSchoolFounderfi($founderFilter);
        // get years
        //header
        $header=['Ownership','Gender'];

        if($founderFilter!=''){
        foreach($years as $yy){
        $yr[]=$yy->school_year;
        array_push($header,$yy->school_year);

//totals
        $bottomTotal[]=number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('enrolment_year',$yy->school_year)->where('founder',$founderFilter)->sum('males')+
        PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('enrolment_year', $yy->school_year)->where('founder',$founderFilter)->sum('females'));
        }
 }else{




    foreach($years as $yy){
        $yr[]=$yy->school_year;
        array_push($header,$yy->school_year);

//totals
        $bottomTotal[]=number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('enrolment_year',$yy->school_year)->sum('males')+
        PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('enrolment_year',$yy->school_year)->sum('females'));
        }
 }

        $defaultYear=max($yr);

        //school founder
        //selectable


//list founding
foreach($schoolFounder as $founder){
$foundingBody[]=array(
'founder'=>$founder->name);
foreach($years as $yearList){
$tableBody[]=array(
'founder'=>$founder->id,
'enrolment_year'=>$yearList->school_year,
'males'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('males')),
'females'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('females')),
'total'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('males')+
PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('founder',$founder->id)->where('enrolment_year',$yearList->school_year)->sum('females'))

);

}
//chart data
$chartData[]=array(
    'name'=>$founder->name,
    'data'=>$this->chartFunctionality($years,$founder->id)

   );

}

return ['bottomTotal'=>$bottomTotal,'tableBody'=>$tableBody,'tableFounder'=>  $schoolFounder,'header'=>$header,'defaultYear'=>$defaultYear,
'years'=>$yr,'nuwRows'=>$nuwRows,'tableChart'=>$chartData];

}else{

    return ['nuwRows'=>$nuwRows];
}

}













//advanced filter
public function advancedFilter(){

$founder=$this->getSchoolFounder();
//select
$startYear=2006;
$endYear=2011;
$years=ModelsSchoolYearModel::select('id','school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
//years
$header=['OWNERSHIP','GENDER'];
foreach($years as $y){
array_push($header,$y->school_year);

$bottomTotal[]=number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('enrolment_year',$y->school_year)->sum('males')+
PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('enrolment_year',$y->school_year)->sum('females'));

}




foreach($founder as $f){
$tf[]=array(
'founder'=>$f->id,
'name'=>$f->name
);




foreach($years as $y){
$body[]=array(
'id'=>$f->id,
'enrolment_year'=>$y->school_year,
'males'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('founder',$f->id)->where('enrolment_year',$y->school_year)->sum('males')),
'females'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('founder',$f->id)->where('enrolment_year',$y->school_year)->sum('females')),
'total'=>number_format(PrimaryEnrolmentSchoolFounderGenderModel::select('males')->where('founder',$f->id)->where('enrolment_year',$y->school_year)->sum('males')+
PrimaryEnrolmentSchoolFounderGenderModel::select('females')->where('founder',$f->id)->where('enrolment_year',$y->school_year)->sum('females'))
);

}
}




return ['tableFounder'=>$tf,'header'=>$header,'tableBody'=>$body,'bottomTotal'=>$bottomTotal];

}


























}
