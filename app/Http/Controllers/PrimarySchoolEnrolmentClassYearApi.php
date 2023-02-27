<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel as SchoolRegisterModel;
use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimaryEnrolmentRegionModel;
use App\Models\SettingsFoundingBodyModel as SchoolFounderModel;
use App\Models\PrimaryEnrolmentSchoolFounderGenderModel;
use App\Models\PrimaryEnrolmentSchoolClassYearModel;
use App\Models\Settings\EducationGrade;
use Illuminate\Support\Facades\DB;



class PrimarySchoolEnrolmentClassYearApi extends Controller
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
    $get=SchoolFounderModel::where('name',$founder)->orderBy('id','ASC')->get();
    }else{
    $get=SchoolFounderModel::orderBy('id','ASC')->get();
    }
    return $get;
    }








//get classes
public function getClasses($class=''){
if($class!=''){
$get=EducationGrade::where('id',$class)->where('education_level_id',2)->orderBy('education_grade','ASC')->get();
}else{
$get=EducationGrade::where('education_level_id',2)->orderBy('education_grade','ASC')->get();
}
return $get;
}


//chart data
public function chartResponse($c,$years){

foreach($years as $y){
    $get[]=array(
        $y->school_year,
        PrimaryEnrolmentSchoolClassYearModel::select('males')->where('class',$c)->where('enrolment_year',$y->school_year)->sum('males')+

        PrimaryEnrolmentSchoolClassYearModel::select('females')->where('class',$c)->where('enrolment_year',$y->school_year)->sum('females')

        );

}


return $get;
}






    // The Main API
    public function index()
    {

        $numRows= PrimaryEnrolmentSchoolClassYearModel::count();
  if($numRows > 0){
        //
        $years=$this->getSchoolYears();
        // get years
        //header
        $header=['CLASS','GENDER'];
        foreach($years as $yy){
        $yr[]=$yy->school_year;
        array_push($header,$yy->school_year);

        $grand_total[]=number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')->where('enrolment_year',$yy->school_year)->sum('males')+PrimaryEnrolmentSchoolClassYearModel::select('females')->where('enrolment_year',$yy->school_year)->sum('females'));


    }

$getClasses=$this->getClasses();


//classes
foreach($getClasses as $classList){
$className=$classList->education_grade;
$className=str_replace('P','Primary ',$className);
$class[]=array(
'id'=>$classList->id,
'name'=>$className
);


//years against classes
foreach($years as $y){
$selectYear[]=$y->school_year;



$males[]=array(
'id'=>$classList->id,
'males'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')
->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('males'))

);


$females[]=array(
    'id'=>$classList->id,
    'females'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('females')
    ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('females'))

    );


    $totals[]=array(
        'id'=>$classList->id,
        'totals'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')
        ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('males')+

        PrimaryEnrolmentSchoolClassYearModel::select('females')
        ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('females'))

        );
}
}




//chart data
foreach($getClasses as $c){
$cn=str_replace('P','PRIMARY ',$c->education_grade);

        $chart[]=array(
        'name'=>$cn,
        'data'=>$this->chartResponse($c->id,$years)
        );
        }






