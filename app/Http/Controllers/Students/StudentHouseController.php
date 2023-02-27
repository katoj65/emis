<?php

namespace App\Http\Controllers\Students;

use App\Models\Students\Student_house;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StudentHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studenthouse=Student_house::get();

        return response()->json(['studentHouses'=>$studenthouse]);
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
     * @param  \App\Models\Models\Student_house  $student_house
     * @return \Illuminate\Http\Response
     */
    public function show(Student_house $student_house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Student_house  $student_house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student_house $student_house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Student_house  $student_house
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student_house $student_house)
    {
        //
    }
}
