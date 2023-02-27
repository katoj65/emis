<?php

namespace App\Http\Controllers;

use App\Models\AdminUnitsDistrictModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\AdminUnitsCountyModel;
use Illuminate\Http\Request;
use App\Models\PrimarySchoolDistributionModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\SettingsSchoolsRegistryStatusModel as SchoolRegisterModel;

class PrimarySchoolDistributionApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


//get enrolment years
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










//chart function
public function chartFormation($status,$year,$region){
foreach($region as $reg){
$response[]=array(
$reg->name,
PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$year)
->where('registration_status',$status)
->where('region',$reg->id)
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

$years=$this->getSchoolYears();
// get years
foreach($years as $yy){
$yr[]=$yy->school_year;
}
$defaultYear=max($yr);





$region=$this->getRegion();
$district=$this->getDistrict();
//school registration header
$header=['Region','District'];
$register=SchoolRegisterModel::select('status')->orderBy('status','DESC')->get();
foreach($register as $reg){
array_push($header,$reg->status);
}





//content
foreach($district as $dl){
$school[]=array(
'district'=>$dl->id,
'registered'=>$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('district',$dl->id)
->where('registration_status','Registered')
->sum('school_total')),

'unregistered'=>$t2=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('district',$dl->id)
->where('registration_status','Not Registered')
->sum('school_total')),

'licensed'=>$t3=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('district',$dl->id)
->where('registration_status','Licensed')
->sum('school_total')),

'unknown'=>$t4=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('district',$dl->id)
->where('registration_status','Dont Know')
->sum('school_total')));

}






//region totals
foreach($region as $dl){
    $regionTotal[]=array(
    'region'=>$dl->id,

    'registered'=>$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('region',$dl->id)
    ->where('registration_status','Registered')
    ->sum('school_total')),

    'unregistered'=>$t2=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('region',$dl->id)
    ->where('registration_status','Not Registered')
    ->sum('school_total')),

    'licensed'=>$t3=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('region',$dl->id)
    ->where('registration_status','Licensed')
    ->sum('school_total')),

    'unknown'=>$t4=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('region',$dl->id)
    ->where('registration_status','Dont Know')
    ->sum('school_total')));

    }







//Uganda total
$uganda=array(
$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('registration_status','Registered')
->sum('school_total')),

$t2=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('registration_status','Not Registered')
->sum('school_total')),

$t3=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('registration_status','Licensed')
->sum('school_total')),

$t4=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('registration_status','Dont Know')
->sum('school_total')));





//total
foreach($region as $g){
$tableTotal[]=array(
'region_id'=>$g->id,
'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
->where('region',$g->id)
->sum('school_total'))
);
}








//chart
    foreach($register as $reg){
    $chart[]=array(
    'name'=>$reg->status,
    'data'=>$this->chartFormation($reg->status,$defaultYear,$region)
    );
    }




//return $chart;
$allYear=ModelsSchoolYearModel::select('school_year')->where('school_year','!=',$defaultYear)->orderBy('school_year','desc')
->whereBetween('school_year',['2006','2011'])->get();

//response
return ['table_region'=>$region,'table_district'=>$district,'table_years'=>$yr,'enrolment_year'=>$defaultYear,'tableHeader'=>$header,'tableSum'=>$tableTotal,'tableSchool'=>$school,'regionTotal'=>$regionTotal,'uganda'=>$uganda,'numRows'=> $numRows,'allYear'=>$allYear,'chartData'=>$chart];
}else{

    return ['numRows'=>$numRows];
}
     }


















 ///filter
