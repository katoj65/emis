<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $schoolClass=SchoolClass::get();
        return response()->json(['schoolClass'=>$schoolClass]);
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
     * @param  \App\Models\Schools\SchoolClass  $school_class
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $school_class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools\SchoolClass  $school_class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $school_class)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools\SchoolClass  $school_class
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $school_class)
    {
        //
    }
}
