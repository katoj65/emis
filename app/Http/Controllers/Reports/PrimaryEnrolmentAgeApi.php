<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PrimaryEnrolmentAgeModel;
use App\Models\settings_age;
use App\Models\settings_education_grade;
use App\Models\settings_education_level;
use PrimaryEnrolmentAge;
use Illuminate\Support\Facades\DB;
use Prophecy\Exception\Prediction\PredictionException;
use App\Models\SchoolYearModel;

class PrimaryEnrolmentAgeApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//get academic level
public function getEducationLevel(){
$get=settings_education_level::where('id',2)->get();
foreach($get as $list);
return $list->id;
}


//get classes
public function getEducationGrade($level,$class=''){
if($class!=''){
$get=settings_education_grade::where('education_level_id',$level)->where('id',$class)->orderBy('education_grade','ASC')->get();
}else{
$get=settings_education_grade::where('education_level_id',$level)->orderBy('education_grade','ASC')->get();
}

foreach($get as $list){
$array[]=$list;
}
return $array;
}







//search
public function getEducationGradesearch($level,$class=''){
    if($class!=''){
    $get=settings_education_grade::where('education_level_id',$level)->where('education_grade',$class)->orderBy('education_grade','ASC')->get();
    }else{
    $get=settings_education_grade::where('education_level_id',$level)->orderBy('education_grade','ASC')->get();
    }

    foreach($get as $list){
    $array[]=$list;
    }
    return $array;
    }





//get ages

public function getAges($age=''){
if($age!=''){
$get=settings_age::where('age',$age)->where('id','>',3)->where('id','<',13)->orderBy('id','ASC')->get();
}else{
$get=settings_age::where('id','>',3)->where('id','<',13)->orderBy('id','ASC')->get();
}
foreach($get as $list){
$ages[]=$list;
}
return $ages;
}










//get enrolment years
public function getEnrolmentYears($year=''){
if($year!=''){
$get=SchoolYearModel::select('school_year')->distinct()->where('school_year',$year)->get();
}else{
$get=SchoolYearModel::select('school_year')->orderBy('school_year','desc')->get();
}
return $get;
}





//chart data function
public function getChartAge($class,$selectAge,$selectYear){
$get=$this->getAges($selectAge);
foreach($get as $age){
$ages[]=array($age->age,
PrimaryEnrolmentAgeModel::select('males')->where('class',$class)->where('age',$age->id)->where('enrolment_year',$selectYear)->sum('males')+
PrimaryEnrolmentAgeModel::select('females')->where('class',$class)->where('age',$age->id)->where('enrolment_year',$selectYear)->sum('females')
);
}
return $ages;
}

