public function filterRegion(Request $request){
$id=$request->input('id');
$districtfil=$request->input('district');
$selectedYear=$request->input('enrolment_year');
$status=$request->input('status');
$statuscha=$request->input('status');
$districtfilt=$this->getDistrict($districtfil);
$selectedId='';
$years=$this->getSchoolYears($selectedYear);
if($districtfil!=''){
    foreach($districtfilt as $getDistrict);
    if($getDistrict->region_id==$id){
        $district=$this->getDistrict($districtfil);
        $region=$this->getRegion($getDistrict->region_id);
        $selectedId=$getDistrict->region_id;
    }else{
        if($districtfil!='' and $id==''){
        $district=$this->getDistrict($districtfil);
        $region=$this->getRegion($getDistrict->region_id);
        $selectedId=$getDistrict->region_id;
    }else{
        $region=$this->getRegion($id);
        $district=$this->getDistrict();
        $selectedId=$id;
    }
    }

}else{
$region=$this->getRegion($id);
$selectedId=$id;
$district=$this->getDistrict();
}
foreach($region as $getDistrict);
$getDistrictall=AdminUnitsDistrictModel::where('region_id',$getDistrict->id)->select('id','name')->orderBy('name','ASC')
->get();

foreach($years as $yy){
    $yr[]=$yy->school_year;
    }
    $defaultYear=max($yr);

    //school registration header
    $header=['Region','District'];
    if($status!=''){
        $register=SchoolRegisterModel::select('status')->where('status',$status)->orderBy('status','DESC')->get();
    }else{
    $register=SchoolRegisterModel::select('status')->orderBy('status','DESC')->get();
}
    foreach($register as $reg){
    array_push($header,$reg->status);
    }



    //content
    if($status!=''){


foreach($district as $dl){
$school[]=array(
'district'=>$dl->id,
'registered'=>$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
->where('enrolment_year',$defaultYear)
->where('district',$dl->id)
->where('registration_status',$status)
->sum('school_total')));
}
        }else{
    foreach($district as $dl){
    $school[]=array(
    'district'=>$dl->id,
    'registered'=>$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('district',$dl->id)
    ->where('registration_status','Registered')
    ->sum('school_total')),

    'unregistered'=>$t2=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('district',$dl->id)
    ->where('registration_status','Not Registered')
    ->sum('school_total')),

    'licensed'=>$t3=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('district',$dl->id)
    ->where('registration_status','Licensed')
    ->sum('school_total')),

    'unknown'=>$t4=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('district',$dl->id)
    ->where('registration_status','Dont Know')
    ->sum('school_total')));

    }
}




    //region totals
    if($status!=''){

        foreach($region as $dl){
            $regionTotal[]=array(
            'region'=>$dl->id,

            'registered'=>$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('region',$dl->id)
            ->where('registration_status',$status)
            ->sum('school_total')),
            );

        }
    }else{
    foreach($region as $dl){
        $regionTotal[]=array(
        'region'=>$dl->id,

        'registered'=>$t1=number_format(PrimarySchoolDistributionModel::select('school_total')
        ->where('enrolment_year',$defaultYear)
        ->where('region',$dl->id)
        ->where('registration_status','Registered')
        ->sum('school_total')),

        'unregistered'=>$t2=number_format(PrimarySchoolDistributionModel::select('school_total')
        ->where('enrolment_year',$defaultYear)
        ->where('region',$dl->id)
        ->where('registration_status','Not Registered')
        ->sum('school_total')),

        'licensed'=>$t3=number_format(PrimarySchoolDistributionModel::select('school_total')
        ->where('enrolment_year',$defaultYear)
        ->where('region',$dl->id)
        ->where('registration_status','Licensed')
        ->sum('school_total')),

        'unknown'=>$t4=number_format(PrimarySchoolDistributionModel::select('school_total')
        ->where('enrolment_year',$defaultYear)
        ->where('region',$dl->id)
        ->where('registration_status','Dont Know')
        ->sum('school_total')),

        );

        }
}






    //Uganda total
    if($status!=''){
if($selectedId!=''){

    $uganda=array(
        $t1=number_format(PrimarySchoolDistributionModel::select('school_total')
        ->where('enrolment_year',$defaultYear)
        ->where('registration_status',$status)
        ->where('region',$selectedId)
        ->sum('school_total'))
        );
}else{
        $uganda=array(
            $t1=number_format(PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('registration_status',$status)
            ->sum('school_total'))
            );
        }
    }else{

        if($selectedId!=''){
            $uganda=array(
                $t1=number_format(PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)->where('region',$selectedId)
                ->where('registration_status','Registered')
                ->sum('school_total')),

                $t2=number_format(PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$selectedId)
                ->where('registration_status','Not Registered')
                ->sum('school_total')),

                $t3=number_format(PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$selectedId)
                ->where('registration_status','Licensed')
                ->sum('school_total')),

                $t4=number_format(PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$selectedId)
                ->where('registration_status','Dont Know')
                ->sum('school_total')),

                );


        }else{
    $uganda=array(
    $t1=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('registration_status','Registered')
    ->sum('school_total')),

    $t2=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('registration_status','Not Registered')
    ->sum('school_total')),

    $t3=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('registration_status','Licensed')
    ->sum('school_total')),

    $t4=number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('enrolment_year',$defaultYear)
    ->where('registration_status','Dont Know')
    ->sum('school_total')),

    );
     }
    }

    $allYear=ModelsSchoolYearModel::select('school_year')->orderBy('school_year','desc')
    ->whereBetween('school_year',['2006','2011'])->get();

