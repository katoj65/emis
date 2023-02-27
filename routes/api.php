<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\StudentRegistrationController;
use App\Http\Controllers\Schools\AcademicInstitutionsController;
use App\Http\Controllers\Teachers\TeachersRegistrationController;
use App\Http\Controllers\Schools\AgeSchoolEnrolmentController;
use App\Http\Controllers\Schools\ClassDistrictEnrolmentController;
use App\Http\Controllers\Schools\ContactsController;
use App\Http\Controllers\Districts\DistrictController;
use App\Http\Controllers\Schools\DistrictSchoolEnrolmentController;
use App\Http\Controllers\Schools\InstructionalMaterialController;
use App\Http\Controllers\Sanitation\SanitationFacilityController;
use App\Http\Controllers\Schools\SchoolClassController;
use App\Http\Controllers\Schools\SchoolInfrastructureController;
use App\Http\Controllers\Sports\SportsFacilityController;
use App\Http\Controllers\Students\StudentHouseController;
use App\Http\Controllers\PrimarySchoolWaterSourceDistanceApi;



//primary enrolment records.
use App\Http\Controllers\Reports\PrimaryEnrolmentNationalityClassApi;
use App\Http\Controllers\Reports\PrimaryEnrolmentNationalityAgeApi;
use App\Http\Controllers\Reports\PrimaryEnrolmentAgeApi;
use App\Http\Controllers\Reports\PrimaryEnrolmentDistrictApi;
use App\Http\Controllers\Reports\PrimaryEnrolmentRegionApi;
use App\Http\Controllers\Users\UserMenuApi;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Reports\PrimaryEnrolmentDistrictClassApi;
use App\Http\Controllers\PrimaryEnrolmentSchoolOwnershipApi;
use App\Http\Controllers\PrimarySchoolEnrolmentClassYearApi;
use App\Http\Controllers\PrimarySchoolBorderStatusApi;
use App\Http\Controllers\PrimarySchoolRegistrationClassApi;


//primary distribution records

use App\Http\Controllers\PrimarySchoolDistributionApi;
use App\Http\Controllers\PrimarySchoolDistributionOwnershipApi;
use App\Http\Controllers\PrimarySchoolDistributionByRegionFoundedBodyApi;
use App\Http\Controllers\PrimaryDistributionBySchoolRegionApi;



//teacher

use App\Http\Controllers\PrimaryTeacherPayRollApi;
use App\Http\Controllers\PrimarySchoolBoarderStatusByRegionAPI;
use App\Http\Controllers\PrimaryTeacherGenderOwnershipApi;
use App\Http\Controllers\PrimaryTeacherGenderQualificationApi;
use App\Http\Controllers\PrimaryTeacherGenderQualificationRegionApi;
use App\Http\Controllers\PrimaryNoneTeachingStaffApi;

//schools
use App\Http\Controllers\PrimarySchoolLicenced;
use App\Http\Controllers\PrimaryGenderCompositionApi;

//text books
use App\Http\Controllers\PrimaryTextbooksApi;
use App\Http\Controllers\PrimarySchoolReaderApi;
use App\Http\Controllers\PrimarySchoolGuideApi;

//admin units
use App\Http\Controllers\AdminUnitsApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//text books
Route::get('primary/school/textbooks', [PrimaryTextbooksApi::class, 'index']);
Route::post('primary/school/textbooks/filter', [PrimaryTextbooksApi::class, 'filter']);
Route::post('primary/school/textbooks/advanced-filter', [PrimaryTextbooksApi::class, 'advancedFilter']);



//guides
Route::get('primary/school/guides', [PrimarySchoolGuideApi::class, 'index']);
Route::get('primary/school/guides/filter', [PrimarySchoolGuideApi::class, 'filter']);
Route::get('primary/school/guides/advanced-filter', [PrimarySchoolGuideApi::class, 'advancedFilter']);


