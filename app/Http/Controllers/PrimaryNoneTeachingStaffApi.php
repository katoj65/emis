<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsSchoolStatusModel;
use App\Models\PrimaryNoneTeachingStaffModel;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\NoneTeachingStaffTypeModel;


class PrimaryNoneTeachingStaffApi extends Controller
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




//school status
public function getSchoolStatus($id=''){
    if($id!=''){
    $get=SettingsSchoolStatusModel::select('id','status')->where('id',$id)->orderBy('status','ASC')->get();
    }else{
        $get=SettingsSchoolStatusModel::select('id','status')->where('id',1)->orWhere('id',2)->orderBy('status','ASC')->get();
    }

    return $get;
    }




// none teaching staff role
public function getNonTeachingStaffRole($id=''){
if($id!=''){
$get=NoneTeachingStaffTypeModel::select('intNonTeachingStaffTypeId as id','txtNonTeachingStaffType as type')->where('intNonTeachingStaffTypeId',$id)->get();
}else{
    $get=NoneTeachingStaffTypeModel::select('intNonTeachingStaffTypeId as id','txtNonTeachingStaffType as type')->get();

}
return $get;
}









//the Api

    public function index()
    {
        //
$getYears=$this->getSchoolYears();
$getStatus=$this->getSchoolStatus();
$getRole=$this->getNonTeachingStaffRole();
$numRows=PrimaryNoneTeachingStaffModel::count();
if($numRows > 0 ){
foreach($getYears as $y){
$school_year[]=$y->school_year;
}
$year=max($school_year);

$header=['NON - TEACHING STAFF','GENDER'];
foreach($getStatus as $s){
array_push($header,strtoupper($s->status));
$bottom_total[]=number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('year',$year)->sum('males')+
PrimaryNoneTeachingStaffModel::select('females')->where('status',$s->id)->where('year',$year)->sum('females')


);
}


foreach($getRole as $r){
foreach($getStatus as $s){

$body[]=array(
'id'=>$r->id,
'type'=>$r->type,
'status'=>$s->id,
'males'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('males')),
'females'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('females')),
'totals'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('males')+
 PrimaryNoneTeachingStaffModel::select('females')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('females')

),

);


}

}

return ['role'=>$getRole,'status'=>$getStatus,'enrolment_year'=>$year,'selectYears'=>$school_year,'header'=>$header,'bottom_total'=>$bottom_total,'body'=>$body,'numRows'=>$numRows];
}else{


    return ['numRows'=>$numRows];

}
}











public function filternoneTeaching(Request $request)
{

    $yearf= $request->input('year');
   $role= $request->input('role');
   $owner= $request->input('owner');
   $gender= $request->input('gender');
    //
$getYears=$this->getSchoolYears($yearf);
$getStatus=$this->getSchoolStatus($owner);
$getRole=$this->getNonTeachingStaffRole($role);
foreach($getYears as $y){
$school_year[]=$y->school_year;
}
$year=max($school_year);

$header=['NON - TEACHING STAFF','GENDER'];


if($role!=''){
    foreach($getStatus as $s){
        array_push($header,strtoupper($s->status));
        $bottom_total[]=number_format( PrimaryNoneTeachingStaffModel::select('males')
        ->where('role',$role)
        ->where('status',$s->id)->where('year',$year)->sum('males')+
        PrimaryNoneTeachingStaffModel::select('females')->where('status',$s->id)
        ->where('role',$role)
        ->where('year',$year)->sum('females')


        );
        }



}else{
foreach($getStatus as $s){
array_push($header,strtoupper($s->status));
$bottom_total[]=number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('year',$year)->sum('males')+
PrimaryNoneTeachingStaffModel::select('females')->where('status',$s->id)->where('year',$year)->sum('females')


);
}
}


foreach($getRole as $r){
foreach($getStatus as $s){

$body[]=array(
'id'=>$r->id,
'type'=>$r->type,
'status'=>$s->id,
'males'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('males')),
'females'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('females')),
'totals'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('males')+
PrimaryNoneTeachingStaffModel::select('females')->where('status',$s->id)->where('role',$r->id)->where('year',$year)->sum('females')

),

);


}

}

return ['role'=>$getRole,'status'=>$getStatus,'enrolment_year'=>$year,'selectYears'=>$school_year,'header'=>$header,'bottom_total'=>$bottom_total,'body'=>$body];
}








//advanced filter
    public function advancedFilter(Request $request)
    {

        $startYear=$request->input('fromYear');
        $toYear=$request->input('toYear');
        $select=$request->input('toOwner');
        //selectable
$startYear=$startYear;
$endYear=$toYear;
$getStatus=$this->getSchoolStatus($select);
foreach($getStatus as $s);
$statusName=$s->status;
$statusID=$s->id;
$getRole=$this->getNonTeachingStaffRole();
//header
$header=['TEACHING STAFF','GENDER'];

        $getYears=ModelsSchoolYearModel::select('id','school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($getYears as $y){
$years[]=$y->school_year;
array_push($header,$y->school_year.' - '.strtoupper($statusName));
$bottom_total[]=number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$statusID)->where('year',$y->school_year)->sum('males')+
PrimaryNoneTeachingStaffModel::select('females')->where('status',$statusID)->where('year',$y->school_year)->sum('females')


);
}





foreach($getRole as $r){
    foreach($years as $y){

    $body[]=array(
    'id'=>$r->id,
    'type'=>$r->type,
    'status'=>$s->id,
    'males'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$statusID)->where('role',$r->id)->where('year',$y)->sum('males')),
    'females'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$statusID)->where('role',$r->id)->where('year',$y)->sum('females')),
    'totals'=>number_format( PrimaryNoneTeachingStaffModel::select('males')->where('status',$statusID)->where('role',$r->id)->where('year',$y)->sum('males')+
     PrimaryNoneTeachingStaffModel::select('females')->where('status',$statusID)->where('role',$r->id)->where('year',$y)->sum('females')

    ),

    );


    }

    }







return ['role'=>$getRole,'status'=>$getStatus,'selectYears'=>$years,'header'=>$header,'bottom_total'=>$bottom_total,'body'=>$body];;








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
