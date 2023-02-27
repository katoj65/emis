<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PrimaryEnrolmentAgeModel;
use Illuminate\Support\Facades\Validator;

class SearchPrimaryEnrolmentAge extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $searchClass = $request->input('class');

        $years5 = 'years5less';
        $years6 = 'years6';
        $years7 = 'years7';
        $years8 = 'years8';
        $years9 = 'years9';
        $years10 = 'years10';
        $years11 = 'years11';
        $years12 = 'years12';
        $years13 = 'years13more';


        $class = PrimaryEnrolmentAgeModel::where('class', 'Like', '%' . $searchClass . '%')->select('class')->distinct()->orderBy('id', 'ASC')->get();

        foreach ($class as $item) {
            $data[] = array('class' => $item->class,
                'record' => PrimaryEnrolmentAgeModel::where('class', $item->class)->orderBy('id', 'ASC')->get());
        }


//total
        $total = PrimaryEnrolmentAgeModel::
        select('class', $years5, $years6, $years7, $years8, $years9, $years10, $years11, $years12, $years13)
            ->where('gender', 'Total')->orderBy('id', 'ASC')
            ->get();


//sum males
        $male = PrimaryEnrolmentAgeModel::select('class', $years5, $years6, $years7, $years8, $years9, $years10, $years11, $years12, $years13)->where('gender', '=', 'Male')->orderBy('id', 'ASC')->get();
        $collect1 = collect($male);
        $males = array('years5' => $collect1->sum($years5),
            'years6' => $collect1->sum($years6),
            'years7' => $collect1->sum($years7),
            'years8' => $collect1->sum($years8),
            'years9' => $collect1->sum($years9),
            'years10' => $collect1->sum($years10),
            'years11' => $collect1->sum($years11),
            'years12' => $collect1->sum($years12),
            'years13' => $collect1->sum($years13),
            'bottomTotal' => $collect1->sum($years5) +
                $collect1->sum($years6) +
                $collect1->sum($years7) +
                $collect1->sum($years8) +
                $collect1->sum($years9) +
                $collect1->sum($years10) +
                $collect1->sum($years11) +
                $collect1->sum($years12) +
                $collect1->sum($years13)
        );

//females
        $female = PrimaryEnrolmentAgeModel::select('class', $years5, $years6, $years7, $years8, $years9, $years10, $years11, $years12, $years13)->where('gender', '=', 'Female')->orderBy('id', 'ASC')->get();
        $collect2 = collect($female);
        $females = array('years5' => $collect2->sum($years5),
            'years6' => $collect2->sum($years6),
            'years7' => $collect2->sum($years7),
            'years8' => $collect2->sum($years8),
            'years9' => $collect2->sum($years9),
            'years10' => $collect2->sum($years10),
            'years11' => $collect2->sum($years11),
            'years12' => $collect2->sum($years12),
            'years13' => $collect2->sum($years13),
            'bottomTotal' => $collect2->sum($years5) +
                $collect2->sum($years6) +
                $collect2->sum($years7) +
                $collect2->sum($years8) +
                $collect2->sum($years9) +
                $collect2->sum($years10) +
                $collect2->sum($years11) +
                $collect2->sum($years12) +
                $collect2->sum($years13)
        );


//all genders


//females
        $all = PrimaryEnrolmentAgeModel::select('class', $years5, $years6, $years7, $years8, $years9, $years10, $years11, $years12, $years13)->orderBy('id', 'ASC')->get();
        $collect3 = collect($all);
        $sum = array('years5' => $collect3->sum($years5),
            'years6' => $collect3->sum($years6),
            'years7' => $collect3->sum($years7),
            'years8' => $collect3->sum($years8),
            'years9' => $collect3->sum($years9),
            'years10' => $collect3->sum($years10),
            'years11' => $collect3->sum($years11),
            'years12' => $collect3->sum($years12),
            'years13' => $collect3->sum($years13),
            'bottomTotal' => $collect3->sum($years5) +
                $collect3->sum($years6) +
                $collect3->sum($years7) +
                $collect3->sum($years8) +
                $collect3->sum($years9) +
                $collect3->sum($years10) +
                $collect3->sum($years11) +
                $collect3->sum($years12) +
                $collect3->sum($years13)
        );
        $resultcount = count($class);
