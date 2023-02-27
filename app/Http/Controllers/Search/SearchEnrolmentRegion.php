<?php

namespace App\Http\Controllers\Search;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PrimaryEnrolmentRegionModel;
use App\Traits\AdminUnits;
class SearchEnrolmentRegion extends Controller
{

    use AdminUnits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchRegion(Request $request)
    {


        $searchRegion=$request->input('region');





    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */






public function filterRegion(Request $request)
    {
        $district = 'district';
        $region = 'region';
        $status = 'region_status';
        $population = 'learners_population';
       $selectedRegion=$request->input('region');
       $selecteddistrict=$request->input('district');
if($selectedRegion!='' && $selecteddistrict===''){
        //region
        $regionList = PrimaryEnrolmentRegionModel::where('region',$selectedRegion)->select('region')->distinct()->orderBy('region', 'ASC')->get();
        return [
            'list' => $regionList];
        }

    }


    public function index(Request $request)
    {



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
