<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//declaring routes

$mainRoutes = ['/pre-primary/', '/primary/', '/secondary/', '/ptc/', '/btvet/', '/university/'];

$report = [
    'school-distribution',
    'key-location-distance',
    'registration-status',
    'school-ownership',
    'boarding',
    'funding',
    'ownership',
    'registration',
    'border-status',
    'licensing',
    'operation',
    'performance',
    'nationality',
    'attendance',
    'transfers',
    'dropouts',
    'special-needs',
    'orphanage',
    'non-teaching-staff',
    'in-service-training',
    'teacher-transfer',
    'teacher-exodus',
    'source-of-water',
    'source-proximity',
    'consumption-rate',
    'hand-washing-facilities',
    'garbage-disposal',
    'cooking-energy',
    'lighting',
    'computer-inventory',
    'internet-access',
    'text-books',
    'teaching-guides',
    'readers',
    'issue-occurrence',
    'health-policy',
    'health-skills',
    'feeding',
    'food-source',
    'sports_facilities',
    'sports_equipment',
    'participation',
    'learner-training',
    'teacher-training',
    'capitation-grant',
    'operation',
    'performance',
    'proximity',
    'governance',
    'gender-composition',
    'operations',
    'other-income'

];

$infrastructure = [
    'infrastructure-category',
    'sanitation-facilities',
    'text-books',
    'instructional-material',
    'lab-equipment',
    'water-sources',
    'energy-sources',
    'stances-availability'
];

$learners = [
    'enrolment',
    'orphanage',
    'special-needs',
    'learner-transfer',
    'class-repeatition',
    'seating-capacity',
    'dropout-status',
];

$curricular = [
    'activity-category',
    'participation',
    'budget',
    'equipment'
];

$staff = [
    'teaching-staff',
    'non-teaching-staff',
    'teacher-exodus'
];

$health = [
    'hiv-aids'
];

$indicators = [
    'ger',
    'ner',
    'ptr',
    'pct',
    'psr',
];


Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('sample-responses/{level?}', 'SchoolsController@SampleResponses');
Route::get('/home', 'EmisLandingController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('welcome');
});

Route::get('/reports', function () {
    return view('welcome');
});

Route::get('/documents/downloads', function () {
    return view('welcome');
});

Route::get('/documents/uploads', function () {
    return view('welcome');
});

Route::get('/documents/templates', function () {
    return view('welcome');
});

Route::get('/schools', function () {
    return view('welcome');
});

Route::get('/learners', function () {
    return view('welcome');
});

Route::get('/teachers', function () {
    return view('welcome');
});

Route::get('/dashboard/enrolment', function () {
    return view('welcome');
});

Route::get('/search', function () {
    return view('welcome');
});

Route::get('/user/profile', function () {
    return view('welcome');
});

//StudentTable

Route::get('user/StudentTable', function () {
    return view('welcome');
});
//SchoolsTable
Route::get('user/SchoolsTable', function () {
    return view('welcome');
});







//report routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($report); $x++) {
        Route::get($mainRoutes[$y] . $report[$x], function () {
            return view('welcome');
        });
    }
}


//infrastructure routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($infrastructure); $x++) {
        Route::get($mainRoutes[$y] . $infrastructure[$x], function () {
            return view('welcome');
        });
    }
}


//learners routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($learners); $x++) {
        Route::get($mainRoutes[$y] . $learners[$x], function () {
            return view('welcome');
        });
    }
}


//curricular routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($curricular); $x++) {
        Route::get($mainRoutes[$y] . $curricular[$x], function () {
            return view('welcome');
        });
    }
}


//staff routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($staff); $x++) {
        Route::get($mainRoutes[$y] . $staff[$x], function () {
            return view('welcome');
        });
    }
}

//health routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($health); $x++) {
        Route::get($mainRoutes[$y] . $health[$x], function () {
            return view('welcome');
        });
    }
}

//indicator routes

for ($y = 0; $y < count($mainRoutes); $y++) {
    for ($x = 0; $x < count($indicators); $x++) {
        Route::get($mainRoutes[$y] . $indicators[$x], function () {
            return view('welcome');
        });
    }
}


//reports
Route::get('/school-distribution/pre-primary', function () {
    return view('welcome');
});

//reports
Route::get('/school/funding', function () {
    return view('welcome');
});

Route::get('/school/pre-primary-attached', function () {
    return view('welcome');
});


Route::get('/school/distance-to-deo', function () {
    return view('welcome');
});

Route::get('/enrolment/grade-category', function () {
    return view('welcome');
});

Route::get('/enrolment/early-childhood', function () {
    return view('welcome');
});

Route::get('/pupil/special-needs', function () {
    return view('welcome');
});

Route::get('/user/notifications', function () {
    return view('welcome');
});


//report primary enrolment
$reportType=['enrolment-by-class',
'enrolment-by-age',
'enrolment-by-region',
'enrolment-by-nationality-class',
'enrolment-by-nationality-age'];
foreach($reportType as $r){
Route::get('/report/primary/'.$r.'/', function () {
    return view('welcome');
});
}
