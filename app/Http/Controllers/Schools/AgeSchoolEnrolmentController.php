<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\AgeSchoolEnrolment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AgeSchoolEnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolAge=AgeSchoolEnrolment::get();
        return response()->json(['schoolAge'=>$schoolAge]);
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
     * @param  \App\Models\Schools\AgeSchoolEnrolment  $age_school_enrolment
     * @return \Illuminate\Http\Response
     */
    public function show(AgeSchoolEnrolment $age_school_enrolment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools\AgeSchoolEnrolment  $age_school_enrolment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgeSchoolEnrolment $age_school_enrolment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools\AgeSchoolEnrolment  $age_school_enrolment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgeSchoolEnrolment $age_school_enrolment)
    {
        //
    }
}
