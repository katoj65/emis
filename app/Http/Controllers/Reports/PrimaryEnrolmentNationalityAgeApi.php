<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryEnrolmentNationalityAgeModel;
use App\Models\SettingsNationalityModel;
use App\Models\EnrolmentByNationalityModel;
use App\Models\PrimaryEnrolmentNationalityClassModel;
use App\Models\settings_age;
use App\Models\settings_education_grade;
use App\Models\settings_education_level;



class PrimaryEnrolmentNationalityAgeApi extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */


public function getNationality($id=''){
    if($id!=''){
    $get=SettingsNationalityModel::select('id','name')->where('id',$id)->orderBy('name','ASC')->get();
    }else{
    $get=SettingsNationalityModel::select('id','name')->get();
    }
    return $get;
    }




    //get Enrolment years
    public function getEnrolmentYear($year=''){
if($year!=''){
    $get=PrimaryEnrolmentNationalityAgeModel::select('enrolment_year')
    ->where('enrolment_year',$year)
    ->orderBy('enrolment_year','ASC')
    ->distinct()
    ->get();
}else{
$get=PrimaryEnrolmentNationalityAgeModel::select('enrolment_year')
->distinct()
->orderBy('enrolment_year','ASC')
->get();
}

return $get;

    }






//get males
public function getMales($year,$nationality,$age){
    $get=PrimaryEnrolmentNationalityAgeModel::select('males')
    ->where('enrolment_year',$year)
    ->where('nationality',$nationality)
    ->where('age',$age)
    ->get();
    if(count($get)>0){
    foreach($get as $list);
    $response=$list->males;
    }else{
    $response=0;
    }

    return $response;
    }





    public function getFemales($year,$nationality,$age){
        $get=PrimaryEnrolmentNationalityAgeModel::select('females')
        ->where('enrolment_year',$year)
        ->where('nationality',$nationality)
        ->where('age',$age)
        ->get();
        if(count($get)>0){
        foreach($get as $list);
        $response=$list->females;
        }else{
        $response=0;
        }

        return $response;
        }






//get ages
public function getAges($age=''){
if($age==''){
$get=settings_age::select('age')->whereBetween('id',[4,12])->orderBy('id','ASC')->get();
}else{
$get=settings_age::select('age')->where('age',$age)->orderBy('id','ASC')->get();
}
return $get;
}




//chart function

public function getChartNationalityAge($selectAge,$selectNationality,$selectEnrolmentYear){
$get=$this->getAges($selectAge);

foreach($get as $age){
$response[]=array(
$age->age,
 number_format(PrimaryEnrolmentNationalityAgeModel::select('males')
->where('age',$age->age)
->where('nationality',$selectNationality)
->where('enrolment_year',$selectEnrolmentYear)
->sum('males')+
PrimaryEnrolmentNationalityAgeModel::select('females')
->where('age',$age->age)
->where('nationality',$selectNationality)
->where('enrolment_year',$selectEnrolmentYear)
->sum('females'))


);
}


return $response;



}













