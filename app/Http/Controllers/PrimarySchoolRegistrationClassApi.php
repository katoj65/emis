<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel;
use App\Models\Settings\EducationGrade;
use App\Models\PrimarySchoolRegistrationClassModel;



class PrimarySchoolRegistrationClassApi extends Controller
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





    //school registration
    public function getRegistrationStatus($status=''){
    if($status!=''){
    $get=SettingsSchoolsRegistryStatusModel::select('id','status')->where('id',$status)->orderBy('id','ASC')->get();
    }else{
    $get=SettingsSchoolsRegistryStatusModel::select('id','status')->orderBy('id','ASC')->get();
    }
    return $get;
    }






//get class
public function getClasses($class=''){
if($class!=''){
$get=EducationGrade::select('id','education_grade')->where('id',$class)->where('education_level_id',2)->get();
}else{
$get=EducationGrade::select('id','education_grade')->where('education_level_id',2)->get();
}
return $get;
}












public function index(){


  $numRows=PrimarySchoolRegistrationClassModel::count();
  if($numRows>0){
$years=$this->getSchoolYears();
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);
$getRegistration=$this->getRegistrationStatus();
$getClass=$this->getClasses();





//header
$header=['REGISTRATION STATUS','GENDER'];
foreach($getClass as $row){
$c=str_replace('P','Primary ',$row->education_grade);
array_push($header,$c);
$classes[]=array('id'=>$row->id,'name'=>$c);

$bottom_total[]=number_format(PrimarySchoolRegistrationClassModel::select('males')
->where('school_year',$enrolment_year)
->where('class',$row->id)->sum('males')+
PrimarySchoolRegistrationClassModel::select('females')->where('school_year',$enrolment_year)
->where('class',$row->id)->sum('females'));


}



foreach($getRegistration as $r){
foreach($getClass as $c){
//males
$males[]=array(
'id'=>$r->id,
'name'=>$r->status,
'class'=>$c->education_grade,
'males'=>number_format(PrimarySchoolRegistrationClassModel::select('males')->where('class',$c->id)
->where('registration',$r->id)->where('school_year',$enrolment_year)
->sum('males')));

//females
$females[]=array(
    'id'=>$r->id,
    'name'=>$r->status,
    'class'=>$c->education_grade,
    'females'=>number_format(PrimarySchoolRegistrationClassModel::select('females')->where('class',$c->id)
    ->where('registration',$r->id)->where('school_year',$enrolment_year)
    ->sum('females')));

//totals
$totals[]=array(
    'id'=>$r->id,
    'name'=>$r->status,
    'totals'=>number_format(PrimarySchoolRegistrationClassModel::select('males')
    ->where('registration',$r->id)->where('school_year',$enrolment_year)
    ->where('class',$c->id)->sum('males')+
    PrimarySchoolRegistrationClassModel::select('females')
        ->where('registration',$r->id)->where('school_year',$enrolment_year)
        ->where('class',$c->id)->sum('females'))
    );
}

}



return ['bottom_total'=>$bottom_total,'totals'=>$totals,'males'=>$males,'females'=>$females,'classes'=>$classes,'registration'=>$getRegistration,'header'=>$header,'enrolment_year'=>$enrolment_year,'tableYears'=>$years,'numRows'=>$numRows];

 }else{
    return ['numRows'=>$numRows];
 }
    }

//filterRegistration