//return $sum;
        if ($resultcount > 0) {
            return response()->json(['class' => $class, 'data' => $data, 'total' => $total, 'males' => $males, 'females' => $females, 'sum' => $sum, 'noResults' => $resultcount]);
        } else {
            return response()->json(['noResults' => $resultcount]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function classFilter(Request $request)
    {
$filterClass=$request->input('class');
$filterGender=$request->input('gender');
        //only class
        
        if($filterClass!='' ){
//only class with gender
if($filterClass!='' and $filterGender!='' and $filterGender!='allGenders' ){
                $years5='years5less';
                $years6='years6';
                $years7='years7';
                $years8='years8';
                $years9='years9';
                $years10='years10';
                $years11='years11';
                $years12='years12';
                $years13='years13more';
                $class=PrimaryEnrolmentAgeModel::where('gender',$filterGender)->where('class',$filterClass)->get();
                //total
                $total=PrimaryEnrolmentAgeModel::
                select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
                ->where('gender','Total')->orderBy('id','ASC')
                ->get();
            //     //sum males
                $male=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','Male')->orderBy('id','ASC') ->get();
                $collect1=collect($male);
                $males=array('years5'=>$collect1->sum($years5),
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
                
                //females
                $female=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Female')->orderBy('id','ASC')->get();
                $collect2=collect($female);
                $females=array('years5'=>$collect2->sum($years5),
                'years6'=>$collect2->sum($years6),
                'years7'=>$collect2->sum($years7),
                'years8'=>$collect2->sum($years8),
                'years9'=>$collect2->sum($years9),
                'years10'=>$collect2->sum($years10),
                'years11'=>$collect2->sum($years11),
                'years12'=>$collect2->sum($years12),
                'years13'=>$collect2->sum($years13),
                'bottomTotal'=>$collect2->sum($years5)+
                $collect2->sum($years6)+
                $collect2->sum($years7)+
                $collect2->sum($years8)+
                $collect2->sum($years9)+
                $collect2->sum($years10)+
                $collect2->sum($years11)+
                $collect2->sum($years12)+
                $collect2->sum($years13)
            );
                //all gender
                //females
                $all=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->orderBy('id','ASC')->get();
                $collect3=collect($all);
                $sum=array('years5'=>$collect3->sum($years5),
                'years6'=>$collect3->sum($years6),
                'years7'=>$collect3->sum($years7),
                'years8'=>$collect3->sum($years8),
                'years9'=>$collect3->sum($years9),
                'years10'=>$collect3->sum($years10),
                'years11'=>$collect3->sum($years11),
                'years12'=>$collect3->sum($years12),
                'years13'=>$collect3->sum($years13),
                'bottomTotal'=>$collect3->sum($years5)+
                $collect3->sum($years6)+
                $collect3->sum($years7)+
                $collect3->sum($years8)+
                $collect3->sum($years9)+
                $collect3->sum($years10)+
                $collect3->sum($years11)+
                $collect3->sum($years12)+
                $collect3->sum($years13)
                );
                $resultcount=count($class);
                //return $sum;
                if($resultcount>0){
                return response()->json(['class'=>$class,'total'=>$total,'males'=>$males,'females'=>$females,'sum'=>$sum,'noResults'=>$resultcount]);
                }else{
                    return response()->json(['noResults'=>$resultcount]);   
                }    
        }elseif ( $filterClass!='' and $filterGender=='allGenders') {
                $years5='years5less';
                $years6='years6';
                $years7='years7';
                $years8='years8';
                $years9='years9';
                $years10='years10';
                $years11='years11';
                $years12='years12';
                $years13='years13more';
                
                 
                $class=PrimaryEnrolmentAgeModel::where('class',$filterClass)->select('class')->distinct()->orderBy('id','ASC')->get();
                
                foreach($class as $item){
                    $data[]=array('class'=>$item->class,
                    'record'=>PrimaryEnrolmentAgeModel::where('class',$item->class)->orderBy('id','ASC')->get());
                    }
                
                
                //total
                $total=PrimaryEnrolmentAgeModel::
                select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
                ->where('gender','Total')->orderBy('id','ASC')
                ->get();
                
                
                //sum males
                $male=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Male')->orderBy('id','ASC') ->get();
                $collect1=collect($male);
                $males=array('years5'=>$collect1->sum($years5),
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
                
                //females
                $female=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Female')->orderBy('id','ASC')->get();
                $collect2=collect($female);
                $females=array('years5'=>$collect2->sum($years5),
                'years6'=>$collect2->sum($years6),
                'years7'=>$collect2->sum($years7),
                'years8'=>$collect2->sum($years8),
                'years9'=>$collect2->sum($years9),
                'years10'=>$collect2->sum($years10),
                'years11'=>$collect2->sum($years11),
                'years12'=>$collect2->sum($years12),
                'years13'=>$collect2->sum($years13),
                'bottomTotal'=>$collect2->sum($years5)+
                $collect2->sum($years6)+
                $collect2->sum($years7)+
                $collect2->sum($years8)+
                $collect2->sum($years9)+
                $collect2->sum($years10)+
                $collect2->sum($years11)+
                $collect2->sum($years12)+
                $collect2->sum($years13)
                );
                
                
                //all genders
                
                
                //females
                $all=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->orderBy('id','ASC')->get();
                $collect3=collect($all);
                $sum=array('years5'=>$collect3->sum($years5),
                'years6'=>$collect3->sum($years6),
                'years7'=>$collect3->sum($years7),
                'years8'=>$collect3->sum($years8),
                'years9'=>$collect3->sum($years9),
                'years10'=>$collect3->sum($years10),
                'years11'=>$collect3->sum($years11),
                'years12'=>$collect3->sum($years12),
                'years13'=>$collect3->sum($years13),
                'bottomTotal'=>$collect3->sum($years5)+
                $collect3->sum($years6)+
                $collect3->sum($years7)+
                $collect3->sum($years8)+
                $collect3->sum($years9)+
                $collect3->sum($years10)+
                $collect3->sum($years11)+
                $collect3->sum($years12)+
                $collect3->sum($years13)
                );
                $resultcount=count($class);
                //return $sum;
                if($resultcount>0){
                return response()->json(['class'=>$class,'data'=>$data,'total'=>$total,'males'=>$males,'females'=>$females,'sum'=>$sum,'noResults'=>$resultcount]);
                }else{
                    return response()->json(['noResults'=>$resultcount]);   
                }
            }
            
            
            else{
    $years5='years5less';
    $years6='years6';
    $years7='years7';
    $years8='years8';
    $years9='years9';
    $years10='years10';
    $years11='years11';
    $years12='years12';
    $years13='years13more';
    
     
    $class=PrimaryEnrolmentAgeModel::where('class',$filterClass)->select('class')->distinct()->orderBy('id','ASC')->get();
    
    foreach($class as $item){
        $data[]=array('class'=>$item->class,
        'record'=>PrimaryEnrolmentAgeModel::where('class',$item->class)->orderBy('id','ASC')->get());
        }
    
    
    //total
    $total=PrimaryEnrolmentAgeModel::
    select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
    ->where('gender','Total')->orderBy('id','ASC')
    ->get();
    
    
    //sum males
    $male=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Male')->orderBy('id','ASC') ->get();
    $collect1=collect($male);
    $males=array('years5'=>$collect1->sum($years5),
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
    
    //females
    $female=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Female')->orderBy('id','ASC')->get();
    $collect2=collect($female);
    $females=array('years5'=>$collect2->sum($years5),
    'years6'=>$collect2->sum($years6),
    'years7'=>$collect2->sum($years7),
    'years8'=>$collect2->sum($years8),
    'years9'=>$collect2->sum($years9),
    'years10'=>$collect2->sum($years10),
    'years11'=>$collect2->sum($years11),
    'years12'=>$collect2->sum($years12),
    'years13'=>$collect2->sum($years13),
    'bottomTotal'=>$collect2->sum($years5)+
    $collect2->sum($years6)+
    $collect2->sum($years7)+
    $collect2->sum($years8)+
    $collect2->sum($years9)+
    $collect2->sum($years10)+
    $collect2->sum($years11)+
    $collect2->sum($years12)+
    $collect2->sum($years13)
    );
    
    
    //all genders
    
    
    //females
    $all=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->orderBy('id','ASC')->get();
    $collect3=collect($all);
    $sum=array('years5'=>$collect3->sum($years5),
    'years6'=>$collect3->sum($years6),
    'years7'=>$collect3->sum($years7),
    'years8'=>$collect3->sum($years8),
    'years9'=>$collect3->sum($years9),
    'years10'=>$collect3->sum($years10),
    'years11'=>$collect3->sum($years11),
    'years12'=>$collect3->sum($years12),
    'years13'=>$collect3->sum($years13),
    'bottomTotal'=>$collect3->sum($years5)+
    $collect3->sum($years6)+
    $collect3->sum($years7)+
    $collect3->sum($years8)+
    $collect3->sum($years9)+
    $collect3->sum($years10)+
    $collect3->sum($years11)+
    $collect3->sum($years12)+
    $collect3->sum($years13)
    );
    $resultcount=count($class);
    //return $sum;
    if($resultcount>0){
    return response()->json(['class'=>$class,'data'=>$data,'total'=>$total,'males'=>$males,'females'=>$females,'sum'=>$sum,'noResults'=>$resultcount]);
    }else{
        return response()->json(['noResults'=>$resultcount]);   
    }

            }
    
}elseif($filterGender!=''){
    $years5='years5less';
    $years6='years6';
    $years7='years7';
    $years8='years8';
    $years9='years9';
    $years10='years10';
    $years11='years11';
    $years12='years12';
    $years13='years13more';
    
     
    $class=PrimaryEnrolmentAgeModel::where('gender',$filterGender)->get();
    

  
    
    
    
    //total
    $total=PrimaryEnrolmentAgeModel::
    select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)
    ->where('gender','Total')->orderBy('id','ASC')
    ->get();
    
    
//     //sum males
    $male=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','Male')->orderBy('id','ASC') ->get();
    $collect1=collect($male);
    $males=array('years5'=>$collect1->sum($years5),
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
    
    //females
    $female=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->where('gender','=','Female')->orderBy('id','ASC')->get();
    $collect2=collect($female);
    $females=array('years5'=>$collect2->sum($years5),
    'years6'=>$collect2->sum($years6),
    'years7'=>$collect2->sum($years7),
    'years8'=>$collect2->sum($years8),
    'years9'=>$collect2->sum($years9),
    'years10'=>$collect2->sum($years10),
    'years11'=>$collect2->sum($years11),
    'years12'=>$collect2->sum($years12),
    'years13'=>$collect2->sum($years13),
    'bottomTotal'=>$collect2->sum($years5)+
    $collect2->sum($years6)+
    $collect2->sum($years7)+
    $collect2->sum($years8)+
    $collect2->sum($years9)+
    $collect2->sum($years10)+
    $collect2->sum($years11)+
    $collect2->sum($years12)+
    $collect2->sum($years13)
    );
    
    
    //all genders
    
    
    //females
    $all=PrimaryEnrolmentAgeModel::select('class',$years5,$years6,$years7,$years8,$years9,$years10,$years11,$years12,$years13)->orderBy('id','ASC')->get();
    $collect3=collect($all);
    $sum=array('years5'=>$collect3->sum($years5),
    'years6'=>$collect3->sum($years6),
    'years7'=>$collect3->sum($years7),
    'years8'=>$collect3->sum($years8),
    'years9'=>$collect3->sum($years9),
    'years10'=>$collect3->sum($years10),
    'years11'=>$collect3->sum($years11),
    'years12'=>$collect3->sum($years12),
    'years13'=>$collect3->sum($years13),
    'bottomTotal'=>$collect3->sum($years5)+
    $collect3->sum($years6)+
    $collect3->sum($years7)+
    $collect3->sum($years8)+
    $collect3->sum($years9)+
    $collect3->sum($years10)+
    $collect3->sum($years11)+
    $collect3->sum($years12)+
    $collect3->sum($years13)
    );
    $resultcount=count($class);
    //return $sum;
    if($resultcount>0){
    return response()->json(['class'=>$class,'total'=>$total,'males'=>$males,'females'=>$females,'sum'=>$sum,'noResults'=>$resultcount]);
    }else{
        return response()->json(['noResults'=>$resultcount]);   
    }    

}
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
