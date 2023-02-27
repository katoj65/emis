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
use App\Models\SubjectsModel;
use App\Models\PrimaryTextbooksModel;
use App\Models\PrimarySchoolTeachingMaterialModel;

class PrimarySchoolReaderApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



//get subjects
public function getSubjects($id=''){
if($id!=''){
$get=SubjectsModel::where('id',$id)->orderBy('subject','ASC')->get();
}else{
$get=SubjectsModel::orderBy('subject','ASC')->get();
}
return $get;
}






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
public function chartFunctionality($year,$subject,$f){
foreach($subject as $s){
$response[]=array(
$s->subject,
PrimarySchoolTeachingMaterialModel::select('item')
->where('year',$year)
->where('founder',$f->id)
->where('subject',$s->id)
->where('type','reader')
->sum('item')
);
}
return $response;
}












//main api header
public function index(){


$count=count(PrimarySchoolTeachingMaterialModel::get());
if($count>0){



//subject
$subject=$this->getSubjects();

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

//list
$subject_list=$this->getSubjects();
$founder_list=$this->founder();
$year_list=$this->getSchoolYears();


//header
$header=['SUBJECT'];
foreach($founder as $f){
array_push($header,$f->name);

$total[]=number_format(
PrimarySchoolTeachingMaterialModel::select('item')
->where('founder',$f->id)
->where('year',$enrolment_year)
->where('type','reader')
->sum('item')
);
}



//school
foreach($subject as $s){
foreach($founder as $f){
$subject_data[]=array(
'subject'=>$s->subject,
'founder'=>$f->name,
'id'=>$s->id,
'year'=>$enrolment_year,
'item'=>number_format(PrimarySchoolTeachingMaterialModel::select('item')->where('subject',$s->id)->where('year',$enrolment_year)->where('founder',$f->id)
->where('type','reader')
->sum('item'))
);
}
}



//chart
foreach($founder as $f){
$chartData[]=array(
    'name'=>$f->name,
    'data'=>$this->chartFunctionality($enrolment_year,$subject,$f)
    );
}







//return $chartData;

return [
'chartData'=>$chartData,
'header'=>$header,
'subject'=>$subject,
'year'=>$enrolment_year,
'count'=>$count,
'total'=>$total,
'option_year'=>$year_list,
'maxY'=>$maxY,
'minY'=>$minY,
'option_subject'=>$subject,
'option_founder'=>$founder_list,
'founder'=>$founder,
'mainItems'=>$subject_data,
'year'=>$maxY,
'subject_list'=>$subject_list,
'founder_list'=>$founder_list,
'year_list'=>$year_list
];


}else{
return ['count'=>0];
}
}










//filter
public function filter(Request $request){
$count=count(PrimarySchoolTeachingMaterialModel::get());
if($count>0){

$select_founder=$request->s_founder;
$select_year=$request->s_year;
$select_subject=$request->s_subject;

//check fields
if($select_founder!='' or $select_subject!='' or $select_year!=''){

$founder=$this->founder($select_founder);
$subject=$this->getSubjects($select_subject);
$years=$this->getSchoolYears($select_year);

//list
$subject_list=$this->getSubjects();
$founder_list=$this->founder();
$year_list=$this->getSchoolYears();

//year
foreach($years as $yy){
    $mx[]=$yy->school_year;
    }
    $enrolment_year=max($mx);
    $maxY=max($mx);
    $minY=min($mx);


//header
$header=['SUBJECT'];
foreach($founder as $f){
array_push($header,$f->name);

if($select_subject!=''){
$total[]=number_format(
PrimarySchoolTeachingMaterialModel::select('item')
->where('founder',$f->id)
->where('year',$enrolment_year)
->where('subject',$select_subject)
->where('type','reader')
->sum('item'));

}else{

$total[]=number_format(
PrimarySchoolTeachingMaterialModel::select('item')
->where('founder',$f->id)
->where('year',$enrolment_year)
->where('type','reader')
->sum('item'));

}

}




//school
foreach($subject as $s){
    foreach($founder as $f){
    $subject_data[]=array(
    'subject'=>$s->subject,
    'founder'=>$f->name,
    'id'=>$s->id,
    'year'=>$enrolment_year,
    'item'=>number_format(PrimarySchoolTeachingMaterialModel::select('item')->where('subject',$s->id)->where('year',$enrolment_year)->where('founder',$f->id)
    ->where('type','reader')
    ->sum('item'))
    );
    }



}



//chart
foreach($founder as $f){
    $chartData[]=array(
        'name'=>$f->name,
        'data'=>$this->chartFunctionality($enrolment_year,$subject,$f)
        );
    }



return [
    'chartData'=>$chartData,
    'header'=>$header,
    'subject'=>$subject,
    'year'=>$enrolment_year,
    'count'=>$count,
    'total'=>$total,
    'option_year'=>$year_list,
    'maxY'=>$maxY,
    'minY'=>$minY,
    'option_subject'=>$subject,
    'option_founder'=>$founder_list,
    'founder'=>$founder,
    'mainItems'=>$subject_data,
    'year'=>$maxY,
    'subject_list'=>$subject_list,
    'founder_list'=>$founder_list,
    'year_list'=>$year_list
    ];

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
$start=$request->start;
$end=$request->end;
$select_subject=$request->select_subject;
$select_founder=$request->select_founder;

if(($start!='' and $end!='') and ($start<$end)){
//founder
$founder=$this->founder($select_founder);
$subject=$this->getSubjects($select_subject);
$years=$this->getDateRange($start,$end);

//list
$subject_list=$this->getSubjects();
$founder_list=$this->founder();
$year_list=$this->getSchoolYears();


//header
$header=['YEAR','SUBJECT'];
foreach($founder as $f){
array_push($header,$f->name);
}

//year total

foreach($years as $yy){
foreach($founder as $f){

if($select_subject){

    $year_total[]=array(
        'year'=>$yy->school_year,
        'fid'=>$f->id,
        'item'=>number_format(PrimarySchoolTeachingMaterialModel::select('item')
        ->where('year',$yy->school_year)
        ->where('founder',$f->id)
        ->where('subject',$select_subject)
        ->where('type','reader')
        ->sum('item'))
        );


}else{

$year_total[]=array(
'year'=>$yy->school_year,
'fid'=>$f->id,
'item'=>number_format(PrimarySchoolTeachingMaterialModel::select('item')
->where('year',$yy->school_year)
->where('founder',$f->id)
->where('type','reader')
->sum('item'))
);
}
}
}


//subject year
foreach($subject as $s){
    foreach($founder as $f){
foreach($years as $yy){
$subject_total[]=array(
'year'=>$yy->school_year,
'sid'=>$s->id,
'fid'=>$f->id,
'item'=>number_format(
PrimaryTextbooksModel::select('item')
->where('subject',$s->id)
->where('year',$yy->school_year)
->where('founder',$f->id)
->where('type','reader')
->sum('item'))
);
}
    }
}




//chart
// foreach($founder as $f){
//     $chartData[]=array(
//         'name'=>$f->name,
//         'data'=>$this->chartFunctionality($enrolment_year,$subject,$f)
//         );
//     }







//return $subject_total;


return ['subject_total'=>$subject_total,'year_total'=>$year_total,'header'=>$header,'tableLeft'=>$years,'subjects'=>$subject];



}else{
return ['error'=>'Start year must be greater than end year'];
}












}



















}
