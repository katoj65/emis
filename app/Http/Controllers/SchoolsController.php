<?php

namespace App\Http\Controllers;

use App\Traits\AdminUnits;
use App\Traits\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SchoolsController extends Controller
{
    use Settings, AdminUnits;

    //
    public function allSchools()
    {

        return Inertia::render('School/Index');

    }

    public function SampleResponses($level = null)
    {
//        print_r(admin_levels());
//
//        exit;
        //
//        $data['education_level'] = $this->EducationLevel($level);
//        $data['region'] = $this->Region($level);
//        $data['districts'] = $this->Districts($level);
//        $data['county'] = $this->County($level);
//        $data['subcounty'] = $this->Subcounty($level);
        $data['parish'] = $this->Parish($level);
//        $data['village'] = $this->Village($level);

        return $data;
    }


}
