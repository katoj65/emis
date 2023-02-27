<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\ClassDistrictEnrolment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ClassDistrictEnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classDistrict=ClassDistrictEnrolment::get();
        return response()->json(['classDistrict'=>$classDistrict]);
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
     * @param  \App\Models\Schools\ClassDistrictEnrolment  $class_district_enrolment
     * @return \Illuminate\Http\Response
     */
    public function show(ClassDistrictEnrolment $class_district_enrolment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools\ClassDistrictEnrolment  $class_district_enrolment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassDistrictEnrolment $class_district_enrolment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools\ClassDistrictEnrolment  $class_district_enrolment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassDistrictEnrolment $class_district_enrolment)
    {
        //
    }
}
