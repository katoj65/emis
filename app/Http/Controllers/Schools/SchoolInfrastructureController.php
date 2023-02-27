<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\SchoolInfrastructure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SchoolInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolInfrastructure=SchoolInfrastructure::get();
        return response()->json(['schoolInfrastructure'=>$schoolInfrastructure]);
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
     * @param  \App\Models\Schools\SchoolInfrastructure  $school_infrastructure
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolInfrastructure $school_infrastructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools\SchoolInfrastructure  $school_infrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolInfrastructure $school_infrastructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools\SchoolInfrastructure  $school_infrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolInfrastructure $school_infrastructure)
    {
        //
    }
}
