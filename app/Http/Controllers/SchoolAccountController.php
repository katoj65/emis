<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SchoolAccountController extends Controller
{


    public function index()
    {
        return ('this is school');
    }


}