public function index(){
    $nunRows=PrimaryEnrolmentAgeModel::count();
    if($nunRows>0){
//get Level
$level=$this->getEducationLevel();
$classes=$this->getEducationGrade($level);
$age=$this->getAges();
//adjustable
$yearOfEnrolment=$this->getEnrolmentYears(2010);
foreach($yearOfEnrolment as $defYear);
$enrolment_year=$defYear->school_year;


//format classes
foreach($classes as $classItem){
$className=str_replace('P','Primary ',$classItem->education_grade);
$classItems[]=array('id'=>$classItem->id,'name'=>$className);
}





//table header
$header=['Class','Gender'];
foreach($age as $ageList){
array_push($header,$ageList->age);
}

//create class by age





foreach($classes as $classList){

foreach($age as $ageList){

    $males[]=array(
        'class'=>$classList->education_grade,
        'class_id'=>$classList->id,
        'years'=>$ageList->age,
        'males'=>number_format(PrimaryEnrolmentAgeModel::select('males')
        ->where('class',$classList->id)
        ->where('age',$ageList->id)
        ->where('enrolment_year',$enrolment_year)
        ->sum('males'))

        //$this->getMaleTotal($classList->education_grade,$ageList->age,$enrolment_year),
        );


        $females[]=array(
            'class'=>$classList->education_grade,
            'class_id'=>$classList->id,
            'years'=>$ageList->age,
            'females'=>number_format(PrimaryEnrolmentAgeModel::select('females')
            ->where('class',$classList->id)
            ->where('age',$ageList->id)
            ->where('enrolment_year',$enrolment_year)
            ->sum('females'))

        );



        $total[]=array(
            'class'=>$classList->education_grade,
            'class_id'=>$classList->id,
            'years'=>$ageList->age,
            'totals'=>number_format(PrimaryEnrolmentAgeModel::select('males')
            ->where('class',$classList->id)
            ->where('enrolment_year',$enrolment_year)
            ->where('age',$ageList->id)

            ->sum('males')+
            PrimaryEnrolmentAgeModel::select('females')
            ->where('class',$classList->id)
            ->where('enrolment_year',$enrolment_year)
            ->where('age',$ageList->id)

            ->sum('females'))

        );




}
}




//get class gender sum
foreach($classes as $classList){
$femaleSum[]=array(
'id'=>$classList->id,
'name'=>$classList->education_grade,
'females'=>number_format(PrimaryEnrolmentAgeModel::select('females')->where('class',$classList->id)
->where('enrolment_year',$enrolment_year)->sum('females'))

);


$maleSum[]=array(
    'id'=>$classList->id,
    'name'=>$classList->education_grade,
    'males'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('class',$classList->id)
    ->where('enrolment_year',$enrolment_year)->sum('males'))

    );



    $totalSum[]=array(
        'id'=>$classList->id,
        'name'=>$classList->education_grade,
        'genderSum'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('class',$classList->id)
       ->where('enrolment_year',$enrolment_year)->sum('males')+
       PrimaryEnrolmentAgeModel::select('females')->where('class',$classList->id)
->where('enrolment_year',$enrolment_year)->sum('females'))

);

}




//get sum of all genders
foreach($age as $ageList){
$allGenders[]=array(
'age'=>$ageList->age,
'grandTotal'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('age',$ageList->id)
->where('enrolment_year',$enrolment_year)->sum('males')+
PrimaryEnrolmentAgeModel::select('females')->where('age',$ageList->id)
->where('enrolment_year',$enrolment_year)->sum('females'))
);
}





//get all genders and classes total

$totalGenderClass=PrimaryEnrolmentAgeModel::select('males')->where('enrolment_year',$enrolment_year)->sum('males')+
PrimaryEnrolmentAgeModel::select('females')->where('enrolment_year',$enrolment_year)->sum('females');




//chart data
$selectAge='';
$selectYear=$defYear->school_year;
foreach($classes as $classItem){
$chart[]=array('name'=>str_replace('P','Primary ',$classItem->education_grade),
'data'=>$this->getChartAge($classItem->id,$selectAge,$selectYear)

);
}




//return $females;



$allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])
->orderBy('school_year','desc')->get();


         return  ['tableChart'=>$chart,'tableHeader'=>$header,'tableMales'=>$males,'tableFemales'=>$females,'tableTotal'=>$total,'class'=>$classItems,'enrolment_year'=>$enrolment_year,'maleSum'=>$maleSum,'femaleSum'=>$femaleSum,'totalSum'=>$totalSum,'allAges'=>$allGenders,'allGenderClass'=>$totalGenderClass,'tableYears'=>$allYears,'nunRows'=>$nunRows];
    }
else{
    return['nunRows'=>$nunRows];
}
    }










    public function filterClassApi(Request $request){
        $nunRows=PrimaryEnrolmentAgeModel::count();
        if($nunRows>0){
            $filtAge=$request->input('age');
            $yearr=$request->input('year');
            $class=$request->input('class');

    $level=$this->getEducationLevel();
    $classes=$this->getEducationGrade($level,$class);
    $age=$this->getAges($filtAge);
    //adjustable
    if($yearr!=''){$yearOfEnrolment=$this->getEnrolmentYears($yearr);}
    else{
        $yearOfEnrolment=$this->getEnrolmentYears(2010);
    }

    $allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])
