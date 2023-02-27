<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//primary school model
use App\Models\PrimarySchoolModel;
use App\Models\DistrictModel;
use App\Models\SettingsNationalityModel;
use App\Models\EnrolmentByNationalityModel;
use App\Models\PrimaryEnrolmentAgeModel;
use App\Models\PrimaryEnrolmentNationalityClassModel;
use App\Models\settings_age;
use App\Models\settings_education_grade;
use App\Models\settings_education_level;
use App\Models\SchoolYearModel;

class PrimaryEnrolmentNationalityClassApi extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

//return males and females for a given field

//get nationality

public function getNationality($id=''){
if($id!=''){
$get=SettingsNationalityModel::select('id','name')->where('id',$id)->orderBy('name','ASC')->get();
}else{
$get=SettingsNationalityModel::select('id','name')->get();
}
return $get;
}


//get class

public function getEducationGrade($class=''){
    if($class!=''){
    $get=settings_education_grade::where('education_level_id',2)->where('id',$class)->orderBy('education_grade','ASC')->get();
    }else{
    $get=settings_education_grade::where('education_level_id',2)->orderBy('education_grade','ASC')->get();
    }

    foreach($get as $list){
    $array[]=$list;
    }
    return $array;
    }












//get Enrolment years
public function getEnrolmentYear($year=''){
if($year!=''){
$get=SchoolYearModel::select('school_year')->where('school_year',$year)->whereBetween('school_year',[2006,2011])->orderBy('school_year','DESC')->get();
}
else{
$get=SchoolYearModel::select('school_year')->whereBetween('school_year',[2006,2011])->orderBy('school_year','DESC')->get();
}

return $get;

}




//allyears

public function Allyears(){
    $get=PrimaryEnrolmentNationalityClassModel::select('enrolment_year')
->distinct()
->orderBy('enrolment_year','desc')->get();
return $get;
}


//get males
public function getMales($year,$nationality,$class){
$get=PrimaryEnrolmentNationalityClassModel::select('males')
->where('enrolment_year',$year)
->where('nationality',$nationality)
->where('class',$class)
->get();
if(count($get)>0){
foreach($get as $list);
$response=$list->males;
}else{
$response=0;
}

return $response;
}




//get females
public function getFemales($year,$nationality,$class){
    $get=PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('enrolment_year',$year)
    ->where('nationality',$nationality)
    ->where('class',$class)
    ->get();
    if(count($get)>0){
    foreach($get as $list);
    $response=$list->females;
    }else{
    $response=0;
    }

    return $response;
    }






  //chart data function

public function chartNationalityClass($enrolmentYear,$class,$nationality){
$get=$this->getEducationGrade($class);
foreach($get as $classItem){
$selectClass=$classItem->id;
 $response[]=array(
    str_replace('P','Primary ',$classItem->id),
    PrimaryEnrolmentNationalityClassModel::select('males')
    ->where('class',$selectClass)
    ->where('nationality',$nationality)
    ->where('enrolment_year',$enrolmentYear)
    ->sum('males')+
    PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('class',$selectClass)
    ->where('nationality',$nationality)
    ->where('enrolment_year',$enrolmentYear)
    ->sum('females')

    );


}

return $response;

}




















