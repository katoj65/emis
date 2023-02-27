<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\DistrictModel;
use App\Models\PrimaryTeacherGenderOwnershipModel;




class PrimaryTeacherGenderOwnershipApi extends Controller
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



//get districts
public function getDistricts($id=''){
    if($id==''){
    $district=DistrictModel::orderBy('name','ASC')->get();
    }else{
    $district=DistrictModel::where('id',$id)->orderBy('name','ASC')->get();
    }
    return $district;
    }








    public function index(){

        $numRows=PrimaryTeacherGenderOwnershipModel::count();
        if($numRows >0 ){
    $years=$this->getSchoolYears();
    foreach($years as $yy){
    $mx[]=$yy->school_year;
    }
    $enrolment_year=max($mx);



    $getDistrict=$this->getDistricts();
    $getRegion=$this->getRegion();
    $options=['government','private'];

    $header=['REGION','GENDER'];
    foreach($options as $item){
    array_push($header,strtoupper($item));
    $bottom_total[]=number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
    ->where('school_year',$enrolment_year)->where('status',$item)->sum('teacher_count'));

    }




    foreach($getRegion as $d){
    foreach($options as $i){
    $males[]=array(
    'id'=>$d->id,
    'name'=>$d->name,
    'year'=>$enrolment_year,
    'status'=>$i,
    'males'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
    ->where('region',$d->id)->where('school_year',$enrolment_year)
    ->where('status',$i)->where('gender','Male')->sum('teacher_count'))

    );



    $females[]=array(
        'id'=>$d->id,
        'name'=>$d->name,
        'year'=>$enrolment_year,
        'status'=>$i,
        'females'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
        ->where('region',$d->id)->where('school_year',$enrolment_year)
        ->where('status',$i)->where('gender','Female')->sum('teacher_count'))

        );




        $totals[]=array(
            'id'=>$d->id,
            'name'=>$d->name,
            'year'=>$enrolment_year,
            'status'=>$i,
            'totals'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
            ->where('region',$d->id)->where('school_year',$enrolment_year)
            ->where('status',$i)->sum('teacher_count')
            )

            );






    }


    }


    return ['bottom_total'=>$bottom_total,'totals'=>$totals,'females'=>$females,'males'=>$males,'header'=>$header,'district'=>$getDistrict,'region'=>$getRegion,'selectOption'=>$options,'numRows'=>$numRows,'tableYears'=>$years,'school_year'=>$enrolment_year];
     }else{

        return ['numRows'=>$numRows];
     }

    }



public function filterOwnership(Request $request){

   $region= $request->input('id');
   $yearfilter= $request->input('year');
   $status=$request->input('selectedStatus');

    $numRows=PrimaryTeacherGenderOwnershipModel::count();
    if($numRows >0 ){
$years=$this->getSchoolYears($yearfilter);
foreach($years as $yy){
$mx[]=$yy->school_year;
}
$enrolment_year=max($mx);



$getDistrict=$this->getDistricts();
$getRegion=$this->getRegion($region);
if($status=='government'){
    $options=['government'];
}elseif($status=='private'){
    $options=['private'];
}else {
    $options=['government','private'];
}


$header=['REGION','GENDER'];
if($region!=''){
    foreach($options as $item){
        array_push($header,strtoupper($item));
        $bottom_total[]=number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
        ->where('school_year',$enrolment_year)
        ->where('region',$region)
        ->where('status',$item)->sum('teacher_count'));

        }


}else{


    foreach($options as $item){
        array_push($header,strtoupper($item));
        $bottom_total[]=number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
        ->where('school_year',$enrolment_year)->where('status',$item)->sum('teacher_count'));

        }
}





foreach($getRegion as $d){
foreach($options as $i){
$males[]=array(
'id'=>$d->id,
'name'=>$d->name,
'year'=>$enrolment_year,
'status'=>$i,
'males'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
->where('region',$d->id)->where('school_year',$enrolment_year)
->where('status',$i)->where('gender','Male')->sum('teacher_count'))

);



$females[]=array(
    'id'=>$d->id,
    'name'=>$d->name,
    'year'=>$enrolment_year,
    'status'=>$i,
    'females'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
    ->where('region',$d->id)->where('school_year',$enrolment_year)
    ->where('status',$i)->where('gender','Female')->sum('teacher_count'))

    );




    $totals[]=array(
        'id'=>$d->id,
        'name'=>$d->name,
        'year'=>$enrolment_year,
        'status'=>$i,
        'totals'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
        ->where('region',$d->id)->where('school_year',$enrolment_year)
        ->where('status',$i)->sum('teacher_count')
        )

        );






}


}


return ['bottom_total'=>$bottom_total,'totals'=>$totals,'females'=>$females,'males'=>$males,'header'=>$header,'district'=>$getDistrict,'region'=>$getRegion,'selectOption'=>$options,'numRows'=>$numRows,'tableYears'=>$years];
 }else{

    return ['numRows'=>$numRows];
 }

}








//advanced filter

public function advancedFilter(Request $request){
    //selectable
    $fromYear=$request->input('fromYear');
    $toYear= $request->input('endYear');
    $selectStatus= $request->input('selectStatus');
    if($fromYear < $toYear){
        $startYear=$fromYear;
        $endYear= $toYear;

    }else{
        $startYear=$toYear;
        $endYear=$fromYear;

    }

    $selectOption=$selectStatus;
    $getDistrict=$this->getDistricts();
    $getRegion=$this->getRegion();
    $getYear=ModelsSchoolYearModel::select('school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();

    $header=['REGION','GENDER'];
    foreach($getYear as $y){
    $enrolment_year[]=$y->school_year;
    array_push($header,$y->school_year.' - '.strtoupper($selectOption));
    $bottom_total[]=number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
    ->where('school_year',$y->school_year)->where('status',$selectOption)->sum('teacher_count'));
    }








    foreach($getRegion as $d){
        foreach($enrolment_year as $i){
        $males[]=array(
        'id'=>$d->id,
        'name'=>$d->name,
        'year'=>$i,
        'status'=>$selectOption,
        'males'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
        ->where('region',$d->id)->where('school_year',$i)
        ->where('status',$selectOption)->where('gender','Male')->sum('teacher_count'))

        );


        $females[]=array(
            'id'=>$d->id,
            'name'=>$d->name,
            'year'=>$i,
            'status'=>$selectOption,
            'females'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
            ->where('region',$d->id)->where('school_year',$i)
            ->where('status',$selectOption)->where('gender','Female')->sum('teacher_count'))

            );




            $totals[]=array(
                'id'=>$d->id,
                'name'=>$d->name,
                'year'=>$i,
                'status'=>$selectOption,
                'totals'=>number_format(PrimaryTeacherGenderOwnershipModel::select('teacher_count')
                ->where('region',$d->id)->where('school_year',$i)
                ->where('status',$selectOption)->sum('teacher_count'))

                );



    }
        }


    return ['bottom_total'=>$bottom_total,'totals'=>$totals,'females'=>$females,'males'=>$males,'header'=>$header,'selected_year'=>$enrolment_year,'region'=>$getRegion];

    }
























}
