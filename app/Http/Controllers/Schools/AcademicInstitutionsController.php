<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\AcademicInstitutions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AcademicInstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $academic=AcademicInstitutions::get();

        return response()->json(['academic'=>$academic]);
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
     * @param  \App\Models\Schools\AcademicInstitutions  $AcademicInstitutions
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicInstitutions $AcademicInstitutions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools\AcademicInstitutions  $AcademicInstitutions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicInstitutions $AcademicInstitutions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools\AcademicInstitutions  $AcademicInstitutions
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicInstitutions $AcademicInstitutions)
    {
        //
    }
}