public function filterRegistration(Request $request){

$filterclass=$request->input('class');
$filterstatus=$request->input('status');
$filteryear=$request->input('year');
        $numRows=PrimarySchoolRegistrationClassModel::count();
        if($numRows>0){
      $years=$this->getSchoolYears($filteryear);
      foreach($years as $yy){
      $mx[]=$yy->school_year;
      }
      $enrolment_year=max($mx);
      $getRegistration=$this->getRegistrationStatus($filterstatus);
      $getClass=$this->getClasses($filterclass);
      //header
      $header=['REGISTRATION STATUS','GENDER'];
      if($filterstatus!=''){

        foreach($getClass as $row){
            $c=str_replace('P','Primary ',$row->education_grade);
            array_push($header,$c);
            $classes[]=array('id'=>$row->id,'name'=>$c);

            $bottom_total[]=number_format(PrimarySchoolRegistrationClassModel::select('males')
            ->where('school_year',$enrolment_year)->where('registration',$filterstatus)
            ->where('class',$row->id)->sum('males')+
            PrimarySchoolRegistrationClassModel::select('females')->where('school_year',$enrolment_year)->where('registration',$filterstatus)
            ->where('class',$row->id)->sum('females'));
            }



      }else{
      foreach($getClass as $row){
      $c=str_replace('P','Primary ',$row->education_grade);
      array_push($header,$c);
      $classes[]=array('id'=>$row->id,'name'=>$c);

      $bottom_total[]=number_format(PrimarySchoolRegistrationClassModel::select('males')
      ->where('school_year',$enrolment_year)
      ->where('class',$row->id)->sum('males')+
      PrimarySchoolRegistrationClassModel::select('females')->where('school_year',$enrolment_year)
      ->where('class',$row->id)->sum('females'));
      }

    }
      foreach($getRegistration as $r){
      foreach($getClass as $c){
      //males
      $males[]=array(
      'id'=>$r->id,
      'name'=>$r->status,
      'class'=>$c->education_grade,
      'males'=>number_format(PrimarySchoolRegistrationClassModel::select('males')->where('class',$c->id)
      ->where('registration',$r->id)->where('school_year',$enrolment_year)
      ->sum('males')));
      //females
      $females[]=array(
          'id'=>$r->id,
          'name'=>$r->status,
          'class'=>$c->education_grade,
          'females'=>number_format(PrimarySchoolRegistrationClassModel::select('females')->where('class',$c->id)
          ->where('registration',$r->id)->where('school_year',$enrolment_year)
          ->sum('females')));

      //totals
      $totals[]=array(
          'id'=>$r->id,
          'name'=>$r->status,
          'totals'=>number_format(PrimarySchoolRegistrationClassModel::select('males')
          ->where('registration',$r->id)->where('school_year',$enrolment_year)
          ->where('class',$c->id)->sum('males')+
          PrimarySchoolRegistrationClassModel::select('females')
              ->where('registration',$r->id)->where('school_year',$enrolment_year)
              ->where('class',$c->id)->sum('females'))
          );
      }

      }



      return ['bottom_total'=>$bottom_total,'totals'=>$totals,'males'=>$males,'females'=>$females,'classes'=>$classes,'registration'=>$getRegistration,'header'=>$header,'enrolment_year'=>$enrolment_year,'tableYears'=>$years,'numRows'=>$numRows];

       }else{
          return ['numRows'=>$numRows];
       }
          }








//advanced filter




public function advancedFilter(Request  $request){
//selectables
$fromYear=$request->input('fromYear');
$toYear=$request->input('toYear');
$filterClass=$request->input('selectClass');
if($fromYear < $toYear){
$startYear=$fromYear;
$endYear=$toYear;
 }else{
$startYear= $toYear;
$endYear=$fromYear;
 }

$selectClass=$filterClass;

$getRegistration=$this->getRegistrationStatus();
$getClass=$this->getClasses($selectClass);
foreach($getClass as $c);
$className=str_replace('P','Primary ',$c->education_grade);
$classID=$c->id;






$header=['REGISTRATION STATUS','GENDER'];
$schoolYear=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($schoolYear as $y){
$yearList[]=$y->school_year;
array_push($header,$y->school_year.' - '.$className);

//bottom total
$bottom_total[]=number_format(PrimarySchoolRegistrationClassModel::select('males')
    ->where('school_year',$y->school_year)
    ->where('class',$classID)->sum('males')+
    PrimarySchoolRegistrationClassModel::select('females')->where('school_year',$y->school_year)
    ->where('class',$classID)->sum('females'));

}


//males females and total
foreach($getRegistration as $r){
foreach($yearList as $y){

    $males[]=array(
        'id'=>$r->id,
        'name'=>$r->status,
        'class'=>$c->education_grade,
        'year'=>$y,
        'males'=>number_format(PrimarySchoolRegistrationClassModel::select('males')->where('class',$classID)
        ->where('registration',$r->id)->where('school_year',$y)
        ->sum('males')));


        $females[]=array(
            'id'=>$r->id,
            'name'=>$r->status,
            'class'=>$c->education_grade,
            'year'=>$y,
            'females'=>number_format(PrimarySchoolRegistrationClassModel::select('females')->where('class',$classID)
            ->where('registration',$r->id)->where('school_year',$y)
            ->sum('females')));

            $totals[]=array(
                'id'=>$r->id,
                'name'=>$r->status,
                'class'=>$c->education_grade,
                'year'=>$y,
                'totals'=>number_format(PrimarySchoolRegistrationClassModel::select('females')->where('class',$classID)
                ->where('registration',$r->id)->where('school_year',$y)
                ->sum('females')+
                PrimarySchoolRegistrationClassModel::select('males')->where('class',$classID)
                ->where('registration',$r->id)->where('school_year',$y)
                ->sum('males')) );


}

}

return ['bottom_total'=>$bottom_total,'totals'=>$totals,'males'=>$males,'females'=>$females,'registration'=>$getRegistration,'header'=>$header,'enrolment_year'=>$yearList];
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
