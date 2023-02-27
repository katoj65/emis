<?php

namespace App\Http\Controllers\Sanitation;

use App\Models\Sanitation\SanitationFacility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SanitationFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanitation=SanitationFacility::get();
        return response()->json(['sanitation'=>$sanitation]);
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
     * @param  \App\Models\Models\SanitationFacility  $sanitation_facility
     * @return \Illuminate\Http\Response
     */
    public function show(SanitationFacility $sanitation_facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\SanitationFacility  $sanitation_facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanitationFacility $sanitation_facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\SanitationFacility  $sanitation_facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanitationFacility $sanitation_facility)
    {
        //
    }
}
