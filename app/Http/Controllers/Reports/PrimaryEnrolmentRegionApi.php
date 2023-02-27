<?php

namespace App\Http\Controllers\Reports;

use App\Models\PrimaryEnrolmentRegionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AdminUnits;
use App\Models\SchoolYearModel;
use App\Models\DistrictModel;
use App\Models\RegionModel;

use Illuminate\Support\Facades\DB;


class PrimaryEnrolmentRegionApi extends Controller
{
    use AdminUnits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */














    //get sum for enrolment year
    public function getSumEnrolmentYear()
    {
        $sum = PrimaryEnrolmentRegionModel::select('enrolment_year')
            ->sum('enrolment_year');
        return $sum;
    }


    //get regions
    public function getAllRegions()
    {
        $getYear =$this->getSchoolYears();
        $getRegions = PrimaryEnrolmentRegionModel::select('region')->distinct()->get();
        foreach ($getRegions as $rg) {
            $reg = $rg->region;
            foreach ($getYear as $y) {
                $content[] = array(
                    'region' => $reg, 'year' => $y->school_year,
                    'sum' => PrimaryEnrolmentRegionModel::select('males')->where('region', $reg)->where('enrolment_year', $y->school_year)->sum('males')+PrimaryEnrolmentRegionModel::select('females')->where('region', $reg)->where('enrolment_year', $y->school_year)->sum('females')
                );
            }
        }

        return $content;
    }









    public function selectByYear($year = null)
    {
        if ($year != null) {
            $get =  $this->EnrolmentByRegion($year);
            // $get = $this->Region(null, true);
            // $get = PrimaryEnrolmentRegionModel::where('enrolment_year', $year)->orderBy('id', 'ASC')->get();
        } else {
            $get = PrimaryEnrolmentRegionModel::orderBy('id', 'ASC')->get();
        }
        return $get;
    }


    public function EnrolmentByRegion($first_year = null, $last_year = null, $request=null)
    {
        $values = array();
        $regions = !empty($request) ? $this->Region(null, true, $request) : $this->Region(null, true);

        foreach ($regions as $r) {
            $total_by_region = array();
            foreach ($r->districts as $d) {
                $data['region_id'] = $r->id;

                $data['region'] = $r->name;
                $data['district_id'] = $d->id;
                $data['district'] = $district = $d->name;

                // $data['males'] = 5006;
                // $data['enrolment_year'] = $year;
                $years = $this->GetEnrollmentYears();

                $popn = [];
                //population totals


                foreach ($years as $y) {
                    $year = $y->enrolment_year;
                    $males = PrimaryEnrolmentRegionModel::where(['enrolment_year' => $year, 'district' => $district])->sum('males');
                    // $data['males_' . $year] = $males;


                    array_push($popn, array('item' => (int)$males));
                }

                $data['males'] = $popn;



                array_push($values, $data);
            }
            foreach ($years as $y) {
                $year = $y->enrolment_year;
                $region_total = PrimaryEnrolmentRegionModel::where(['enrolment_year' => $year, 'region' => $r->name])->sum('males');
                array_push($total_by_region, array('total' => ($region_total ?? 0)));
            }
            $data['region_total'] = $total_by_region;
        }


        $header = array('REGION', 'DISTRICT');
        foreach ($years as $y) {
            array_push($header, $y->enrolment_year);
        }
        return array(
            'headers' => $header,
            'values' => $values
        );
    }




    //get by year


    //get year content
    public function yearData($years)
    {
        foreach ($years as $year) {
            $yearContent[] = array('item' => $this->selectByYear($year->enrolment_year));
        }
        return $yearContent;
    }

    public function GetEnrollmentYears($first_year = null, $last_year = null)
    {
        $years = PrimaryEnrolmentRegionModel::select('enrolment_year');
        if (isset($first_year, $last_year)) {
            $years->where('enrolment_year', '>=', $first_year);
            $years->where('enrolment_year', '<=', $last_year);
        }
        return $years->distinct()->orderBy('enrolment_year', 'ASC')->get();
    }