return ['grandTotal'=>$grand_total,'totals'=>$totals,'females'=>$females,'males'=>$males,'header'=>$header,'class'=>$class,'years'=>$years,'selectClass'=>$getClasses,'numRows'=>$numRows,'tableChart'=>$chart];


}else{

    return ['numRows'=>$numRows];
}
    }






      // filterClass
      public function filterClass(Request $request)
      {

          $numRows= PrimaryEnrolmentSchoolClassYearModel::count();
         $classfilter= $request->input('class');
         $year= $request->input('year');

    if($numRows > 0){
          //
          $years=$this->getSchoolYears($year);
          // get years
          //header
          $header=['CLASS','GENDER'];

          if($classfilter!=''){


            foreach($years as $yy){
                $yr[]=$yy->school_year;
                array_push($header,$yy->school_year);

                $grand_total[]=number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')->where('enrolment_year',$yy->school_year)->where('class',$classfilter)->sum('males')+PrimaryEnrolmentSchoolClassYearModel::select('females')->where('enrolment_year',$yy->school_year)->where('class',$classfilter)->sum('females'));


            }



          }else{
          foreach($years as $yy){
          $yr[]=$yy->school_year;
          array_push($header,$yy->school_year);

          $grand_total[]=number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')->where('enrolment_year',$yy->school_year)->sum('males')+PrimaryEnrolmentSchoolClassYearModel::select('females')->where('enrolment_year',$yy->school_year)->sum('females'));


      }

    }
  $getClasses=$this->getClasses($classfilter);


  //classes
  foreach($getClasses as $classList){
  $className=$classList->education_grade;
  $className=str_replace('P','Primary ',$className);
  $class[]=array(
  'id'=>$classList->id,
  'name'=>$className
  );


  //years against classes
  foreach($years as $y){
  $males[]=array(
  'id'=>$classList->id,
  'males'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')
  ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('males'))

  );


  $females[]=array(
      'id'=>$classList->id,
      'females'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('females')
      ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('females'))

      );


      $totals[]=array(
          'id'=>$classList->id,
          'totals'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')
          ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('males')+

          PrimaryEnrolmentSchoolClassYearModel::select('females')
          ->where('class',$classList->id)->where('enrolment_year',$y->school_year)->sum('females'))

          );
  }
  }


//chart data
foreach($getClasses as $c){
    $cn=str_replace('P','PRIMARY ',$c->education_grade);

            $chart[]=array(
            'name'=>$cn,
            'data'=>$this->chartResponse($c->id,$years)
            );
            }




  return ['grandTotal'=>$grand_total,'totals'=>$totals,'females'=>$females,'males'=>$males,'header'=>$header,'class'=>$class,'years'=>$years,'numRows'=>$numRows,'tableChart'=>$chart];

  }else{

      return ['numRows'=>$numRows];


  }
      }












//advanced filter
public function advancedFilter(Request $request){
    $getClasses=$this->getClasses();
//select
$fromYear=$request->input('fromYear');
$toYear=$request->input('toYear');
if($fromYear < $toYear){
    $startYear=$fromYear;
    $endYear=$toYear;
}else{
    $startYear=$toYear;
    $endYear=$fromYear;
}



//get years
$getYears=ModelsSchoolYearModel::select('school_year','id')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
$header=['CLASS','GENDER'];
foreach($getYears as $y){
$schoolYears[]=$y->school_year;
array_push($header,$y->school_year);

//grand total
$grand_total[]=number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')->where('enrolment_year',$y->school_year)->sum('males')+PrimaryEnrolmentSchoolClassYearModel::select('females')->where('enrolment_year',$y->school_year)->sum('females'));
}



foreach($getClasses as $c){
$cf=str_replace('P','Primary ',$c->education_grade);
$class[]=array(
'id'=>$c->id,
'name'=>$cf);


    foreach($getYears as $y){
$males[]=array(
'id'=>$c->id,
'males'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('males')->where('class',$c->id)
->where('enrolment_year',$y->school_year)->sum('males')),
);

$females[]=array(
'id'=>$c->id,
'females'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('females')->where('class',$c->id)
->where('enrolment_year',$y->school_year)->sum('females'))
);


$totals[]=array(
    'id'=>$c->id,
    'totals'=>number_format(PrimaryEnrolmentSchoolClassYearModel::select('females')->where('class',$c->id)
    ->where('enrolment_year',$y->school_year)->sum('females')+
    PrimaryEnrolmentSchoolClassYearModel::select('males')->where('class',$c->id)
    ->where('enrolment_year',$y->school_year)->sum('males')


    )
    );



    }


}




return ['header'=>$header,'males'=>$males,'females'=>$females,'grandTotal'=>$grand_total,'class'=>$class,'totals'=>$totals];

}
























}