//index functionality
public function index()
{
$numRows=PrimaryEnrolmentNationalityAgeModel::count();
if($numRows > 0){
$nationality=$this->getNationality();
$defYear=$this->getEnrolmentYear(2010);
$years=$this->getEnrolmentYear();
$ages=$this->getAges();
//get default year
foreach($defYear as $yy);
$enrolmentYear=$yy->enrolment_year;


//header
$header=['Nationality','Gender'];

//get ages
foreach($ages as $age){
array_push($header,$age->age);
}
array_push($header,'TOTAL');
array_push($header,'Enrolment Year');



//get table body
foreach($nationality as $country){
foreach($ages as $age){
//get males
$males[]=array(
'nationality'=>$country->name,
'nationality_id'=>$country->id,
'age'=>$age->age,
'males'=>$this->getMales($enrolmentYear,$country->id,$age->age)
);


//get females
$females[]=array(
'nationality'=>$country->name,
'nationality_id'=>$country->id,
'age'=>$age->age,
'females'=>$this->getFemales($enrolmentYear,$country->id,$age->age)
);


//get totals
$totals[]=array(
'nationality'=>$country->name,
'nationality_id'=>$country->id,
'age'=>$age->age,
'totals'=>$this->getFemales($enrolmentYear,$country->id,$age->age)+
$this->getMales($enrolmentYear,$country->id,$age->age)
);








}





//row sum
$sumTotal[]=array(
'id'=>$country->id,
'sum'=>PrimaryEnrolmentNationalityAgeModel::select('females')
->where('enrolment_year',$enrolmentYear)
->where('nationality',$country->id)
->sum('females')+
PrimaryEnrolmentNationalityAgeModel::select('males')
->where('enrolment_year',$enrolmentYear)
->where('nationality',$country->id)
->sum('males')

);






//male row
$maleRow[]=array(
'id'=>$country->id,
'rowMale'=>PrimaryEnrolmentNationalityAgeModel::select('males')
->where('nationality',$country->id)
->where('enrolment_year',$enrolmentYear)
->sum('males')

);


//female row
$femaleRow[]=array(
'id'=>$country->id,
'rowFemale'=>PrimaryEnrolmentNationalityAgeModel::select('females')
->where('nationality',$country->id)
->where('enrolment_year',$enrolmentYear)
->sum('females')

);


}






//row sum
$sumRow=PrimaryEnrolmentNationalityAgeModel::select('females')
->where('enrolment_year',$enrolmentYear)
->sum('females')+
PrimaryEnrolmentNationalityAgeModel::select('males')
->where('enrolment_year',$enrolmentYear)
->sum('males');



//grand total
foreach($ages as $age){
$grandSum[]=array(
'age'=>$age->age,
'sum'=>PrimaryEnrolmentNationalityAgeModel::select('females')
->where('age',$age->age)
->where('enrolment_year',$enrolmentYear)
->sum('females')+
PrimaryEnrolmentNationalityAgeModel::select('males')
->where('age',$age->age)
->where('enrolment_year',$enrolmentYear)
->sum('males'));
}








//chart data
$selectAge='';
foreach($nationality as $nation){
$chart[]=array(
'name'=>$nation->name,
'data'=>$this->getChartNationalityAge($selectAge,$nation->id,$enrolmentYear)
);
}






//return $chart;

return (['tableChart'=>$chart,'tableHeader'=>$header,'tableNationality'=>$nationality,'tableAges'=>$this->getAges(),'tableMales'=>$males,'tableFemales'=>$females,'tableTotal'=>$totals,'sumRow'=>$sumRow,'maleRow'=>$maleRow,'femaleRow'=>$femaleRow,'tableGrandSum'=>$grandSum,'sumTotal'=>$sumTotal,'tableEnrolment_year'=>$enrolmentYear,'years'=>$this->getEnrolmentYear(),'numRows'=>$numRows]);

}else{
return['numRows'=>$numRows];
}

}
//search api