    public function index(Request $request)
    {
        $district = 'district';
        $region = 'region';
        $population = 'males';
        $searchRegion=$request->input('region');
        //region
        $regionList = PrimaryEnrolmentRegionModel::where('region', 'Like', '%' . $searchRegion . '%')->select('region')->distinct()->orderBy('id', 'ASC')->get();

        //sum of region
        foreach ($regionList as $list) {
            $sum[] = array(
                'region' => $list->region,
                'males' => PrimaryEnrolmentRegionModel::where('region', $list->region)->sum($population));
        }

        $grand_total = array();
        $total_by_region = array();

        foreach ($this->GetEnrollmentYears() as $ty) {
            $year = $ty->enrolment_year;
            $lp = PrimaryEnrolmentRegionModel::where(['enrolment_year' => $year])->sum('males');
            $region_total = PrimaryEnrolmentRegionModel::select('region', 'enrolment_year')->selectRaw('sum(males) as sum')->where(['enrolment_year' => $year])->groupBy('region', 'enrolment_year')->get();

            array_push($grand_total, array('item' => (int)$lp));
            array_push($total_by_region, array($year => $region_total));
        }

        foreach ($regionList as $lg) {
            $data_list[] = array(
                'item' => $lg,
                'sum' => $this->getSumEnrolmentYear(2020)
            );
        }

        return [
            'data' => $this->EnrolmentByRegion(null, null, $request->region),
            'list' => $regionList,
            'grand_total' => $grand_total,
            'sum' => $this->getAllRegions()
        ];
    }