public function index(){
  $numRows= PrimaryEnrolmentNationalityClassModel::count();
  if($numRows > 0){
//selectable
$nationality=$this->getNationality();
//selectable
$class=$this->getEducationGrade();
//selectable
$enrolmentYear=$this->getEnrolmentYear();
foreach($enrolmentYear as $year){
$yyy[]=$year->school_year;
}
$enrolmentYear=max($yyy);





$allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->orderBy('school_year','desc')->get();


//Header
$header=['NATIONALITY','GENDER'];
//get classes formation
foreach($class as $classList){
$className=str_replace('P','Primary ',$classList->education_grade);
array_push($header,$className);
$classData[]=array(
'id'=>$classList->id,
'name'=>$className
);
}

//selectable
//get table body
foreach($nationality as $country){
foreach($class as $classList){
$males[]=array(
'nationality_id'=>$country->id,
'males'=>number_format(PrimaryEnrolmentNationalityClassModel::select('males')
->where('nationality',$country->id)->where('class',$classList->id)
->where('enrolment_year',$enrolmentYear)->sum('males'))
,
'enrolment_year'=>$enrolmentYear
);


$females[]=array(
    'nationality_id'=>$country->id,

    'females'=>number_format(PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('nationality',$country->id)->where('class',$classList->id)
    ->where('enrolment_year',$enrolmentYear)->sum('females')),


    'enrolment_year'=>$enrolmentYear
    );


    $totals[]=array(
        'nationality_id'=>$country->id,
        'total'=>
       number_format(
        PrimaryEnrolmentNationalityClassModel::select('males')
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$country->id)
        ->where('class',$classList->id)
        ->sum('males')+
        PrimaryEnrolmentNationalityClassModel::select('females')
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$country->id)
        ->where('class',$classList->id)
        ->sum('females')
       )
        ,

        'enrolment_year'=>$enrolmentYear
        );

}
//get country totals
//male row total
$maleRow[]=array(
    'nationality_id'=>$country->id,
    'maleRow'=>number_format( PrimaryEnrolmentNationalityClassModel::select('males')
    ->where('enrolment_year',$enrolmentYear)
    ->where('nationality',$country->id)
    ->sum('males')
    ));
//female row total
    $femaleRow[]=array(
        'nationality_id'=>$country->id,
        'femaleRow'=>number_format( PrimaryEnrolmentNationalityClassModel::select('females')
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$country->id)
        ->sum('females')
        )
        );
//total row
$totalRow[]=array(
    'nationality_id'=>$country->id,
    'totalRow'=>number_format( PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('enrolment_year',$enrolmentYear)
    ->where('nationality',$country->id)
    ->sum('females')+
    PrimaryEnrolmentNationalityClassModel::select('males')
    ->where('enrolment_year',$enrolmentYear)
    ->where('nationality',$country->id)
    ->sum('males')
    )
    );

}
//get grand total
foreach($class as $classList){
$grandTotal[]=array(
'class'=>$classList->id,
'sum'=>array(
number_format(PrimaryEnrolmentNationalityClassModel::select('males')
->where('class',$classList->id)
->where('enrolment_year',$enrolmentYear)
->sum('males')+
PrimaryEnrolmentNationalityClassModel::select('females')
->where('class',$classList->id)
->where('enrolment_year',$enrolmentYear)
->sum('females')
))
);
}

$sumRow=number_format( PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('enrolment_year',$enrolmentYear)
    ->sum('females')+PrimaryEnrolmentNationalityClassModel::select('males')
    ->where('enrolment_year',$enrolmentYear)
    ->sum('males')
);






//chart data
$chartClass='';
foreach($nationality as $nation){
$id=$nation->id;
$chart[]=array(
'name'=>$nation->name,
'data'=>$this->chartNationalityClass($enrolmentYear,$chartClass,$id)
);
}






return ['tableChart'=>$chart,'tableHeader'=>$header,'tableClass'=>$class,'tableNationality'=>$nationality,'tableYear'=>$enrolmentYear,'tableTotal'=>$totals,'tableFemales'=>$females,'tableMales'=>$males,'tableSum'=>$grandTotal,'rowMale'=>$maleRow,'rowFemale'=>$femaleRow,'rowTotal'=>$totalRow,'sumRow'=>$sumRow,'enrolment_year'=>$this->getEnrolmentYear(),'numRows'=>$numRows,'allYear'=>$allYears];
  }else{

    return['numRows'=>$numRows];
  }
}