//readers
Route::get('primary/school/readers', [PrimarySchoolReaderApi::class, 'index']);
Route::get('primary/school/readers/filter', [PrimarySchoolReaderApi::class, 'index']);
Route::get('primary/school/readers/advanced-filter', [PrimarySchoolReaderApi::class, 'index']);




//admin units api
Route::post('primary/admin-units/region', [AdminUnitsApi ::class, 'region']);
Route::post('primary/admin-units/district-region', [AdminUnitsApi ::class, 'regionByDistrict']);
Route::post('primary/admin-units/region-district', [AdminUnitsApi ::class, 'districtByRegion']);



//school licensed
Route::get('primary/school/licensed', [PrimarySchoolLicenced::class, 'index']);
Route::post('primary/school/licensed/filter', [PrimarySchoolLicenced::class, 'filter']);
Route::post('primary/school/licensed/advanced-filter', [PrimarySchoolLicenced::class, 'advancedFilter']);


//school sports





Route::get('delete/all', [TestController::class, 'deleteAllModels']);

//School distribution
Route::get('primary/school/distribution/region', [PrimarySchoolDistributionApi::class, 'index']);
Route::get('primary/school/distribution/ownership', [PrimarySchoolDistributionOwnershipApi::class, 'index']);
Route::get('primary/school/distribution/category', [PrimarySchoolDistributionByRegionFoundedBodyApi::class, 'index']);

Route::post('primary/school/distribution/category/advanced-filter', [PrimarySchoolDistributionByRegionFoundedBodyApi::class, 'advancedFilter']);

Route::get('primary/school/distribution/school_region', [PrimaryDistributionBySchoolRegionApi::class, 'index']);
Route::get('primary/school/distribution/school_region', [PrimaryEnrolmentSchoolOwnershipApi::class, 'index']);


Route::post('filter/primary/enrolment/region', [PrimaryEnrolmentRegionApi::class, 'filterRegionApi']);



//School boarder status
Route::get('primary/school/border/status', [PrimarySchoolBorderStatusApi::class, 'index']);

Route::post('filter/primary/school/border/status', [PrimarySchoolBorderStatusApi::class, 'filterSchool']);

Route::post('primary/school/border/status/advanced-filter', [PrimarySchoolBorderStatusApi::class, 'advancedFilter']);



//test Api
Route::get('delete/test', [TestController::class, 'delete_tables']);

Route::get('primary/textbooks/test', [TestController::class, 'populateTextbooks']);

Route::get('primary/learning-material/test', [TestController::class, 'populateLearningMaterial']);


Route::get('primary/School/Licensed/test', [TestController::class, 'PopulateSchoolLicensedTable']);
Route::get('primary/test', [TestController::class, 'populate_primary_enrolment_region']);
Route::get('primary/region/test', [TestController::class, 'populatePrimaryEnrolmentDistrict']);
Route::get('primary/age/test', [TestController::class, 'populate_primary_enrolment_age_table']);
Route::get('primary/nationality/class/test', [TestController::class, 'populate_primary_enrolment_by_nationality_class_table']);
//Route::get('primary/nationality/age/test', [TestController::class, 'populate_primary_enrolment_nationality_age_table']);


Route::get('primary/school/distribution/region/test', [TestController::class, 'populate_primary_school_distribution_region']);
Route::get('primary/enrolment/school/ownership/test', [TestController::class, 'populatePrimarySchoolOwnershipGenderApi']);
Route::get('primary/enrolment/school/class/year/test', [TestController::class, 'populatePrimarySchoolClassYearApi']);
Route::get('primary/enrolment/school/border/status/test', [TestController::class, 'populatePrimarySchoolStatusApi']);
Route::get('primary/enrolment/school/border/status/region/test', [TestController::class, 'populatePrimarySchoolStatusByRegionApi']);
Route::get('primary/school/registration/class/test', [TestController::class, 'populatePrimarySchoolRegistrationClass']);
Route::get('primary/school/teacher/gender/region/test',[TestController::class,'teacherSchoolGenderRegion']);

