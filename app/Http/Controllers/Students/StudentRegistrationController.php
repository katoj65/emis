<?php

namespace App\Http\Controllers\Students;

use App\Models\Students\StudentRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_registration=StudentRegistration::get();

        return response()->json(['students'=>$student_registration]);
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
     * @param  \App\Models\Models\student_registration  $student_registration
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRegistration $student_registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\student_registration  $student_registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentRegistration $student_registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\student_registration  $student_registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRegistration $student_registration)
    {
        //
    }
}
