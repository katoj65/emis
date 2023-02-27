<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryEnrolmentNationalityClassModel;

class SearchPrimaryEnrolmentNationalityClass extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//return males and females for a given field
public function getClassTotalByCountry($country,$class){
$males=PrimaryEnrolmentNationalityClassModel::where('country',$country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum($class);
$females=PrimaryEnrolmentNationalityClassModel::where('country',$country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum($class);
$total=$males+$females;
return $total;
}














    public function index(Request $request)
    {
$search=$request->input('country');
//all countries
$country = PrimaryEnrolmentNationalityClassModel::where('country','Like','%'. $search.'%')->select('country')->distinct()->orderBy('id', 'ASC')->get();

foreach ($country as $nation) {
$data[] = array('country' => $nation->country,
'record' => PrimaryEnrolmentNationalityClassModel::where('country', $nation->country)->orderBy('id', 'ASC')->get(),

'male'=>PrimaryEnrolmentNationalityClassModel::where('country', $nation->country)->where('gender','Male')->orderBy('id', 'ASC')->get(),

'female'=>PrimaryEnrolmentNationalityClassModel::where('country', $nation->country)->where('gender','Female')->orderBy('id', 'ASC')->get());
}

//total
        $total = PrimaryEnrolmentNationalityClassModel::
        select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')
            ->where('gender', 'Total')->orderBy('id', 'ASC')
            ->get();


//grand total
        $grandTotal = PrimaryEnrolmentNationalityClassModel::select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')->orderBy('id', 'ASC')->get();

//bottom class total
        $collect1 = collect($grandTotal);
        $bottom = array('primary1' => $collect1->sum('primary1'),
            'primary2' => $collect1->sum('primary2'),
            'primary3' => $collect1->sum('primary3'),
            'primary4' => $collect1->sum('primary4'),
            'primary5' => $collect1->sum('primary5'),
            'primary6' => $collect1->sum('primary6'),
            'primary7' => $collect1->sum('primary7'),
            'bottomTotal' => $collect1->sum('primary1') +
                $collect1->sum('primary2') +
                $collect1->sum('primary3') +
                $collect1->sum('primary4') +
                $collect1->sum('primary5') +
                $collect1->sum('primary6') +
                $collect1->sum('primary7'));
//right total
//classes
        $primary1 = 'primary1';
        $primary2 = 'primary2';
        $primary3 = 'primary3';
        $primary4 = 'primary4';
        $primary5 = 'primary5';
        $primary6 = 'primary6';
        $primary7 = 'primary7';

//sum of gender by country
//male
        foreach ($country as $sumNation) {
            $male[] = array('country' => $sumNation->country, 'gender' => 'male',

                $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary1'),

                $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2'),

                $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3'),

                $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4'),

                $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5'),

                $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6'),

                $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7'),

//generate total of all classes
                'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary1') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7')
            );
        }
//females
        foreach ($country as $sumNation) {
            $female[] = array('country' => $sumNation->country,
                'gender' => 'female',
                $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary1'),

                $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary2'),

                $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary3'),

                $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary4'),

                $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary5'),

                $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary6'),

                $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary7'),

                //generate total of all classes
                'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary1') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary2') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary3') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary4') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary5') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary6') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary7')
            );
        }
//totals of all genders
        foreach ($country as $sumNation) {
            $all[] = array('country' => $sumNation->country,
                'gender' => 'total',

                $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary1'),

                $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2'),

                $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3'),

                $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4'),

                $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5'),

                $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6'),

                $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7'),

                //generate total of all classes
                'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Total')->orderBy('id', 'ASC')->sum('primary1') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6') +
                    PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7')
            );
        }
//total for each country
foreach ($country as $sumNation) {
$sumTotal[]=array('country'=>$sumNation->country,
$primary1=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary1),
$primary2=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary2),
$primary3=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary3),
$primary4=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary4),
$primary5=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary5),
$primary6=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary6),
$primary7=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary7)

);
}
$resultcount=count($country);
if($resultcount>0){
  return ['data' => $data, 'country' => $country, 'total' => $sumTotal, 'bottomTotal' => $bottom, 'male' => $male, 'female' => $female, 'allGender' => $sumTotal,'noResults'=>$resultcount];
}else{

    return response()->json(['noResults'=>$resultcount]); 
}
//return $bottom;
}

