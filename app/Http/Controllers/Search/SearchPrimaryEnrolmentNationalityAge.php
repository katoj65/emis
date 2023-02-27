<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PrimaryEnrolmentNationalityAgeModel;

class SearchPrimaryEnrolmentNationalityAge extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 $searchCountry=$request->input('country');
 
$years5='years5less';
$years6='years6';
$years7='years7';
$years8='years8';
$years9='years9';
$years10='years10';
$years11='years11';
$years12='years12';
$years13='years13more';

//all countries
$country=PrimaryEnrolmentNationalityAgeModel::where('country','Like','%'.$searchCountry.'%')->select('country')->distinct()->orderBy('id','ASC')->get();
//get all rows by country
foreach($country as $nation){
    $data[]=array('country'=>$nation->country,
    'record'=>PrimaryEnrolmentNationalityAgeModel::where('country',$nation->country)->orderBy('id','ASC')->get());
    }

//total
$total=PrimaryEnrolmentNationalityAgeModel::
select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
->where('gender','total')->orderBy('id','ASC')
->get();
//grand total
$grandTotal=PrimaryEnrolmentNationalityAgeModel::select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Total')->orderBy('id','ASC')->get();
//bottom class total
$collect1=collect($grandTotal);
$bottom=array('years5'=>$collect1->sum($years5),
'years6'=>$collect1->sum($years6),
'years7'=>$collect1->sum($years7),
'years8'=>$collect1->sum($years8),
'years9'=>$collect1->sum($years9),
'years10'=>$collect1->sum($years10),
'years11'=>$collect1->sum($years11),
'years12'=>$collect1->sum($years12),
'years13'=>$collect1->sum($years13),
'bottomTotal'=>$collect1->sum($years5)+
$collect1->sum($years6)+
$collect1->sum($years7)+
$collect1->sum($years8)+
$collect1->sum($years9)+
$collect1->sum($years10)+
$collect1->sum($years11)+
$collect1->sum($years12)+
$collect1->sum($years13)
);

//age