Route::get('primary/teacher/gender/ownership/test',[TestController::class,'populatePrimaryTeacherGenderOwnership']);
Route::get('primary/teacher/payroll/test', [TestController::class, 'populatePrimaryTeacherPayRollApi']);
Route::get('primary/teacher/gender/qualification/test', [TestController::class, 'PrimaryTeacherGenderQualificationApi']);
Route::get('primary/teacher/gender/qualification/region/tets',[TestController::class, 'populatePrimaryTeacherGenderQualificationRegionApi']);

//water and sanitation

Route::get('primary/school/distance/water/source/test',[TestController::class, 'populateDistanceWaterSource']);
Route::get('primary/none-teaching-staff/test',[TestController::class, 'populatePrimaryNoneTeachingStaff']);

//sports
Route::get('primary/sports/facilities/test',[TestController::class, 'createSportsFacilities']);


//sports
Route::get('primary/gender/composition/test',[TestController::class, 'createGenderComposition']);



Route::get('primary/school/registration/class',[PrimarySchoolRegistrationClassApi::class,'index']);
Route::post('filter/primary/school/registration/class',[PrimarySchoolRegistrationClassApi::class,'filterRegistration']);
Route::post('primary/school/registration/class/advanced-filter',[PrimarySchoolRegistrationClassApi::class,'advancedFilter']);



//gender composition
Route::get('primary/school/gender/composition',[PrimaryGenderCompositionApi::class,'index']);
Route::post('primary/school/gender/composition/filter',[PrimaryGenderCompositionApi::class,'filter']);
Route::post('primary/school/gender/composition/advanced-filter',[PrimaryGenderCompositionApi::class,'advancedFilter']);








//teacher payroll



Route::get('primary/teacher/gender/ownership', [PrimaryTeacherGenderOwnershipApi::class, 'index']);

Route::post('filter/primary/teacher/gender/ownership', [PrimaryTeacherGenderOwnershipApi::class, 'filterOwnership']);


Route::post('primary/teacher/gender/ownership/advanced-filter', [PrimaryTeacherGenderOwnershipApi::class, 'advancedFilter']);

Route::get('primary/enrolment/age', [PrimaryEnrolmentAgeApi::class, 'index']);
Route::get('primary/enrolment/nationality-class', [PrimaryEnrolmentNationalityClassApi::class, 'index']);
Route::get('primary/enrolment/nationality-age', [PrimaryEnrolmentNationalityAgeApi::class, 'index']);
Route::post('primary/enrolment/nationality-class/advanced-filter', [PrimaryEnrolmentNationalityClassApi::class, 'advancedFilter']);
Route::get('primary/school/enrolment/ownership', [PrimaryEnrolmentSchoolOwnershipApi::class, 'index']);
Route::post('filter/primary/school/enrolment/ownership', [PrimaryEnrolmentSchoolOwnershipApi::class, 'filterOwnership']);
Route::post('primary/school/enrolment/ownership/advanced-filter', [PrimaryEnrolmentSchoolOwnershipApi::class, 'advancedFilter']);
Route::get('primary/school/enrolment/class/year', [PrimarySchoolEnrolmentClassYearApi::class, 'index']);

Route::post('filter/primary/school/enrolment/class/year', [PrimarySchoolEnrolmentClassYearApi::class, 'filterClass']);
Route::post('primary/enrolment/age/advanced-filter', [PrimaryEnrolmentAgeApi::class, 'advancedFilter']);


Route::post('primary/none-teaching-staff/advanced-filter',[PrimaryNoneTeachingStaffApi::class, 'advancedFilter']);





Route::post('primary/school/enrolment/class/year/advanced-filter', [PrimarySchoolEnrolmentClassYearApi::class, 'advancedFilter']);