public function filterClassnationality(Request $request)
    {
      

        $filterCountry=$request->input('country');
        $filterGender=$request->input('gender');
        $allCountries=PrimaryEnrolmentNationalityClassModel::select('country')->distinct()->get();  
        if($filterGender=='All Genders' or $filterGender==''){
            $country = PrimaryEnrolmentNationalityClassModel::where('country',$filterCountry)->select('country')->distinct()->orderBy('id', 'ASC')->get();

            foreach ($country as $nation) {
            $data[] = array('country' => $nation->country,
            'record' => PrimaryEnrolmentNationalityClassModel::where('country',$filterCountry)->orderBy('id', 'ASC')->get(),
            
            'male'=>PrimaryEnrolmentNationalityClassModel::where('country', $nation->country)->where('gender','Male')->orderBy('id', 'ASC')->get(),
            
            'female'=>PrimaryEnrolmentNationalityClassModel::where('country', $nation->country)->where('gender','Female')->orderBy('id', 'ASC')->get());
            }
            
            //total
                    $total = PrimaryEnrolmentNationalityClassModel::
                    select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')
                        ->where('gender', 'Total')->orderBy('id', 'ASC')
                        ->get();
            
            
            //grand total
                    $grandTotal = PrimaryEnrolmentNationalityClassModel::select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')->orderBy('id', 'ASC')->get();
            
            //bottom class total
                    $collect1 = collect($grandTotal);
                    $bottom = array('primary1' => $collect1->sum('primary1'),
                        'primary2' => $collect1->sum('primary2'),
                        'primary3' => $collect1->sum('primary3'),
                        'primary4' => $collect1->sum('primary4'),
                        'primary5' => $collect1->sum('primary5'),
                        'primary6' => $collect1->sum('primary6'),
                        'primary7' => $collect1->sum('primary7'),
                        'bottomTotal' => $collect1->sum('primary1') +
                            $collect1->sum('primary2') +
                            $collect1->sum('primary3') +
                            $collect1->sum('primary4') +
                            $collect1->sum('primary5') +
                            $collect1->sum('primary6') +
                            $collect1->sum('primary7'));
            //right total
            //classes
                    $primary1 = 'primary1';
                    $primary2 = 'primary2';
                    $primary3 = 'primary3';
                    $primary4 = 'primary4';
                    $primary5 = 'primary5';
                    $primary6 = 'primary6';
                    $primary7 = 'primary7';
            
            //sum of gender by country
            //male
                    foreach ($country as $sumNation) {
                        $male[] = array('country' => $sumNation->country, 'gender' => 'male',
            
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7'),
            
            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //females
                    foreach ($country as $sumNation) {
                        $female[] = array('country' => $sumNation->country,
                            'gender' => 'female',
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary7'),
            
                            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Female')->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //totals of all genders
                    foreach ($country as $sumNation) {
                        $all[] = array('country' => $sumNation->country,
                            'gender' => 'total',
            
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7'),
            
                            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Total')->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Male')->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //total for each country
            foreach ($country as $sumNation) {
            $sumTotal[]=array('country'=>$sumNation->country,
            $primary1=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary1),
            $primary2=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary2),
            $primary3=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary3),
            $primary4=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary4),
            $primary5=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary5),
            $primary6=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary6),
            $primary7=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary7)
            
            );
            }
            $resultcount=count($country);
            if($resultcount>0){
              return ['data' => $data, 'country' => $country, 'total' => $sumTotal, 'bottomTotal' => $bottom, 'male' => $male, 'female' => $female, 'allGender' => $sumTotal,'noResults'=>$resultcount,'allCountries'=>$allCountries];
            }else{
            
                return response()->json(['noResults'=>$resultcount]); 
            }
            //return $bottom;




        }else{
            if($filterCountry=='' and $filterGender!=''){

$country = PrimaryEnrolmentNationalityClassModel::where('gender',$filterGender)->get();  
        
            //total
                    $total = PrimaryEnrolmentNationalityClassModel::
                    select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')
                        ->where('gender', 'Total')->orderBy('id', 'ASC')
                        ->get();
            
            
            //grand total
                    $grandTotal = PrimaryEnrolmentNationalityClassModel::select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')->orderBy('id', 'ASC')->get();
            
            //bottom class total
                    $collect1 = collect($grandTotal);
                    $bottom = array('primary1' => $collect1->sum('primary1'),
                        'primary2' => $collect1->sum('primary2'),
                        'primary3' => $collect1->sum('primary3'),
                        'primary4' => $collect1->sum('primary4'),
                        'primary5' => $collect1->sum('primary5'),
                        'primary6' => $collect1->sum('primary6'),
                        'primary7' => $collect1->sum('primary7'),
                        'bottomTotal' => $collect1->sum('primary1') +
                            $collect1->sum('primary2') +
                            $collect1->sum('primary3') +
                            $collect1->sum('primary4') +
                            $collect1->sum('primary5') +
                            $collect1->sum('primary6') +
                            $collect1->sum('primary7'));
            //right total
            //classes
                    $primary1 = 'primary1';
                    $primary2 = 'primary2';
                    $primary3 = 'primary3';
                    $primary4 = 'primary4';
                    $primary5 = 'primary5';
                    $primary6 = 'primary6';
                    $primary7 = 'primary7';
            
            //sum of gender by country
            //male
                    foreach ($country as $sumNation) {
                        $male[] = array('country' => $sumNation->country, 'gender' => $filterGender,
            
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7'),
            
            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //females
                    
            //totals of all genders
                    foreach ($country as $sumNation) {
                        $all[] = array('country' => $sumNation->country,
                            'gender' => 'total',
            
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7'),
            
                            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Total')->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //total for each country
            foreach ($country as $sumNation) {
            $sumTotal[]=array('country'=>$sumNation->country,
            $primary1=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary1),
            $primary2=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary2),
            $primary3=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary3),
            $primary4=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary4),
            $primary5=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary5),
            $primary6=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary6),
            $primary7=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary7)
            
            );
            }

            

            $resultcount=count($country);
            if($resultcount>0){
              return ['record' => $country, 'country' => $country, 'total' => $sumTotal, 'bottomTotal' => $bottom, 'allGender' => $sumTotal,'noResults'=>$resultcount,'allCountries'=>$allCountries];
            }else{
            
                return response()->json(['noResults'=>$resultcount]); 
            }
            //return $bottom;
            }elseif($filterCountry!='' and $filterGender!=''){


                $country = PrimaryEnrolmentNationalityClassModel::where('gender',$filterGender)->where('country',$filterCountry)->get();            
            //total
                    $total = PrimaryEnrolmentNationalityClassModel::
                    select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')
                        ->where('gender', 'Total')->orderBy('id', 'ASC')
                        ->get();
            
            
            //grand total
                    $grandTotal = PrimaryEnrolmentNationalityClassModel::select('country', 'primary1', 'primary2', 'primary3', 'primary4', 'primary5', 'primary6', 'primary7')->orderBy('id', 'ASC')->get();
            
            //bottom class total
                    $collect1 = collect($grandTotal);
                    $bottom = array('primary1' => $collect1->sum('primary1'),
                        'primary2' => $collect1->sum('primary2'),
                        'primary3' => $collect1->sum('primary3'),
                        'primary4' => $collect1->sum('primary4'),
                        'primary5' => $collect1->sum('primary5'),
                        'primary6' => $collect1->sum('primary6'),
                        'primary7' => $collect1->sum('primary7'),
                        'bottomTotal' => $collect1->sum('primary1') +
                            $collect1->sum('primary2') +
                            $collect1->sum('primary3') +
                            $collect1->sum('primary4') +
                            $collect1->sum('primary5') +
                            $collect1->sum('primary6') +
                            $collect1->sum('primary7'));
            //right total
            //classes
                    $primary1 = 'primary1';
                    $primary2 = 'primary2';
                    $primary3 = 'primary3';
                    $primary4 = 'primary4';
                    $primary5 = 'primary5';
                    $primary6 = 'primary6';
                    $primary7 = 'primary7';
            
            //sum of gender by country
            //male
                    foreach ($country as $sumNation) {
                        $male[] = array('country' => $sumNation->country, 'gender' => $filterGender,
            
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7'),
            
            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //females
                    
            //totals of all genders
                    foreach ($country as $sumNation) {
                        $all[] = array('country' => $sumNation->country,
                            'gender' => 'total',
            
                            $primary1 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary1'),
            
                            $primary2 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2'),
            
                            $primary3 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3'),
            
                            $primary4 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4'),
            
                            $primary5 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5'),
            
                            $primary6 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6'),
            
                            $primary7 => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7'),
            
                            //generate total of all classes
                            'total' => PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', 'Total')->orderBy('id', 'ASC')->sum('primary1') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary2') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary3') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary4') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary5') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary6') +
                                PrimaryEnrolmentNationalityClassModel::where('country', $sumNation->country)->where('gender', $filterGender)->orderBy('id', 'ASC')->sum('primary7')
                        );
                    }
            //total for each country
            foreach ($country as $sumNation) {
            $sumTotal[]=array('country'=>$sumNation->country,
            $primary1=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary1),
            $primary2=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary2),
            $primary3=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary3),
            $primary4=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary4),
            $primary5=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary5),
            $primary6=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary6),
            $primary7=>SearchPrimaryEnrolmentNationalityClass::getClassTotalByCountry($sumNation->country,$primary7)
            
            );
            }
            $resultcount=count($country);
            if($resultcount>0){
              return ['record' => $country, 'country' => $country, 'total' => $sumTotal, 'bottomTotal' => $bottom, 'allGender' => $sumTotal,'noResults'=>$resultcount,'allCountries'=>$allCountries];
            }else{
                return response()->json(['noResults'=>$resultcount]); 
            }
            //return $bottom;
            }


       
       
       
       
       
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
