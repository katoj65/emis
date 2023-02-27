<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\DistrictSchoolEnrolment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DistrictSchoolEnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $districtSchool=DistrictSchoolEnrolment::get();
        return response()->json(['districtSchool'=>$districtSchool]);
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
     * @param  \App\Models\Schools\DistrictSchoolEnrolment  $district_school_enrolment
     * @return \Illuminate\Http\Response
     */
    public function show(DistrictSchoolEnrolment $district_school_enrolment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools\DistrictSchoolEnrolment  $district_school_enrolment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictSchoolEnrolment $district_school_enrolment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools\DistrictSchoolEnrolment  $district_school_enrolment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistrictSchoolEnrolment $district_school_enrolment)
    {
        //
    }
}