//teacher
Route::get('primary/school/teacher/payroll', [PrimaryTeacherPayRollApi::class, 'index']);
//filterpayroll
Route::post('filter/primary/school/teacher/payroll', [PrimaryTeacherPayRollApi::class, 'filterpayroll']);

Route::post('primary/school/teacher/payroll/advanced-filter', [PrimaryTeacherPayRollApi::class, 'advancedFilter']);

Route::get('primary/teacher/gender/qualification', [PrimaryTeacherGenderQualificationApi::class, 'index']);

Route::post('filter/primary/teacher/gender/qualification', [PrimaryTeacherGenderQualificationApi::class, 'filterQualification']);


Route::post('primary/teacher/gender/qualification/advanced-filter', [PrimaryTeacherGenderQualificationApi::class, 'advancedFilter']);

Route::get('primary/teacher/gender/qualification/region',[PrimaryTeacherGenderQualificationRegionApi::class, 'index']);


Route::post('filter/primary/teacher/gender/qualification/region',[PrimaryTeacherGenderQualificationRegionApi::class, 'filterQualification']);



Route::post('primary/teacher/gender/qualification/region/advanced-filter',[PrimaryTeacherGenderQualificationRegionApi::class, 'advancedFilter']);


//school type API
Route::get('primary/school/type', [PrimarySchoolBorderStatusApi::class, 'index']);
Route::get('primary/school/type/advanced-filter', [PrimarySchoolBorderStatusApi::class, 'advancedFilter']);

Route::get('primary/school/type/region', [PrimarySchoolBoarderStatusByRegionAPI::class, 'index']);
Route::post('primary/school/type/region/advanced-filter', [PrimarySchoolBoarderStatusByRegionAPI::class, 'advancedFilter']);


Route::post('filter/primary/school/type/region', [PrimarySchoolBoarderStatusByRegionAPI::class, 'filterRegion']);



Route::post('users/active/menu/get',[UserMenuApi::class, 'getMenuItem']);


//water source

Route::get('primary/school/distance/water/source',[PrimarySchoolWaterSourceDistanceApi::class, 'index']);


Route::post('filter/primary/school/distance/water/source',[PrimarySchoolWaterSourceDistanceApi::class, 'filter']);


Route::post('primary/school/distance/water/source/advanced-filter',[PrimarySchoolWaterSourceDistanceApi::class, 'advancedFilter']);



Route::get('primary/none-teaching-staff',[PrimaryNoneTeachingStaffApi::class, 'index']);

Route::post('filter/primary/none-teaching-staff',[PrimaryNoneTeachingStaffApi::class, 'filternoneTeaching']);






//search
Route::post('search/primary/enrolment/nationality-class', [PrimaryEnrolmentNationalityClassApi::class, 'searchNationality']);
Route::post('search/primary/enrolment/nationality-age', [PrimaryEnrolmentNationalityAgeApi::class, 'searchApi']);



Route::post('search/primary/school/distribution/category', [PrimarySchoolDistributionByRegionFoundedBodyApi::class, 'searchRegion']);

Route::post('search/primary/school/distribution/school_region', [PrimaryDistributionBySchoolRegionApi::class, 'searchFounder']);



Route::post('search/primary/enrolment/age', [PrimaryEnrolmentAgeApi::class, 'searchClass']);

//filter
Route::post('filter/primary/enrolment/nationality-age', [PrimaryEnrolmentNationalityAgeApi::class, 'filterApi']);


Route::post('filter/primary/school/distribution/school_region', [PrimaryDistributionBySchoolRegionApi::class, 'filterFounder']);


Route::post('filter/primary/enrolment/region/class', [  PrimaryEnrolmentDistrictClassApi::class, 'filterRegion']);

Route::post('filter/primary/enrolment/nationality-class', [PrimaryEnrolmentNationalityClassApi::class, 'filterNationality']);

Route::post('filter/primary/school/distribution/region', [PrimarySchoolDistributionApi::class, 'filterRegion']);