    /**
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
     * @param  \App\Models\PrimaryEnrolmentRegionModel  $primaryEnrolmentRegionModel
     * @return \Illuminate\Http\Response
     */
    public function show(PrimaryEnrolmentRegionModel $primaryEnrolmentRegionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrimaryEnrolmentRegionModel  $primaryEnrolmentRegionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrimaryEnrolmentRegionModel $primaryEnrolmentRegionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrimaryEnrolmentRegionModel  $primaryEnrolmentRegionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimaryEnrolmentRegionModel $primaryEnrolmentRegionModel)
    {
        //
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

//get region
public function getRegions($id=''){
    if($id==''){
    $region=RegionModel::orderBy('name','ASC')->get();
    }else{
    $region=RegionModel::where('id',$id)->orderBy('name','ASC')->get();
    }
    return $region;
    }


//get enrolment year
public function getEnrolmentYears($year=''){
    if($year!=''){
    $enrolmentYear=PrimaryEnrolmentRegionModel::select('enrolment_year')->where('enrolment_year',$year)->orderBy('enrolment_year','ASC')->distinct()->get();
    }else{
    $enrolmentYear=PrimaryEnrolmentRegionModel::select('enrolment_year')
    ->orderBy('enrolment_year','ASC')
    ->distinct()->get();
    }
    return $enrolmentYear;
    }



//school year
    public function getSchoolYears($year=''){
        if($year!=''){
        $get=SchoolYearModel::select('school_year')->where('school_year',$year)->get();
        }else{
        $get=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->get();
        }
        return $get;
        }



//prepared enrolment years
    public function preparedEnrolment($district_id,$enrolmentYears){
    foreach($enrolmentYears as $yr){
    $total=PrimaryEnrolmentRegionModel::select('males')->where('district',$district_id)->where('enrolment_year',$yr->enrolment_year)->sum('males')+
    PrimaryEnrolmentRegionModel::select('females')->where('district',$district_id)->where('enrolment_year',$yr->enrolment_year)->sum('females')

    ;
    $response[]=array('population'=>$total);
    }
    return $response;
    }





//get learners population
public function learnersPopulationByYear($district,$year){
$get=DB::select('select sum(primary_enrolment_region.males+primary_enrolment_region.females) as sum
from primary_enrolment_region
where primary_enrolment_region.district='.$district.' and primary_enrolment_region.enrolment_year='.$year);
if($get){
foreach($get as $item);
if($item->sum==null){
return 0;
}else{
return number_format($item->sum);
}
}else{
return 0;
}






}







//get learners population
public function learnersPopulationByYearRegion($region,$year){
    return

    PrimaryEnrolmentRegionModel::select('males')
    ->where('region',$region)
    ->where('enrolment_year',$year)
    ->sum('males')+PrimaryEnrolmentRegionModel::select('females')
    ->where('region',$region)
    ->where('enrolment_year',$year)
    ->sum('females')

    ;
    }






//return region tala
public function returnTotalRegion($region,$year){
    $total=PrimaryEnrolmentRegionModel::select('males,females')
    ->where('region',$region)->where('enrolment_year',$year)
    ->orderBy('id','ASC')
    ->limit(1)->get();
    if(count($total)==1){
foreach($total as $response);
$data=$response;
    }else{
$data=0;
    }
    return $data;
}




//char data
public function chartRegionEnrolmentYear($region,$yy=''){
$getYears=$this->getSchoolYears($yy);
foreach($getYears as $year){
$item=PrimaryEnrolmentRegionModel::select('males')
->where('enrolment_year',$year->school_year)
->where('region',$region)->sum('males')+PrimaryEnrolmentRegionModel::select('females')
->where('enrolment_year',$year->school_year)
->where('region',$region)->sum('females');

$response[]=array($year->school_year,
$item);

}

return $response;
}








    //enrolment by region test
    public function EnrolmentByRegionApi(){
$numRows=PrimaryEnrolmentRegionModel::count();
//api response
if($numRows > 0){
//selectable
$regions=$this->getRegions();
//selectable
$getYears=$this->getSchoolYears();
foreach($getYears as $yy){
$districts=DistrictModel::get();
foreach($districts as $district){
$response[]=array(
'district_id'=>$district->id,
'sum'=>array(
$this->learnersPopulationByYear($district->id,$yy->school_year)
)
);
}








 }
//get region sum
foreach($getYears as $yy){
foreach($regions as $region){
$regionSumResponse[]=array(
'id'=>$region->id,
'name'=>$region->name,
'year'=>$yy->school_year,
'population'=>number_format($this->learnersPopulationByYearRegion($region->id,$yy->school_year))

);
}
}
//grand total
$grandYear=$this->getSchoolYears();
foreach($getYears as $enYear){
$totalGrandYear[]=array('gand_total_year'=>$enYear->school_year,'sum'=>number_format(PrimaryEnrolmentRegionModel::select('males')->where('enrolment_year',$enYear->school_year)->sum('males')
+PrimaryEnrolmentRegionModel::select('females')->where('enrolment_year',$enYear->school_year)->sum('females')
));
}
//table headers
$tableHeaders=['REGION','DISTRICT'];
foreach($getYears as $yr){
array_push($tableHeaders,' '.$yr->school_year);
}




//chart data
foreach($regions as $region){
$chart[]=array(
'name'=>$region->name,
'data'=>$this->chartRegionEnrolmentYear($region->id,0)
);
}


//from to
$from=PrimaryEnrolmentRegionModel::select('enrolment_year')
->orderBy('enrolment_year','ASC')
->limit(1)
->get();
foreach($from as $fromYear);
$to=PrimaryEnrolmentRegionModel::select('enrolment_year')
->orderBy('enrolment_year','DESC')
->limit(1)
->get();
foreach($to as $toYear);
$fromTo=' '.$fromYear->enrolment_year.' - '.$toYear->enrolment_year;

$allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->orderBy('school_year','desc')->get();


//district totals

//return $chart;



return (['fromTo'=>$fromTo,'tableChart'=>$chart,'header'=>$tableHeaders,'body'=>$response,'regionSum'=>$regionSumResponse,'grandTotal'=>$totalGrandYear,'tableRegions'=>$regions,'tableDistricts'=>$this->getDistricts(),'years'=>$allYears,'numRows'=>$numRows]);
}else{
    return['numRows'=>$numRows];
}

}
























//searchRegionApi
public function searchRegionApi(Request $request){

    $searchRegion= $request->input('region');
    $regions=RegionModel::where('name','like','%'.$searchRegion.'%')->orderBy('name','ASC')->get();
    //selectable
    $getYears=$this->getEnrolmentYears();
   foreach($getYears as $yy){
$districts=DistrictModel::get();
foreach($districts as $district){

$response[]=array(
'district_id'=>$district->id,
'sum'=>array(
$this->learnersPopulationByYear($district->id,$yy->enrolment_year)
)
);


}


   }







//get region sum
foreach($getYears as $yy){
foreach($regions as $region){
$regionSumResponse[]=array(
'id'=>$region->id,
'name'=>$region->name,
'year'=>$yy->enrolment_year,
'population'=>$this->learnersPopulationByYearRegion($region->id,$yy->enrolment_year)
);
}
}





//grand total
$grandYear=$this->getEnrolmentYears();
foreach($getYears as $enYear){
$totalGrandYear[]=array('gand_total_year'=>$enYear->enrolment_year,'sum'=>PrimaryEnrolmentRegionModel::select('males')->where('enrolment_year',$enYear->enrolment_year)->sum('males'));
}

//table headers
$tableHeaders=['REGION','DISTRICT'];
foreach($getYears as $yr){
array_push($tableHeaders,'Enrolment Year '.$yr->enrolment_year);
}







// //api response
    $numRows=count($regions);

    if($numRows>0){
//api response
return (['header'=>$tableHeaders,'body'=>$response,'regionSum'=>$regionSumResponse,'grandTotal'=>$totalGrandYear,'tableRegions'=>$regions,'tableDistricts'=>$this->getDistricts(),'years'=>$this->getEnrolmentYears(),'noResults'=>$numRows]);


    }else{
        return['noResults'=>$numRows];
    }

    }










//filter









public function filterRegionApi(Request $request){
    $numRows=PrimaryEnrolmentRegionModel::count();
    $filterRegion= $request->input('region');


        $filterDistrict= $request->input('district');
        $filterYear=$request->input('year');
        $selectedId='';
    //api response
    if($numRows > 0){

        if($filterDistrict!=''){
            $districts=DistrictModel::where('id',$filterDistrict)->get();
            foreach($districts as $getDistrict);
            $regions= RegionModel::where('id',$getDistrict->region_id)->orderBy('name','ASC')->get();
            $selectedId=$getDistrict->region_id;
            foreach($regions as $region){
                $chart[]=array(
                'name'=>$region->name,
                'data'=>$this->chartRegionEnrolmentYear($region->id,$filterYear)
                );
                }

         }else{
    $districts=DistrictModel::get();

    $regions=$this->getRegions($filterRegion);

    $selectedId=$filterRegion;
    //chart data

    foreach($regions as $region){
    $chart[]=array(
    'name'=>$region->name,
    'data'=>$this->chartRegionEnrolmentYear($region->id,$filterYear)
    );
    }

         }
         foreach($regions as $getDistrict);
                    $getDistrictall=DistrictModel::where('region_id',$getDistrict->id)->select('id','name')->orderBy('name','ASC')
                    ->get();

    $getYears=$this->getSchoolYears($filterYear);

    foreach($getYears as $yy){
    $districts=DistrictModel::get();
    foreach($districts as $district){
    $response[]=array(
    'district_id'=>$district->id,
    'sum'=>array(
    $this->learnersPopulationByYear($district->id,$yy->school_year)
    )
    );
    }
     }
    //get region sum
    foreach($getYears as $yy){
    foreach($regions as $region){
    $regionSumResponse[]=array(
    'id'=>$region->id,
    'name'=>$region->name,
    'year'=>$yy->school_year,
    'population'=>$this->learnersPopulationByYearRegion($region->id,$yy->school_year)
    );
    }
    }
    //grand total
    $grandYear=$this->getSchoolYears();
    if($selectedId==''){


        foreach($getYears as $enYear){
            $totalGrandYear[]=array('gand_total_year'=>$enYear->school_year,'sum'=>
        number_format(
            PrimaryEnrolmentRegionModel::select('males')->where('enrolment_year',$enYear->school_year)->sum('males')+
            PrimaryEnrolmentRegionModel::select('females')->where('enrolment_year',$enYear->school_year)->sum('females')
        )

        );
            }


    }else{

        foreach($getYears as $enYear){
            $totalGrandYear[]=array('gand_total_year'=>$enYear->school_year,'sum'=>
        number_format(
            PrimaryEnrolmentRegionModel::select('males')->where('enrolment_year',$enYear->school_year)->where('region',$selectedId)->sum('males')+
            PrimaryEnrolmentRegionModel::select('females')->where('enrolment_year',$enYear->school_year)->where('region',$selectedId)->sum('females')
        )

        );
            }
    }

    //table headers
    $tableHeaders=['REGION','DISTRICT'];
    foreach($getYears as $yr){
    array_push($tableHeaders,' '.$yr->school_year);
    }






    //from to
    $from=PrimaryEnrolmentRegionModel::select('enrolment_year')
    ->orderBy('enrolment_year','ASC')
    ->limit(1)
    ->get();
    foreach($from as $fromYear);
    $to=PrimaryEnrolmentRegionModel::select('enrolment_year')
    ->orderBy('enrolment_year','DESC')
    ->limit(1)
    ->get();
    foreach($to as $toYear);
    $fromTo=' '.$fromYear->enrolment_year.' - '.$toYear->enrolment_year;

    $allYears=SchoolYearModel::select('school_year')->whereBetween('school_year',['2006','2011'])->orderBy('school_year','desc')->get();










    return (['header'=>$tableHeaders,'body'=>$response,'regionSum'=>$regionSumResponse,'grandTotal'=>$totalGrandYear,'tableRegions'=>$regions,'tableDistricts'=>$this->getDistricts($filterDistrict),'years'=>$allYears,'nunRows'=>$numRows,'getDistrictall'=>$getDistrictall,'tableChart'=>$chart]);
}else{
    return['numRows'=>$numRows];
}

    }




// advancedFilter

public function advancedFilter(Request $request){
    $regions=$this->getRegions();
    $districts=$this->getDistricts();

   $fromYear= $request->input('fromYear');
   $toYear= $request->input('toYear');
//selectable
if($fromYear< $toYear){
    $startYear=$fromYear;
$endYear=$toYear;
}else{
    $startYear=$toYear;
    $endYear=$fromYear;
}


//header
$header=['REGION','DISTRICT'];

$years=SchoolYearModel::select('id','school_year')->whereBetween('school_year',[$startYear,$endYear])->orderBy('school_year','DESC')->get();
foreach($years as $yy){
$enrolmentYears[]=$yy->school_year;
array_push($header,$yy->school_year);

//grand total
$grandTotal[]=array(
'year'=>$yy->school_year,
'sum'=>number_format(
PrimaryEnrolmentRegionModel::select('males')->where('enrolment_year',$yy->school_year)->sum('males')+
PrimaryEnrolmentRegionModel::select('females')->where('enrolment_year',$yy->school_year)->sum('females')
)
);



}


//region

foreach($regions as $r){
foreach($years as $y){

$regionSum[]=array(
'id'=>$r->id,
'name'=>$r->name,
'year'=>$y->school_year,
'population'=>number_format(

PrimaryEnrolmentRegionModel::select('males')
->where('region',$r->id)->where('enrolment_year',$y->school_year)
->sum('males')+
PrimaryEnrolmentRegionModel::select('females')
->where('region',$r->id)->where('enrolment_year',$y->school_year)
->sum('females')

)

);

}
}



//district
foreach($districts as $d){
    foreach($years as $y){

$body[]=array(
'district_id'=>$d->id,
'sum'=>number_format(
    PrimaryEnrolmentRegionModel::select('males')->where('district',$d->id)->where('enrolment_year',$y->school_year)->sum('males')+
    PrimaryEnrolmentRegionModel::select('females')->where('district',$d->id)->where('enrolment_year',$y->school_year)->sum('females')

)
);
}
}



return ['header'=>$header,'body'=>$body,'grandTotal'
=>$grandTotal,'tableDistricts'=>$districts,'tableRegions'=>$regions,'regionSum'=>$regionSum];
}



































}