public function filterNationality (Request $request){
    $numRows= PrimaryEnrolmentNationalityClassModel::count();
    if($numRows > 0){
        $filterNation= $request->input('name');
      $filterclass=$request->input('class');
      $filteryear=$request->input('year');
  //selectable
  $nationality=$this->getNationality($filterNation);
  //selectable
  $class=$this->getEducationGrade($filterclass);
  //selectable
  $enrolmentYear=$this->getEnrolmentYear($filteryear);
  foreach($enrolmentYear as $year){
  $yyy[]=$year->school_year;
  }
  $enrolmentYear=max($yyy);





  $allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->where('school_year','!=',$enrolmentYear)->orderBy('school_year','desc')->get();


  //Header
  $header=['Nationality','Gender'];
  //get classes formation
  foreach($class as $classList){
  $className=str_replace('P','Primary ',$classList->education_grade);
  array_push($header,$className);
  $classData[]=array(
  'id'=>$classList->id,
  'name'=>$className
  );
  }

  //selectable
  //get table body
  foreach($nationality as $country){
  foreach($class as $classList){
  $males[]=array(
  'nationality_id'=>$country->id,
  'males'=>number_format(PrimaryEnrolmentNationalityClassModel::select('males')
  ->where('nationality',$country->id)->where('class',$classList->id)
  ->where('enrolment_year',$enrolmentYear)->sum('males'))
  ,


  'enrolment_year'=>$enrolmentYear
  );


  $females[]=array(
      'nationality_id'=>$country->id,

      'females'=>number_format(PrimaryEnrolmentNationalityClassModel::select('females')
      ->where('nationality',$country->id)->where('class',$classList->id)
      ->where('enrolment_year',$enrolmentYear)->sum('females')),


      'enrolment_year'=>$enrolmentYear
      );


      $totals[]=array(
          'nationality_id'=>$country->id,
          'total'=>
         number_format(
          PrimaryEnrolmentNationalityClassModel::select('males')
          ->where('enrolment_year',$enrolmentYear)
          ->where('nationality',$country->id)
          ->where('class',$classList->id)
          ->sum('males')+
          PrimaryEnrolmentNationalityClassModel::select('females')
          ->where('enrolment_year',$enrolmentYear)
          ->where('nationality',$country->id)
          ->where('class',$classList->id)
          ->sum('females')
         )
          ,

          'enrolment_year'=>$enrolmentYear
          );

  }
  //get country totals
  //male row total
  $maleRow[]=array(
      'nationality_id'=>$country->id,
      'maleRow'=>number_format( PrimaryEnrolmentNationalityClassModel::select('males')
      ->where('enrolment_year',$enrolmentYear)
      ->where('nationality',$country->id)
      ->sum('males')
      ));
  //female row total
      $femaleRow[]=array(
          'nationality_id'=>$country->id,
          'femaleRow'=>number_format( PrimaryEnrolmentNationalityClassModel::select('females')
          ->where('enrolment_year',$enrolmentYear)
          ->where('nationality',$country->id)
          ->sum('females')
          )
          );
  //total row
  $totalRow[]=array(
      'nationality_id'=>$country->id,
      'totalRow'=>number_format( PrimaryEnrolmentNationalityClassModel::select('females')
      ->where('enrolment_year',$enrolmentYear)
      ->where('nationality',$country->id)
      ->sum('females')+
      PrimaryEnrolmentNationalityClassModel::select('males')
      ->where('enrolment_year',$enrolmentYear)
      ->where('nationality',$country->id)
      ->sum('males')
      )
      );

  }
  //get grand total

  if($filterNation!=''){
    foreach($class as $classList){
        $grandTotal[]=array(
        'class'=>$classList->id,
        'sum'=>array(
        number_format(PrimaryEnrolmentNationalityClassModel::select('males')
        ->where('class',$classList->id)
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$filterNation)
        ->sum('males')+
        PrimaryEnrolmentNationalityClassModel::select('females')
        ->where('class',$classList->id)
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$filterNation)
        ->sum('females')
        ))
        );
        }
  }else{
  foreach($class as $classList){
  $grandTotal[]=array(
  'class'=>$classList->id,
  'sum'=>array(
  number_format(PrimaryEnrolmentNationalityClassModel::select('males')
  ->where('class',$classList->id)
  ->where('enrolment_year',$enrolmentYear)
  ->sum('males')+
  PrimaryEnrolmentNationalityClassModel::select('females')
  ->where('class',$classList->id)
  ->where('enrolment_year',$enrolmentYear)
  ->sum('females')
  ))
  );
  }
}
  $sumRow=number_format( PrimaryEnrolmentNationalityClassModel::select('females')
      ->where('enrolment_year',$enrolmentYear)
      ->sum('females')+PrimaryEnrolmentNationalityClassModel::select('males')
      ->where('enrolment_year',$enrolmentYear)
      ->sum('males')
  );






  //chart data
  $chartClass='';
  foreach($nationality as $nation){
  $id=$nation->id;
  $chart[]=array(
  'name'=>$nation->name,
  'data'=>$this->chartNationalityClass($enrolmentYear,$chartClass,$id)
  );
  }






  return ['tableChart'=>$chart,'tableHeader'=>$header,'tableClass'=>$class,'tableNationality'=>$nationality,'tableYear'=>$enrolmentYear,'tableTotal'=>$totals,'tableFemales'=>$females,'tableMales'=>$males,'tableSum'=>$grandTotal,'rowMale'=>$maleRow,'rowFemale'=>$femaleRow,'rowTotal'=>$totalRow,'sumRow'=>$sumRow,'enrolment_year'=>$this->getEnrolmentYear(),'numRows'=>$numRows,'allYear'=>$allYears];
    }else{

      return['numRows'=>$numRows];
    }
  }












    //filter content goes here


    public function chartNationalityClassfilter($enrolmentYear,$class,$nationality){
        $get=$this->getFilterEducationGrade($class);
        foreach($get as $classItem){
         $response[]=array(
            str_replace('P','Primary ',$classItem->id),
            PrimaryEnrolmentNationalityClassModel::select('males')
            ->where('class',$classItem->id)
            ->where('nationality',$nationality)
            ->where('enrolment_year',$enrolmentYear)
            ->sum('males')+PrimaryEnrolmentNationalityClassModel::select('females')
            ->where('class',$classItem->id)
            ->where('nationality',$nationality)
            ->where('enrolment_year',$enrolmentYear)
            ->sum('females')
            );


        }

        return $response;

        }
    public function getFilterEducationGrade($class=''){
        if($class!=''){
        $get=settings_education_grade::where('education_level_id',2)->where('education_grade',$class)->orderBy('education_grade','ASC')->get();
        }else{
        $get=settings_education_grade::where('education_level_id',2)->orderBy('education_grade','ASC')->get();
        }

        foreach($get as $list){
        $array[]=$list;
        }
        return $array;
        }























