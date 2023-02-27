<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Teachers\TeachersRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class TeachersRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers_registration=TeachersRegistration::get();

        return response()->json(['teachers'=>$teachers_registration]);
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
    public function show(student_registration $student_registration)
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
    public function update(Request $request, student_registration $student_registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\student_registration  $student_registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(student_registration $student_registration)
    {
        //
    }
}
