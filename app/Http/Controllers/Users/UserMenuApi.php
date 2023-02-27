<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UsersTabMenuModel;

class UserMenuApi extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{


$count=UsersTabMenuModel::count();
if($count>5){
$tab=UsersTabMenuModel::where('user_id',3)->orderBy('created_at','ASC')->limit(5)->get();
}elseif($count<=5){
$tab=UsersTabMenuModel::where('user_id',3)->orderBy('created_at','ASC')->get();
}
$allTabs=$tab=UsersTabMenuModel::where('user_id',3)->orderBy('created_at','ASC')->get();

//return $count;
return response()->json(['tabContent'=>$tab,'count'=>$count,'allTabs'=>$allTabs]);

}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{

//$insert=[];
//UsersTabMenuModel::insert();
$id=$request->user_id;
$name=$request->tab_name;
$path=$request->path;
$mainPath=$request->mainPath;
$numRows=UsersTabMenuModel::where('user_id',$id)->count();
if($numRows < 5){
$check=UsersTabMenuModel::where('user_id',$id)
->where('tab_name',$name)
->where('tab_route',$path)
->where('main_route',$mainPath)
->get();
if(count($check)==0){
$insert=['user_id'=>$id,'tab_name'=>$name,'tab_route'=>$path,'main_route'=>$mainPath];
UsersTabMenuModel::insert($insert);
$status='success';
}else{
$status='failure';
}


$count=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->count();
$tab=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->limit(5)->orderBy('id','DESC')->get();
$allTabs=UsersTabMenuModel::where('user_id',$id)->orderBy('id','DESC')->get();
return response()->json(['tabContent'=>$tab,'count'=>$count,'allTabs'=>$allTabs]);
}else{

 $idme=UsersTabMenuModel::where('user_id',$id)->orderBy('id','DESC')->get();
 $checkname=UsersTabMenuModel::where('user_id',$id)->where('tab_name',$name)->orderBy('id','ASC')->count();

foreach($idme as $getid );
if($checkname==1){

    $check=UsersTabMenuModel::where('user_id',$id)
    ->where('tab_name',$name)
    ->where('tab_route',$path)
    ->where('main_route',$mainPath)
    ->get();
    if(count($check)==0){
    $insert=['user_id'=>$id,'tab_name'=>$name,'tab_route'=>$path,'main_route'=>$mainPath];
    $status='success';
    }else{
    $status='failure';
    }


    $count=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->count();
    $tab=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->limit(5)->orderBy('id','DESC')->get();
    $allTabs=UsersTabMenuModel::where('user_id',$id)->orderBy('id','DESC')->get();
    return response()->json(['tabContent'=>$tab,'count'=>$count,'allTabs'=>$allTabs]);
}else{
UsersTabMenuModel::where('id',$getid->id)->where('user_id',$id)->delete();
$check=UsersTabMenuModel::where('user_id',$id)
->where('tab_name',$name)
->where('tab_route',$path)
->where('main_route',$mainPath)
->get();
if(count($check)==0){
$insert=['user_id'=>$id,'tab_name'=>$name,'tab_route'=>$path,'main_route'=>$mainPath];
UsersTabMenuModel::insert($insert);
$status='success';
}else{
$status='failure';
}


$count=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->count();
$tab=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->limit(5)->orderBy('id','DESC')->get();
$allTabs=UsersTabMenuModel::where('user_id',$id)->orderBy('id','DESC')->get();
return response()->json(['tabContent'=>$tab,'count'=>$count,'allTabs'=>$allTabs]);
}}
}






/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show(Request $request)
{

$user_id=$request->user_id;
$mainRoute=$request->mainRoute;
$count=UsersTabMenuModel::where('user_id',$user_id)->where('main_route',$mainRoute)->count();
$tab=UsersTabMenuModel::where('user_id',$user_id)->where('main_route',$mainRoute)->limit(5)->orderBy('created_at','DESC')->get();
$allTabs=UsersTabMenuModel::where('user_id',$user_id)->where('main_route',$mainRoute)->orderBy('created_at','ASC')->get();
return response()->json(['tabContent'=>$tab,'count'=>$count,'allTabs'=>$allTabs]);



}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function delete(Request $request)
{
//delete tab menu from the list of tabs.
$user_id=$request->user_id;
$main_route=$request->mainRoute;
$tab=$request->tab_route;
$delete=UsersTabMenuModel::where('user_id',$user_id)
->where('tab_route',$tab)->where('main_route',$main_route)
->delete();
if($delete){
$status=true;
}else{
$status=false;
}



$count=UsersTabMenuModel::where('user_id',$user_id)->where('main_route',$main_route)->count();
$tab_data=UsersTabMenuModel::where('user_id',$user_id)->where('main_route',$main_route)->limit(5)->orderBy('created_at','DESC')->get();
$allTabs=UsersTabMenuModel::where('user_id',$user_id)->orderBy('created_at','DESC')->get();
return response()->json(['tabContent'=>$tab_data,'count'=>$count,'allTabs'=>$allTabs]);


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







//function to return user tab
function getUserTab($id,$mainPath){
    $count=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->count();
    $tab=UsersTabMenuModel::where('user_id',$id)->where('main_route',$mainPath)->limit(5)->orderBy('created_at','ASC')->get();
    $allTabs=UsersTabMenuModel::where('user_id',$id)->orderBy('created_at','ASC')->get();
    return response()->json(['tabContent'=>$tab,'count'=>$count,'allTabs'=>$allTabs]);
}









//get menu items
public function getMenuItem(Request $request){
$class=$request->className;
$userID=$request->id;
$get=UsersTabMenuModel::where('user_id',$userID)
->where('main_route','/'.$class.'/')
->orderBy('created_at','ASC')
->get();
$response=UsersTabMenuModel::where('user_id',$userID)
->where('main_route','/'.$class.'/')->limit(5)->orderBy('created_at','ASC')->get();

return ['tabContent'=>$response,'count'=>count($get),'allTabs'=>$get];
}




//clear updates

public function clearMenuApi(Request $request){
$user=$request->user_id;
UsersTabMenuModel::where('user_id',$user)
->delete();
return(['response']);

}
























}