public function searchApi(Request $request){
        $search=$request->input('nationality');
        $nationality=SettingsNationalityModel::where('name','like','%'.$search.'%')->select('id','name')->get();
        $defYear=$this->getEnrolmentYear(2010);
        $numRows=count($nationality);
        if($numRows > 0){
        $years=$this->getEnrolmentYear();
        $ages=$this->getAges();
        //get default year
        foreach($defYear as $yy);
        $enrolmentYear=$yy->enrolment_year;
        //header
        $header=['Nationality','Gender'];
        //get ages
        foreach($ages as $age){
        array_push($header,$age->age);
        }
        array_push($header,'TOTAL');
        array_push($header,'Enrolment Year');
        //get table body
        foreach($nationality as $country){
        foreach($ages as $age){
        //get males
        $males[]=array(
        'nationality'=>$country->name,
        'nationality_id'=>$country->id,
        'age'=>$age->age,
        'males'=>$this->getMales($enrolmentYear,$country->id,$age->age)
        );
        //get females
        $females[]=array(
        'nationality'=>$country->name,
        'nationality_id'=>$country->id,
        'age'=>$age->age,
        'females'=>$this->getFemales($enrolmentYear,$country->id,$age->age)
        );
        //get totals
        $totals[]=array(
        'nationality'=>$country->name,
        'nationality_id'=>$country->id,
        'age'=>$age->age,
        'totals'=>$this->getFemales($enrolmentYear,$country->id,$age->age)+
        $this->getMales($enrolmentYear,$country->id,$age->age)
        );
        }
        //row sum
        $sumTotal[]=array(
        'id'=>$country->id,
        'sum'=>PrimaryEnrolmentNationalityAgeModel::select('females')
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$country->id)
        ->sum('females')+
        PrimaryEnrolmentNationalityAgeModel::select('males')
        ->where('enrolment_year',$enrolmentYear)
        ->where('nationality',$country->id)
        ->sum('males')

        );
        //male row
        $maleRow[]=array(
        'id'=>$country->id,
        'rowMale'=>PrimaryEnrolmentNationalityAgeModel::select('males')
        ->where('nationality',$country->id)
        ->where('enrolment_year',$enrolmentYear)
        ->sum('males')
        );
        //female row
        $femaleRow[]=array(
        'id'=>$country->id,
        'rowFemale'=>PrimaryEnrolmentNationalityAgeModel::select('females')
        ->where('nationality',$country->id)
        ->where('enrolment_year',$enrolmentYear)
        ->sum('females')
        );
        }
        //row sum
        $sumRow=PrimaryEnrolmentNationalityAgeModel::select('females')
        ->where('enrolment_year',$enrolmentYear)
        ->sum('females')+
        PrimaryEnrolmentNationalityAgeModel::select('males')
        ->where('enrolment_year',$enrolmentYear)
        ->sum('males');
        //grand total
        foreach($ages as $age){
        $grandSum[]=array(
        'age'=>$age->age,
        'sum'=>PrimaryEnrolmentNationalityAgeModel::select('females')
        ->where('age',$age->age)
        ->where('enrolment_year',$enrolmentYear)
        ->sum('females')+
        PrimaryEnrolmentNationalityAgeModel::select('males')
        ->where('age',$age->age)
        ->where('enrolment_year',$enrolmentYear)
        ->sum('males'));
        }
        return (['tableHeader'=>$header,'tableNationality'=>$nationality,'tableAges'=>$this->getAges(),'tableMales'=>$males,'tableFemales'=>$females,'tableTotal'=>$totals,'sumRow'=>$sumRow,'maleRow'=>$maleRow,'femaleRow'=>$femaleRow,'tableGrandSum'=>$grandSum,'sumTotal'=>$sumTotal,'tableEnrolment_year'=>$enrolmentYear,'years'=>$this->getEnrolmentYear(),'noResults'=>$numRows]);
        }else{
        return['noResults'=>$numRows];
        }


}






//filterApi

//chart function

public function getChartNationalityAgeFilter($selectAge,$selectNationality,$selectEnrolmentYear){
    $get=$this->getAges($selectAge);

    foreach($get as $age){
    $response[]=array(
    $age->age,
    PrimaryEnrolmentNationalityAgeModel::select('males')
    ->where('age',$age->age)
    ->where('id',$selectNationality)
    ->where('enrolment_year',$selectEnrolmentYear)
    ->sum('males')+
    PrimaryEnrolmentNationalityAgeModel::select('females')
    ->where('age',$age->age)
    ->where('nationality',$selectNationality)
    ->where('enrolment_year',$selectEnrolmentYear)
    ->sum('females')


    );
    }


    return $response;



    }