->orderBy('school_year','desc')->get();

    foreach($yearOfEnrolment as $defYear);
    $enrolment_year=$defYear->school_year;


    //format classes
    foreach($classes as $classItem){
    $className=str_replace('P','Primary ',$classItem->education_grade);
    $classItems[]=array('id'=>$classItem->id,'name'=>$className);
    }





    //table header
    $header=['Class','Gender'];
    foreach($age as $ageList){
    array_push($header,$ageList->age);
    }

    //create class by age





    foreach($classes as $classList){

    foreach($age as $ageList){

        $males[]=array(
            'class'=>$classList->education_grade,
            'class_id'=>$classList->id,
            'years'=>$ageList->age,
            'males'=>number_format(PrimaryEnrolmentAgeModel::select('males')
            ->where('class',$classList->id)
            ->where('age',$ageList->id)
            ->where('enrolment_year',$enrolment_year)
            ->sum('males'))

            //$this->getMaleTotal($classList->education_grade,$ageList->age,$enrolment_year),
            );


            $females[]=array(
                'class'=>$classList->education_grade,
                'class_id'=>$classList->id,
                'years'=>$ageList->age,
                'females'=>number_format(PrimaryEnrolmentAgeModel::select('females')
                ->where('class',$classList->id)
                ->where('age',$ageList->id)
                ->where('enrolment_year',$enrolment_year)
                ->sum('females'))

            );



            $total[]=array(
                'class'=>$classList->education_grade,
                'class_id'=>$classList->id,
                'years'=>$ageList->age,
                'totals'=>number_format(PrimaryEnrolmentAgeModel::select('males')
                ->where('class',$classList->id)
                ->where('enrolment_year',$enrolment_year)
                ->where('age',$ageList->id)
                ->limit(100)
                ->sum('males')+
                PrimaryEnrolmentAgeModel::select('females')
                ->where('class',$classList->id)
                ->where('enrolment_year',$enrolment_year)
                ->where('age',$ageList->id)
                ->limit(100)
                ->sum('females'))

            );




    }
    }




    //get class gender sum
    foreach($classes as $classList){
    $femaleSum[]=array(
    'id'=>$classList->id,
    'name'=>$classList->education_grade,
    'females'=>number_format(PrimaryEnrolmentAgeModel::select('females')->where('class',$classList->id)
    ->where('enrolment_year',$enrolment_year)->sum('females'))

    );


    $maleSum[]=array(
        'id'=>$classList->id,
        'name'=>$classList->education_grade,
        'males'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('class',$classList->id)
        ->where('enrolment_year',$enrolment_year)->sum('males'))

        );



        $totalSum[]=array(
            'id'=>$classList->id,
            'name'=>$classList->education_grade,
            'genderSum'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('class',$classList->id)
           ->where('enrolment_year',$enrolment_year)->sum('males')+
           PrimaryEnrolmentAgeModel::select('females')->where('class',$classList->id)
    ->where('enrolment_year',$enrolment_year)->sum('females'))

    );

    }




    //get sum of all genders

    if($class!=''){

        foreach($age as $ageList){
            $allGenders[]=array(
            'age'=>$ageList->age,
            'grandTotal'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('age',$ageList->id)
            ->where('enrolment_year',$enrolment_year)->where('class',$class)->sum('males')+
            PrimaryEnrolmentAgeModel::select('females')->where('age',$ageList->id)
            ->where('enrolment_year',$enrolment_year)->where('class',$class)->sum('females'))
            );
            }

    }else{

        foreach($age as $ageList){
            $allGenders[]=array(
            'age'=>$ageList->age,
            'grandTotal'=>number_format(PrimaryEnrolmentAgeModel::select('males')->where('age',$ageList->id)
            ->where('enrolment_year',$enrolment_year)->sum('males')+
            PrimaryEnrolmentAgeModel::select('females')->where('age',$ageList->id)
            ->where('enrolment_year',$enrolment_year)->sum('females'))
            );
            }


    }





    //get all genders and classes total

    $totalGenderClass=PrimaryEnrolmentAgeModel::select('males')->where('enrolment_year',$enrolment_year)->sum('males')+
    PrimaryEnrolmentAgeModel::select('females')->where('enrolment_year',$enrolment_year)->sum('females');




    //chart data
    $selectAge=$filtAge;
    $selectYear=$defYear->school_year;
    foreach($classes as $classItem){
    $chart[]=array('name'=>str_replace('P','Primary ',$classItem->education_grade),
    'data'=>$this->getChartAge($classItem->id,$selectAge,$selectYear)

    );
    }




    //return $females;



    $allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])
    ->orderBy('school_year','desc')->get();


    return  ['tableChart'=>$chart,'tableHeader'=>$header,'tableMales'=>$males,'tableFemales'=>$females,'tableTotal'=>$total,'class'=>$classItems,'enrolment_year'=>$enrolment_year,'maleSum'=>$maleSum,'femaleSum'=>$femaleSum,'totalSum'=>$totalSum,'allAges'=>$allGenders,'allGenderClass'=>$totalGenderClass,'tableYears'=>$allYears,'nunRows'=>$nunRows];
}
else{
return['nunRows'=>$nunRows];
}

        }