Route::post('filter/primary/enrolment/age', [PrimaryEnrolmentAgeApi::class, 'filterClassApi']);

Route::post('filter/primary/school/distribution/category', [PrimarySchoolDistributionByRegionFoundedBodyApi::class, 'filterRegion']);




//primary records api
Route::get('primary/enrolment/region', [PrimaryEnrolmentRegionApi::class, 'EnrolmentByRegionApi']);

Route::post('primary/enrolment/region/advanced-filter', [PrimaryEnrolmentRegionApi::class, 'advancedFilter']);

Route::get('primary/enrolment/years', [PrimaryEnrolmentRegionApi::class, 'GetEnrollmentYears']);



Route::get('users/tab/menu', [UserMenuApi::class, 'index']);
Route::post('users/tab/menu/add', [UserMenuApi::class, 'store']);
Route::post('users/tab/menu/get', [UserMenuApi::class, 'show']);
Route::post('users/tab/menu/delete', [UserMenuApi::class, 'delete']);
Route::post('users/tab/menu/clear', [UserMenuApi::class, 'clearMenuApi']);

//Route::get('/student/house',[StudentHouseController::class,'index']);


Route::post('/user/login', 'LoginApiController@Login');
Route::get('primary/enrolment/region/class', [PrimaryEnrolmentDistrictClassApi::class, 'index']);
Route::post('primary/enrolment/region/class/advanced-filter', [PrimaryEnrolmentDistrictClassApi::class, 'advancedFilter']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/students/registration', [StudentRegistrationController::class, 'index']);
    Route::get('/teachers/registration', [TeachersRegistrationController::class, 'index']);
    Route::get('/academic/institutions', [AcademicInstitutionsController::class, 'index']);
    Route::get('/school/Enrolment', [AgeSchoolEnrolmentController::class, 'index']);
    Route::get('/school/district-enrolment', [ClassDistrictEnrolmentController::class, 'index']);
    Route::get('/school/Contacts', [ContactsController::class, 'index']);
    Route::get('/districts', [DistrictController::class, 'index']);
    Route::get('/school/districts', [DistrictSchoolEnrolmentController::class, 'index']);
    Route::get('/school/instructional', [InstructionalMaterialController::class, 'index']);
    Route::get('/sanitation', [SanitationFacilityController::class, 'index']);
    Route::get('/school/class', [SchoolClassController::class, 'index']);
    Route::get('/school/infrastructure', [SchoolInfrastructureController::class, 'index']);
    Route::get('/sports/facility', [SportsFacilityController::class, 'index']);
    Route::get('/student/house', [StudentHouseController::class, 'index']);




    Route::get('primary/enrolment/district', [PrimaryEnrolmentDistrictApi::class, 'index']);
    //search
    Route::post('search/primary/enrolment/region/class', [PrimaryEnrolmentDistrictClassApi::class, 'searchRegion']);


    // Route::post('search/primary/enrolment/nationality-class', [SearchPrimaryEnrolmentNationalityClass::class, 'index']);
    // Route::post('search/primary/enrolment/district', [SearchPrimaryEnrolmentDistrict::class, 'index']);
    // Route::post('search/primary/enrolment/nationality-age', [SearchPrimaryEnrolmentNationalityAge::class, 'index']);
    //filter




    // Route::post('filter/primary/enrolment/nationality-class', [SearchPrimaryEnrolmentNationalityClass::class, 'filterClassnationality']);
    // Route::post('filter/primary/enrolment/age', [SearchPrimaryEnrolmentAge::class, 'classFilter']);
    // Route::post('filter/primary/enrolment/nationality-age', [SearchPrimaryEnrolmentNationalityAge::class, 'filterNationalityAge']);
    // Route::post('filter/primary/enrolment/district', [SearchPrimaryEnrolmentDistrict::class, 'filterRegion']);
    Route::get('/user/logout', 'LoginApiController@logout');


});
