<?php

namespace App\Http\Controllers;

use App\Models\AdminUnitsDistrictModel;
use Illuminate\Http\Request;
use App\Models\SchoolYearModel as ModelsSchoolYearModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\DistrictModel;
use App\Models\PrimaryTeacherGenderOwnershipModel;
use App\Models\SettingsSchoolsRegistryStatusModel;
use App\Models\SettingsFoundingBodyModel;
use App\Models\PrimarySchoolLicensedModel;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Foreach_;

class AdminUnitsApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//get region
public function region(Request $request){
$item=$request->item;
$get=AdminUnitsRegionModel::select('id','name')->where('id',$item)->get();
return $get;
}


//get district
public function district(Request $request){
    $item=$request->item;
    $get=AdminUnitsDistrictModel::select('id','name')->where('id',$item)->get();
    return $get;
    }






//region by district
public function regionByDistrict(Request $request){
$item=$request->item;
$get=AdminUnitsDistrictModel::select('id','name','region_id')->where('id',$item)->get();
if(count($get)>0){
foreach($get as $i);
$regionID=$i->region_id;
$get1=AdminUnitsRegionModel::select('id','name')->where('id',$regionID)->get();
if(count($get1)>0){
foreach($get1 as $reg);
$regname=$reg->name;

return['select_region'=>$regname];
}
}else{
return(0);
}
}





//district by region
public function districtByRegion(Request $request){
    $item=$request->item;
    $get=AdminUnitsDistrictModel::select('id','name','region_id')->where('region_id',$item)->get();
return ['all_district'=>$get];
    }














}