public function filterApi(Request $request){
    $name=$request->input('name');
    $age=$request->input('age');
    $yearsfilt=$request->input('year');
    $nationality=$this->getNationality($name);
    $defYear=$this->getEnrolmentYear($yearsfilt);
   $agef=$request->input('age');
    $numRows=count($nationality);
    if($numRows > 0){
    $years=$this->getEnrolmentYear();
    $ages=$this->getAges($age);
    //get default year

    foreach($defYear as $yy);
    $enrolmentYear=$yy->enrolment_year;
    //header
    $header=['Nationality','Gender'];
    //get ages
    foreach($ages as $age){
    array_push($header,$age->age);
    }
    array_push($header,'TOTAL');
    array_push($header,'Enrolment Year');
    //get table body
    foreach($nationality as $country){
    foreach($ages as $age){
    //get males
    $males[]=array(
    'nationality'=>$country->name,
    'nationality_id'=>$country->id,
    'age'=>$age->age,
    'males'=>$this->getMales($enrolmentYear,$country->id,$age->age)
    );
    //get females
    $females[]=array(
    'nationality'=>$country->name,
    'nationality_id'=>$country->id,
    'age'=>$age->age,
    'females'=>$this->getFemales($enrolmentYear,$country->id,$age->age)
    );
    //get totals
    $totals[]=array(
    'nationality'=>$country->name,
    'nationality_id'=>$country->id,
    'age'=>$age->age,
    'totals'=>$this->getFemales($enrolmentYear,$country->id,$age->age)+
    $this->getMales($enrolmentYear,$country->id,$age->age)
    );
    }
    //row sum
    $sumTotal[]=array(
    'id'=>$country->id,
    'sum'=>PrimaryEnrolmentNationalityAgeModel::select('females')
    ->where('enrolment_year',$enrolmentYear)
    ->where('nationality',$country->id)
    ->sum('females')+
    PrimaryEnrolmentNationalityAgeModel::select('males')
    ->where('enrolment_year',$enrolmentYear)
    ->where('nationality',$country->id)
    ->sum('males')

    );
    //male row
    $maleRow[]=array(
    'id'=>$country->id,
    'rowMale'=>PrimaryEnrolmentNationalityAgeModel::select('males')
    ->where('nationality',$country->id)
    ->where('enrolment_year',$enrolmentYear)
    ->sum('males')
    );
    //female row
    $femaleRow[]=array(
    'id'=>$country->id,
    'rowFemale'=>PrimaryEnrolmentNationalityAgeModel::select('females')
    ->where('nationality',$country->id)
    ->where('enrolment_year',$enrolmentYear)
    ->sum('females')
    );
    }
    //row sum
    $sumRow=PrimaryEnrolmentNationalityAgeModel::select('females')
    ->where('enrolment_year',$enrolmentYear)
    ->sum('females')+
    PrimaryEnrolmentNationalityAgeModel::select('males')
    ->where('enrolment_year',$enrolmentYear)
    ->sum('males');
    //grand total
    foreach($ages as $age){
    $grandSum[]=array(
    'age'=>$age->age,
    'sum'=>PrimaryEnrolmentNationalityAgeModel::select('females')
    ->where('age',$age->age)
    ->where('enrolment_year',$enrolmentYear)
    ->sum('females')+
    PrimaryEnrolmentNationalityAgeModel::select('males')
    ->where('age',$age->age)
    ->where('enrolment_year',$enrolmentYear)
    ->sum('males'));
    }


    foreach($ages as $agedd);
if($agef!=''){
    $selectAge=$agedd->age;
}else{
    $selectAge='';
}
    foreach($nationality as $nation){
    $chart[]=array(
    'name'=>$nation->name,
    'data'=>$this->getChartNationalityAgeFilter($selectAge,$nation->id,$enrolmentYear)
    );
    }

    return (['tableChart'=>$chart,'tableHeader'=>$header,'tableNationality'=>$nationality,'tableAges'=>$this->getAges(),'tableMales'=>$males,'tableFemales'=>$females,'tableTotal'=>$totals,'sumRow'=>$sumRow,'maleRow'=>$maleRow,'femaleRow'=>$femaleRow,'tableGrandSum'=>$grandSum,'sumTotal'=>$sumTotal,'tableEnrolment_year'=>$enrolmentYear,'years'=>$this->getEnrolmentYear(),'noResults'=>$numRows]);
    }else{
    return['noResults'=>$numRows];
    }


}


/**
 * Store a newly created resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
//
}

/**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
//
}

/**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
//
}

/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
//
}
}