for($x=5;$x<=13;$x++){

if($x==5){
    $age[]='<=5 years';
}elseif($x==13){
    $age[]='>=13 years';
}else{
    $age[]=$x.' Years';
}
}
$resultcount=count($country);
if($resultcount>0){
//return $age;
return response()->json(['country'=>$country,'data'=>$data,'total'=>$total,'grandTotal'=>$bottom,'age'=>$age,'noResults'=>$resultcount]);
}else{
    return response()->json(['noResults'=>$resultcount]); 
}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterNationalityAge(Request $request)
    {
$filterCountry=$request->input('country');
$filterGender=$request->input('gender');
if($filterCountry!=''and $filterGender=='' or $filterGender=='allgender' and $filterCountry!='' ){
$years5='years5less';
$years6='years6';
$years7='years7';
$years8='years8';
$years9='years9';
$years10='years10';
$years11='years11';
$years12='years12';
$years13='years13more';
//all countries
$country=PrimaryEnrolmentNationalityAgeModel::where('country',$filterCountry)->select('country')->distinct()->orderBy('id','ASC')->get();
//get all rows by country
foreach($country as $nation){
    $data[]=array('country'=>$nation->country,
    'record'=>PrimaryEnrolmentNationalityAgeModel::where('country',$nation->country)->orderBy('id','ASC')->get());
    }

//total
$total=PrimaryEnrolmentNationalityAgeModel::
select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
->where('gender','total')->orderBy('id','ASC')
->get();
//grand total
$grandTotal=PrimaryEnrolmentNationalityAgeModel::select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Total')->orderBy('id','ASC')->get();
//bottom class total
$collect1=collect($grandTotal);
$bottom=array('years5'=>$collect1->sum($years5),
'years6'=>$collect1->sum($years6),
'years7'=>$collect1->sum($years7),
'years8'=>$collect1->sum($years8),
'years9'=>$collect1->sum($years9),
'years10'=>$collect1->sum($years10),
'years11'=>$collect1->sum($years11),
'years12'=>$collect1->sum($years12),
'years13'=>$collect1->sum($years13),
'bottomTotal'=>$collect1->sum($years5)+
$collect1->sum($years6)+
$collect1->sum($years7)+
$collect1->sum($years8)+
$collect1->sum($years9)+
$collect1->sum($years10)+
$collect1->sum($years11)+
$collect1->sum($years12)+
$collect1->sum($years13)
);

//age

for($x=5;$x<=13;$x++){

if($x==5){
    $age[]='<=5 years';
}elseif($x==13){
    $age[]='>=13 years';
}else{
    $age[]=$x.' Years';
}
}
$resultcount=count($country);
if($resultcount>0){
//return $age;
return response()->json(['country'=>$country,'data'=>$data,'total'=>$total,'grandTotal'=>$bottom,'age'=>$age,'noResults'=>$resultcount]);
}else{
    return response()->json(['noResults'=>$resultcount]); 
}}else{
    //only Gender with Country
    if($filterCountry!='' and $filterGender!=''){


        $years5='years5less';
        $years6='years6';
        $years7='years7';
        $years8='years8';
        $years9='years9';
        $years10='years10';
        $years11='years11';
        $years12='years12';
        $years13='years13more';
        //all countries
        $country=PrimaryEnrolmentNationalityAgeModel::where('gender',$filterGender)->where('country',$filterCountry)->orderBy('id','ASC')->get();
        //get all rows by country
        
        
        //total
        $total=PrimaryEnrolmentNationalityAgeModel::
        select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
        ->where('gender','total')->orderBy('id','ASC')
        ->get();
        //grand total
        $grandTotal=PrimaryEnrolmentNationalityAgeModel::select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Total')->orderBy('id','ASC')->get();
        //bottom class total
        $collect1=collect($grandTotal);
        $bottom=array('years5'=>$collect1->sum($years5),
        'years6'=>$collect1->sum($years6),
        'years7'=>$collect1->sum($years7),
        'years8'=>$collect1->sum($years8),
        'years9'=>$collect1->sum($years9),
        'years10'=>$collect1->sum($years10),
        'years11'=>$collect1->sum($years11),
        'years12'=>$collect1->sum($years12),
        'years13'=>$collect1->sum($years13),
        'bottomTotal'=>$collect1->sum($years5)+
        $collect1->sum($years6)+
        $collect1->sum($years7)+
        $collect1->sum($years8)+
        $collect1->sum($years9)+
        $collect1->sum($years10)+
        $collect1->sum($years11)+
        $collect1->sum($years12)+
        $collect1->sum($years13)
        );
        
        //age
        
        for($x=5;$x<=13;$x++){
        
        if($x==5){
            $age[]='<=5 years';
        }elseif($x==13){
            $age[]='>=13 years';
        }else{
            $age[]=$x.' Years';
        }
        }
        $resultcount=count($country);
        if($resultcount>0){
        //return $age;
        return response()->json(['country'=>$country,'total'=>$total,'grandTotal'=>$bottom,'age'=>$age,'noResults'=>$resultcount]);
        }else{
            return response()->json(['noResults'=>$resultcount]);
        
        
        }

}else{
//only Gender
$years5='years5less';
$years6='years6';
$years7='years7';
$years8='years8';
$years9='years9';
$years10='years10';
$years11='years11';
$years12='years12';
$years13='years13more';
//all countries
$country=PrimaryEnrolmentNationalityAgeModel::where('gender',$filterGender)->orderBy('id','ASC')->get();
//get all rows by country


//total
$total=PrimaryEnrolmentNationalityAgeModel::
select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
->where('gender','total')->orderBy('id','ASC')
->get();
//grand total
$grandTotal=PrimaryEnrolmentNationalityAgeModel::select('country',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Total')->orderBy('id','ASC')->get();
//bottom class total
$collect1=collect($grandTotal);
$bottom=array('years5'=>$collect1->sum($years5),
'years6'=>$collect1->sum($years6),
'years7'=>$collect1->sum($years7),
'years8'=>$collect1->sum($years8),
'years9'=>$collect1->sum($years9),
'years10'=>$collect1->sum($years10),
'years11'=>$collect1->sum($years11),
'years12'=>$collect1->sum($years12),
'years13'=>$collect1->sum($years13),
'bottomTotal'=>$collect1->sum($years5)+
$collect1->sum($years6)+
$collect1->sum($years7)+
$collect1->sum($years8)+
$collect1->sum($years9)+
$collect1->sum($years10)+
$collect1->sum($years11)+
$collect1->sum($years12)+
$collect1->sum($years13)
);

//age

for($x=5;$x<=13;$x++){

if($x==5){
    $age[]='<=5 years';
}elseif($x==13){
    $age[]='>=13 years';
}else{
    $age[]=$x.' Years';
}
}
$resultcount=count($country);
if($resultcount>0){
//return $age;
return response()->json(['country'=>$country,'total'=>$total,'grandTotal'=>$bottom,'age'=>$age,'noResults'=>$resultcount]);
}else{
    return response()->json(['noResults'=>$resultcount]);


}
}
}
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
