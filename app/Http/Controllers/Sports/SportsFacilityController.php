<?php

namespace App\Http\Controllers\Sports;

use App\Models\Sports\SportsFacility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SportsFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sportsFacility=SportsFacility::get();
        return response()->json(['sportsFacility'=>$sportsFacility]);
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
     * @param  \App\Models\Sports\SportsFacility  $sports_facility
     * @return \Illuminate\Http\Response
     */
    public function show(SportsFacility $sports_facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sports\SportsFacility  $sports_facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportsFacility $sports_facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sports\SportsFacility  $sports_facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportsFacility $sports_facility)
    {
        //
    }
}
