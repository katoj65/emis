<?php

namespace App\Http\Controllers\Schools;

use App\Models\Schools\InstructionalMaterial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class InstructionalMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructional=InstructionalMaterial::get();
        return response()->json(['instructional'=>$instructional]);
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
     * @param  \App\Models\Models\InstructionalMaterial  $InstructionalMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(InstructionalMaterial $InstructionalMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\InstructionalMaterial  $InstructionalMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstructionalMaterial $InstructionalMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\InstructionalMaterial  $InstructionalMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstructionalMaterial $InstructionalMaterial)
    {
        //
    }
}