//advanced filter

public function advancedFilter( Request $request){
//selectable
$nationality=$this->getNationality();
//selectable
$fromYear=$request->input('fromYear');
$toYear=$request->input('toYear');
if($fromYear < $toYear){
    $startYear=$fromYear;
$endYear=$toYear;
}else{

    $startYear=$toYear;
    $endYear=$fromYear;
}

$selectClass=$request->input('selectedClass');;

$class=$this->getEducationGrade($selectClass);
foreach($class as $classList);
$className=$classList->education_grade;
$classID=$classList->id;
$className=str_replace('P','Primary ',$className);

$enrolmentYears=SchoolYearModel::select('id','school_year')
->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();


//headers
$header=['NATIONALITY','GENDER'];
foreach($enrolmentYears as $yy){
$selectedYears[]=$yy->school_year;
array_push($header,$className.' - '.$yy->school_year);

$bottom_total[]=array(
'sum'=>array(
    number_format(
        PrimaryEnrolmentNationalityClassModel::select('males')
        ->where('class',$classID)
        ->where('enrolment_year',$yy->school_year)->sum('males')+
        PrimaryEnrolmentNationalityClassModel::select('males')
        ->where('class',$classID)
    ->where('enrolment_year',$yy->school_year)->sum('males')
    )
)
);

}


//males females and totals

foreach($nationality as $country){
foreach($enrolmentYears as $yy){

$males[]=array(
'nationality_id'=>$country->id,
'males'=>number_format(PrimaryEnrolmentNationalityClassModel::select('males')
->where('nationality',$country->id)->where('class',$classID)
->where('enrolment_year',$yy->school_year)->sum('males')),
'enrolment_year'=>$yy->school_year
);


$females[]=array(
    'nationality_id'=>$country->id,
    'females'=>number_format(PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('nationality',$country->id)->where('class',$classID)
    ->where('enrolment_year',$yy->school_year)->sum('females')),
    'enrolment_year'=>$yy->school_year
    );


$totals[]=array(
'nationality_id'=>$country->id,
'total'=>number_format(

    PrimaryEnrolmentNationalityClassModel::select('males')
    ->where('nationality',$country->id)->where('class',$classID)
    ->where('enrolment_year',$yy->school_year)->sum('males')+
    PrimaryEnrolmentNationalityClassModel::select('females')
    ->where('nationality',$country->id)->where('class',$classID)
    ->where('enrolment_year',$yy->school_year)->sum('females')

)
);
}
}




return ['tableHeader'=>$header,'className'=>$className,'tableFemales'=>$females,'tableMales'=>$males,'tableTotal'=>$totals,'tableSum'=>$bottom_total,'tableNationality'=>$nationality];


}





}
