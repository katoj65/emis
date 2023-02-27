<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryEnrolmentDistrictModel;

class SearchPrimaryEnrolmentDistrict extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchRegion = $request->input('region');


//classes
        $primary1 = 'primary1';
        $primary2 = 'primary2';
        $primary3 = 'primary3';
        $primary4 = 'primary4';
        $primary5 = 'primary5';
        $primary6 = 'primary6';
        $primary7 = 'primary7';
        $district = 'district';
        $region = 'region';
        $status = 'region_status';

//region
        $regionList = PrimaryEnrolmentDistrictModel::where('region', 'Like', '%' . $searchRegion . '%')->select('region')->distinct()->orderBy('id', 'ASC')->get();
// echo $regionList;
        $districtList = PrimaryEnrolmentDistrictModel::select('district')->distinct()->orderBy('id', 'ASC')->get();


//get all rows by districts
        foreach ($regionList as $area) {
            $data[] = array('region' => $area->region,
                'record' => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->get());
        }


//sum particular region

        foreach ($regionList as $area) {
            $sum[] = array('region' => $area->region,
                $primary1 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary1'),

                $primary2 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary2'),

                $primary3 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary3'),

                $primary4 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary4'),

                $primary5 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary5'),

                $primary6 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary6'),

                $primary7 => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary7'),

                //generate total of all classes
                'total' => PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary1') +
                    PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary2') +
                    PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary3') +
                    PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary4') +
                    PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary5') +
                    PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary6') +
                    PrimaryEnrolmentDistrictModel::where('region', $area->region)->orderBy('id', 'ASC')->sum('primary7')
            );
        }


//grand total
        $grandTotal = PrimaryEnrolmentDistrictModel::select('region', $primary1, $primary2, $primary3, $primary4, $primary5, $primary6, $primary7)->orderBy('id', 'ASC')->get();

//bottom uganda total
        $collect1 = collect($grandTotal);
        $bottom = array('primary1' => $collect1->sum($primary1),
            'primary2' => $collect1->sum($primary2),
            'primary3' => $collect1->sum($primary3),
            'primary4' => $collect1->sum($primary4),
            'primary5' => $collect1->sum($primary5),
            'primary6' => $collect1->sum($primary6),
            'primary7' => $collect1->sum($primary7),
            'bottomTotal' => $collect1->sum($primary1) +
                $collect1->sum($primary2) +
                $collect1->sum($primary3) +
                $collect1->sum($primary4) +
                $collect1->sum($primary5) +
                $collect1->sum($primary6) +
                $collect1->sum($primary7));


//return $bottom;

        $resultcount = count($regionList);
//return $sum;
        if ($resultcount > 0) {
            return response()->json(['region' => $regionList, 'data' => $data, 'sum' => $sum, 'grand' => $bottom, 'district' => $districtList, 'noResults' => $resultcount]);
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
    public function filterRegion(Request $request)
    {

$filterRegion=$request->input('region');

$filterDistrict=$request->input('district');

if($filterRegion!='' and $filterDistrict==''){

    $primary1='primary1';
    $primary2='primary2';
    $primary3='primary3';
    $primary4='primary4';
    $primary5='primary5';
    $primary6='primary6';
    $primary7='primary7';
    $district='district';
    $region='region';
    $status='region_status';

    //region
    $regionList=PrimaryEnrolmentDistrictModel::where('region',$filterRegion)->select('region')->distinct()->orderBy('id','ASC')->get();


    $districtList=PrimaryEnrolmentDistrictModel::select('district')->where('region',$filterRegion)->distinct()->orderBy('id','ASC')->get();


    //get all rows by districts
    foreach($regionList as $area){
        $data[]=array('region'=>$area->region,
        'record'=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->get());
        }



    //sum particular region

    foreach($regionList as $area){
        $sum[]=array('region'=>$area->region,
        $primary1=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary1'),

        $primary2=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary2'),

        $primary3=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary3'),

        $primary4=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary4'),

        $primary5=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary5'),

        $primary6=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary6'),

        $primary7=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary7'),

        //generate total of all classes
        'total'=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary1')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary2')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary3')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary4')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary5')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary6')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary7')
        );
        }


    //grand total
    $grandTotal=PrimaryEnrolmentDistrictModel::select('region',$primary1,$primary2,$primary3,$primary4,$primary5,$primary6,$primary7)->orderBy('id','ASC')->get();

    //bottom uganda total
    $collect1=collect($grandTotal);
    $bottom=array('primary1'=>$collect1->sum($primary1),
    'primary2'=>$collect1->sum($primary2),
    'primary3'=>$collect1->sum($primary3),
    'primary4'=>$collect1->sum($primary4),
    'primary5'=>$collect1->sum($primary5),
    'primary6'=>$collect1->sum($primary6),
    'primary7'=>$collect1->sum($primary7),
    'bottomTotal'=>$collect1->sum($primary1)+
    $collect1->sum($primary2)+
    $collect1->sum($primary3)+
    $collect1->sum($primary4)+
    $collect1->sum($primary5)+
    $collect1->sum($primary6)+
    $collect1->sum($primary7));


    //return $bottom;
    return response()->json(['region'=>$regionList,'data'=>$data,'sum'=>$sum,'grand'=>$bottom,'district'=>$districtList]);



    }else{
        //district

if($filterDistrict!=''){
    $primary1='primary1';
    $primary2='primary2';
    $primary3='primary3';
    $primary4='primary4';
    $primary5='primary5';
    $primary6='primary6';
    $primary7='primary7';
    $district='district';
    $region='region';
    $status='region_status';

    //region
    $regionList=PrimaryEnrolmentDistrictModel::where('district',$filterDistrict)->orderBy('id','ASC')->get();
    $districtList=PrimaryEnrolmentDistrictModel::select('district')->distinct()->orderBy('id','ASC')->get();


    //get all rows by districts
    foreach($regionList as $area){
        $data[]=array('region'=>$area->region,
        'record'=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->get());
        }



    //sum particular region

    foreach($regionList as $area){
        $sum[]=array('region'=>$area->region,
        $primary1=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary1'),

        $primary2=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary2'),

        $primary3=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary3'),

        $primary4=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary4'),

        $primary5=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary5'),

        $primary6=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary6'),

        $primary7=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary7'),

        //generate total of all classes
        'total'=>PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary1')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary2')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary3')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary4')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary5')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary6')+
        PrimaryEnrolmentDistrictModel::where('region',$area->region)->orderBy('id','ASC')->sum('primary7')
        );
        }


    //grand total
    $grandTotal=PrimaryEnrolmentDistrictModel::select('region',$primary1,$primary2,$primary3,$primary4,$primary5,$primary6,$primary7)->orderBy('id','ASC')->get();

    //bottom uganda total
    $collect1=collect($grandTotal);
    $bottom=array('primary1'=>$collect1->sum($primary1),
    'primary2'=>$collect1->sum($primary2),
    'primary3'=>$collect1->sum($primary3),
    'primary4'=>$collect1->sum($primary4),
    'primary5'=>$collect1->sum($primary5),
    'primary6'=>$collect1->sum($primary6),
    'primary7'=>$collect1->sum($primary7),
    'bottomTotal'=>$collect1->sum($primary1)+
    $collect1->sum($primary2)+
    $collect1->sum($primary3)+
    $collect1->sum($primary4)+
    $collect1->sum($primary5)+
    $collect1->sum($primary6)+
    $collect1->sum($primary7));


    //return $bottom;
    return response()->json(['region'=>$regionList,'sum'=>$sum,'grand'=>$bottom]);




}
    }

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