//chart
foreach($register as $reg){
    $chart[]=array(
    'name'=>$reg->status,
    'data'=>$this->chartFormation($reg->status,$defaultYear,$region)
    );
    }

    //total
    foreach($region as $g){
    $tableTotal[]=array(
    'region_id'=>$g->id,
    'sum'=>number_format(PrimarySchoolDistributionModel::select('school_total')
    ->where('region',$g->id)
    ->sum('school_total'))
    );
    }
    //response
    return ['table_region'=>$region,'table_district'=>$district,'table_years'=>$yr,'enrolment_year'=>$defaultYear,'tableHeader'=>$header,'tableSum'=>$tableTotal,'tableSchool'=>$school,'regionTotal'=>$regionTotal,'uganda'=>$uganda,'allRegionsDis'=>$getDistrictall,'chartData'=>$chart,'allYear'=>$allYear];

         }








         public function searchRegion(Request $request){
            //selectable
            $years=$this->getSchoolYears();
            // get years
            foreach($years as $yy){
            $yr[]=$yy->school_year;
            }
            $defaultYear=max($yr);
            $search=$request->input('region');
            $region=AdminUnitsRegionModel::select('name','id')->where('name','like','%'.$search.'%')->orderBy('name','ASC')->get();
            $numRows=count($region);
            if($numRows>0){

            $district=$this->getDistrict();
            //school registration header
            $header=['Region','District'];
            $register=SchoolRegisterModel::select('status')->orderBy('status','DESC')->get();
            foreach($register as $reg){
            array_push($header,$reg->status);
            }
            array_push($header,'TOTAL');


            //content
            foreach($district as $dl){
            $school[]=array(
            'district'=>$dl->id,
            'registered'=>$t1=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('district',$dl->id)
            ->where('registration_status','Registered')
            ->sum('school_total'),

            'unregistered'=>$t2=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('district',$dl->id)
            ->where('registration_status','Not Registered')
            ->sum('school_total'),

            'licensed'=>$t3=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('district',$dl->id)
            ->where('registration_status','Licensed')
            ->sum('school_total'),

            'unknown'=>$t4=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('district',$dl->id)
            ->where('registration_status','Dont Know')
            ->sum('school_total'),

            'Total'=>$t1+$t2+$t3+$t4);

            }





            //region totals
            foreach($region as $dl){
                $regionTotal[]=array(
                'region'=>$dl->id,

                'registered'=>$t1=PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$dl->id)
                ->where('registration_status','Registered')
                ->sum('school_total'),

                'unregistered'=>$t2=PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$dl->id)
                ->where('registration_status','Not Registered')
                ->sum('school_total'),

                'licensed'=>$t3=PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$dl->id)
                ->where('registration_status','Licensed')
                ->sum('school_total'),

                'unknown'=>$t4=PrimarySchoolDistributionModel::select('school_total')
                ->where('enrolment_year',$defaultYear)
                ->where('region',$dl->id)
                ->where('registration_status','Dont Know')
                ->sum('school_total'),

                'Total'=>$t1+$t2+$t3+$t4);

                }







            //Uganda total
            $uganda=array(
            $t1=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('registration_status','Registered')
            ->sum('school_total'),

            $t2=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('registration_status','Not Registered')
            ->sum('school_total'),

            $t3=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('registration_status','Licensed')
            ->sum('school_total'),

            $t4=PrimarySchoolDistributionModel::select('school_total')
            ->where('enrolment_year',$defaultYear)
            ->where('registration_status','Dont Know')
            ->sum('school_total'),

            $t1+$t2+$t3+$t4);





            //total
            foreach($region as $g){
            $tableTotal[]=array(
            'region_id'=>$g->id,
            'sum'=>PrimarySchoolDistributionModel::select('school_total')
            ->where('region',$g->id)
            ->sum('school_total')
            );
            }











            //response
            return ['table_region'=>$region,'table_district'=>$district,'table_years'=>$yr,'enrolment_year'=>$defaultYear,'tableHeader'=>$header,'tableSum'=>$tableTotal,'tableSchool'=>$school,'regionTotal'=>$regionTotal,'uganda'=>$uganda,'noResults'=>$numRows];
        }else{

        return ['noResults'=>$numRows];
        }
                 }

















    /**å
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