//












//advanced filter


public function advancedFilter(Request $request){

//selectable
$fromYear=$request->input('fromYear');
$toYear=$request->input('endYear');
if($fromYear < $toYear ){
$startYear=$fromYear;
$endYear=$toYear;
}else{
$startYear= $toYear;
$endYear=$fromYear;
}

$selectAge=$request->input('selectAge');;

//get Level
$level=$this->getEducationLevel();
$classes=$this->getEducationGrade($level);

//select years
$age=$this->getAges($selectAge);
foreach($age as $ageList);
$ageID=$ageList->id;
$ageName=$ageList->age;

//check start and end years
$schoolYears=SchoolYearModel::whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();

//format classes
foreach($classes as $classItem){
 $className=str_replace('P','Primary ',$classItem->education_grade);
$classItems[]=array('id'=>$classItem->id,'name'=>$className);
}



//table header
$header=['Class','Gender'];
foreach($schoolYears as $sy){
array_push($header,$ageName.' - '.$sy->school_year);


//bottom total
$bottom_total[]=array('grandTotal'=>number_format(PrimaryEnrolmentAgeModel::select('females')
->where('age',$ageID)
->where('enrolment_year',$sy->school_year)
->sum('females')+PrimaryEnrolmentAgeModel::select('males')
->where('age',$ageID)
->where('enrolment_year',$sy->school_year)
->sum('males'))
);


}



//format classes
foreach($classes as $classItem){

//get years based on class
foreach($schoolYears as $y){
$females[]=array(
'class_id'=>$classItem->id,
'females'=>number_format(PrimaryEnrolmentAgeModel::select('females')
->where('class',$classItem->id)
->where('age',$ageID)
->where('enrolment_year',$y->school_year)
->sum('females'))
);




$males[]=array(
    'class_id'=>$classItem->id,
    'males'=>number_format(PrimaryEnrolmentAgeModel::select('males')
    ->where('class',$classItem->id)
    ->where('age',$ageID)
    ->where('enrolment_year',$y->school_year)
    ->sum('males'))
    );



    $total[]=array(
        'class_id'=>$classItem->id,

        'totals'=>number_format(PrimaryEnrolmentAgeModel::select('females')
        ->where('class',$classItem->id)
        ->where('age',$ageID)
        ->where('enrolment_year',$y->school_year)
        ->sum('females')+PrimaryEnrolmentAgeModel::select('males')
        ->where('class',$classItem->id)
        ->where('age',$ageID)
        ->where('enrolment_year',$y->school_year)
        ->sum('males'))
        );



}

}









return['tableHeader'=>$header,'class'=>$classItems,'allAges'=>$bottom_total,'tableMales'=>$males,'tableFemales'=>$females,'tableTotal'=>$total];

}















































}
