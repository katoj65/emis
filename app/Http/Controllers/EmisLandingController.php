<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmisLandingController extends Controller
{

    public function index(Request $request)
    {

        return view('EmisLandingPage');


    }

}
