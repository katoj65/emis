<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EnrolmentByClassAgeModel;
use App\Models\RegionModel;
Use App\Models\DistrictModel;
use App\Models\PrimaryEnrolmentRegionModel;
use App\Models\PrimarySchoolModel;
use App\Models\AdminUnitsRegionModel;
use App\Models\PrimaryEnrolmentAgeModel;
use App\Models\SchoolModel;
use App\Models\PrimaryEnrolmentDistrictModel;
use App\Models\settings_education_grade;
use App\Models\settings_education_level;
use App\Traits\Settings;
use App\Models\settings_age;
use App\Models\SettingsNationalityModel;
use App\Models\EnrolmentByNationalityModel;
use App\Models\PrimaryEnrolmentNationalityAgeModel;
use App\Models\PrimaryEnrolmentNationalityClassModel;
use App\Models\SchoolYearModel;
use App\Models\PrimarySchoolDistributionModel;
use App\Models\SchoolDistributionRegionModel;
use App\Models\PrimaryEnrolmentSchoolFounderGenderModel;
use App\Models\PrimaryEnrolmentSchoolClassYearModel;
use App\Models\PrimarySchool;
use App\Models\PrimaryTeacherPayrollModel;
use App\Models\PrimarySchoolBorderStatusModel;
use App\Models\PrimaryTeacherSchoolGenderRegionModel;
use App\Models\primarySchoolStatusByRegionModel;
use App\Models\PrimaryTeacherGenderOwnershipModel;
use App\Models\PrimaryTeacherGenderQualificationModel;
use App\Models\PrimaryTeacherGenderQualificationRegionModel;
use App\Models\PrimarySchoolWaterSourceDistanceModel;
use App\Models\PrimaryNoneTeachingStaffModel;
use App\Models\PrimarySchoolLicensedModel;
use App\Models\PrimarySchoolTeachingMaterialModel;
use App\Models\PrimaryTextbooksModel;


use Illuminate\Support\Facades\DB;
use PrimaryEnrolmentAge;
use PrimaryEnrolmentRegion;
use PrimarySchoolDistributionBySchoolRegion;
use PrimarySchoolTeachingMaterial;
use PrimaryTextBooks;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//delete apis

public function deleteAllModels(){
    PrimaryEnrolmentRegionModel::truncate();
    PrimaryEnrolmentAgeModel::truncate();
    PrimaryEnrolmentDistrictModel::truncate();
    PrimaryEnrolmentNationalityClassModel::truncate();
    PrimaryEnrolmentNationalityAgeModel::truncate();
    return ('successfully deleted data');
}






//populate primary enrolment region table
public function populate_primary_enrolment_region(){
PrimaryEnrolmentRegionModel::truncate();
ini_set('memory_limit',-1);
ini_set('max_execution_time', '5000');
//if the recipient table has no data

$get=DB::select('
select sum(males) as males,
sum(females) as females,
enrolment_year,
district,
region
from primary_enrolment_by_class_age_data
left join settings_education_grade on primary_enrolment_by_class_age_data.class=settings_education_grade.id
where settings_education_grade.education_level_id=2 and enrolment_year IS NOT NULL
group by enrolment_year,region,district
');


foreach($get as $list){
    $insert=[
    'region'=>$list->region,
    'district'=>$list->district,
    'males'=>$list->males,
    'females'=>$list->females,
    'enrolment_year'=>$list->enrolment_year
    ];
    PrimaryEnrolmentRegionModel::insert($insert);
    }

return (count($get).' Records added');

}











//new table

public function populatePrimaryEnrolmentDistrict(){
PrimaryEnrolmentDistrictModel::truncate();
ini_set('memory_limit',-1);
ini_set('max_execution_time', '5000');
$get=DB::select('
select sum(males)as males,
sum(females) as females,
enrolment_year,
class,
district,
region
from primary_enrolment_by_class_age_data
join settings_education_grade on primary_enrolment_by_class_age_data.class
where settings_education_grade.education_level_id=2
group by enrolment_year,class,district,region
');

if(count($get)>0){
foreach($get as $list){
$insert=[
'region'=>$list->region,
'district'=>$list->district,
'class'=>$list->class,
'males'=>$list->males,
'females'=>$list->females,
'enrolment_year'=>$list->enrolment_year
];

PrimaryEnrolmentDistrictModel::insert($insert);
}
return(count($get).' Records have been added');
}else{
return ('No data in the base table');
}


}









//populate primary_enrolment_age table
public function populate_primary_enrolment_age_table(){
PrimaryEnrolmentAgeModel::truncate();
ini_set('max_execution_time', '5000');
ini_set('memory_limit',-1);

$classes=DB::select('select sum(males) as males,sum(females) as females,age,class,enrolment_year
from primary_enrolment_by_class_age_data
left join settings_education_grade on primary_enrolment_by_class_age_data.class=settings_education_grade.id
where enrolment_year IS NOT NULL and settings_education_grade.education_level_id=2
group by age,class,enrolment_year');

foreach($classes as $class){
$insert=[
'class'=>$class->class,
'age'=>$class->age,
'males'=>$class->males,
'females'=>$class->females,
'enrolment_year'=>$class->enrolment_year
];

PrimaryEnrolmentAgeModel::insert($insert);
}
return(count($classes).' Records added to primary_enrolment_by_age table');


}







//seeding table primary enrolment by class and nationality.
public function populate_primary_enrolment_by_nationality_class_table(){
PrimaryEnrolmentNationalityClassModel::truncate();
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', '5000');

    $nationality=DB::select('
    select sum(males) as males,
    sum(females) as females,
    enrolment_year,
    class,
    nationality
    from primary_enrolment_by_nationality_class_data
    group by enrolment_year,class,nationality
    ');


foreach($nationality as $list){
$insert=[
'nationality'=>$list->nationality,
'class'=>$list->class,
'males'=>$list->males,
'females'=>$list->females,
'enrolment_year'=>$list->enrolment_year
];
PrimaryEnrolmentNationalityClassModel::insert($insert);
}

return (count($nationality).' Records have been added primary_enrolment_by_nationality_class_table');


}








//populate table primary_enrolment_nationality_age with data
public function populate_primary_enrolment_nationality_age_table(){
$response=EnrolmentByNationalityModel::
select('enrolment_by_nationality.intEnrolByNationMaleStuCount',
'enrolment_by_nationality.intEnrolByNationFeMaleStuCount',
'settings_nationality.id',
'settings_nationality.name',
'settings_age.age',
'school_year.school_year'
)
->distinct()
->whereBetween('settings_age.id',[4,13])
->join('settings_nationality','enrolment_by_nationality.intNationalityId','=','settings_nationality.id')
->join('enrolment_by_class_age','enrolment_by_nationality.intSchoolId','=','enrolment_by_class_age.school_id')
->join('settings_age','enrolment_by_class_age.age_id','=','settings_age.id')
->join('school','enrolment_by_nationality.intSchoolId','=','school.id')
->join('school_year','school.intSchoolYearID','=','school_year.id')
->limit(20)
->orderBy('age','ASC')
->get();

if(count($response)>0){
foreach($response as $item){
$insert=[
'nationality'=>$item->id,
'age'=>$item->age,
'males'=>$item->intEnrolByNationMaleStuCount,
'females'=>$item->intEnrolByNationFeMaleStuCount,
'enrolment_year'=>$item->school_year
];

$post[]=PrimaryEnrolmentNationalityAgeModel::insert($insert);

}

}
else{
    return 'Could not find data';
}

return count($post).' Records have been added to primary_enrolment_nationality_age_table';

}










public function populatePrimarySchoolOwnershipGenderApi(){
    PrimaryEnrolmentSchoolFounderGenderModel::truncate();
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', '5000');

$get=DB::select('
select sum(primary_males_females.Males) as males,
sum(primary_males_females.Females) as females,
school_year.school_year as enrolment_year,
admin_units_districts.id as district,
admin_units_districts.region_id as region,
settings_founding_body.id as founder
from primary_males_females
left join school on primary_males_females.school_id=school.id
left join school_year on school.intSchoolYearID=school_year.id
left join admin_units_districts on school.intDistrictId=admin_units_districts.id
left join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id
where school.id IS NOT NULL
group by school_year.school_year,admin_units_districts.region_id,admin_units_districts.id, settings_founding_body.id
');

if(count($get)){
foreach($get as $list){
$insert=['region'=>$list->region,
'district'=>$list->district,
'founder'=>$list->founder,
'males'=>$list->males,
'females'=>$list->females,
'enrolment_year'=>$list->enrolment_year];
PrimaryEnrolmentSchoolFounderGenderModel::insert($insert);
}
return (count($get).' Records added');
}else{
return('No data in the main table');
}

}

//



public function populatePrimarySchoolClassYearApi(){
    PrimaryEnrolmentSchoolClassYearModel::truncate();
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', '5000');

$get=DB::select('
select sum(males) as males,
sum(females) as females,
enrolment_year,
district,
region,
class

from primary_enrolment_by_nationality_class_data
group by enrolment_year,district,region,class
');



if(count($get)>0){
foreach($get as $list){
$insert=['region'=>$list->region,
'district'=>$list->district,
'class'=>$list->class,
'males'=>$list->males,
'females'=>$list->females,
'enrolment_year'=>$list->enrolment_year];
PrimaryEnrolmentSchoolClassYearModel::insert($insert);

}


return(count($get).' Records have been added');

}else{
return('No data in the main table');
}






}













//teacher pay roll
public function populatePrimaryTeacherPayRollApi(){
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', '5000');
    PrimaryTeacherPayrollModel::truncate();

//insert where payroll is empty
$get1=DB::select('select sum(teacher_count) as teacher_total,gender,year from primary_teacher_payroll_data where payroll=" " or payroll="NA" or payroll="N/A" or payroll IS null group by year,gender');

$get2=DB::select('
select sum(teacher_count) as teacher_total, gender, year from primary_teacher_payroll_data where payroll IS NOT null and payroll!="" and payroll!="NA" and payroll!="N/A" group by year,gender');

if(count($get1)){
foreach($get1 as $row){
$insert1=['gender'=>$row->gender,'pay_roll'=>'false','teacher_total'=>$row->teacher_total,'school_year'=>$row->year];
PrimaryTeacherPayrollModel::insert($insert1);
}
}


if(count($get2)>0){
foreach($get2 as $row){
$insert2=['gender'=>$row->gender,'pay_roll'=>'true','teacher_total'=>$row->teacher_total,'school_year'=>$row->year];
PrimaryTeacherPayrollModel::insert($insert2);
}
}

return (count($get2)+count($get1).' Records added');

}






//school status

public function populatePrimarySchoolStatusApi(){
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', '5000');
    PrimarySchoolBorderStatusModel::truncate();

$get=DB::select('select school_status, count(id) as school_count, year from primary_school_status_data group by school_status,year');

if(count($get)>0){
    foreach($get as $row){
$insert=['school_status'=>$row->school_status,'school_count'=>$row->school_count,'year'=>$row->year];
PrimarySchoolBorderStatusModel::insert($insert);
    }
}

return(count($get).' Records added');

}







//primary school by status and region
public function populatePrimarySchoolStatusByRegionApi(){
$get=DB::select('select count(`school_id`) as school_count,
school_status,
district,
region,
year
from primary_school_status_data
group by school_status,year,district,region');

if(count($get)>0){
foreach($get as $row){
$insert=['region'=>$row->region,'district'=>$row->district,'school_count'=>$row->school_count,'school_status'=>$row->school_status,'year'=>$row->year];
primarySchoolStatusByRegionModel::insert($insert);

}

return (count($get).' Records added');
}else{
return('No data has been added');
}
}





//primary school registration class
public function populatePrimarySchoolRegistrationClass(){
$get=DB::select('select sum(male_student_count) as males,
sum(female_student_count) as females,
settings_education_grade.id as class,
settings_school_registry_status.id as registration,
settings_founding_body.id as founder,
school_year.school_year as enrolment_year
from enrolment_by_class_age
left join school on enrolment_by_class_age.school_id=school.id
left join settings_education_grade on enrolment_by_class_age.school_education_grade_id=settings_education_grade.id
left join school_year on school.intSchoolYearID=school_year.id
left join settings_school_registry_status on school.intSchRegistryStatusID=settings_school_registry_status.id
left join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id
where settings_education_grade.education_level_id=2
group by settings_education_grade.id,school_year.id,settings_school_registry_status.id,settings_founding_body.id,school_year.school_year');

if(count($get)>0){
foreach($get as $row){
$insert=['class'=>$row->class,'registration'=>$row->registration,'founder'=>$row->founder,'males'=>$row->males,'females'=>$row->females,'school_year'=>$row->enrolment_year];

}
}else{
return('No data found');
}
return(count($get).' Records added');
}









//teacher details
public function teacherSchoolGenderRegion(){
$get=DB::select('select tblteachersdetails.intTeachersDetailsID as teacher_id,
school.id as school,
tblteachersdetails.txtSex as gender,
admin_units_districts.id district,
admin_units_districts.region_id as region,
school_year.school_year
from tblteachersdetails
left join school on tblteachersdetails.intSchoolId=school.id
left join school_year on school.id=school_year.id
left join admin_units_districts on school.intDistrictId=admin_units_districts.id
where school.id IS NOT NULL and school_year.id IS NOT NULL
group by school_year.school_year,school.id,tblteachersdetails.intTeachersDetailsID,admin_units_districts.id,admin_units_districts.region_id,tblteachersdetails.txtSex');

if(count($get)>0){
foreach($get as $row){
$insert=['teacher_id'=>$row->teacher_id,'school'=>$row->school,'gender'=>$row->gender,'district'=>$row->district,'region'=>$row->region,'school_year'=>$row->school_year];
PrimaryTeacherSchoolGenderRegionModel::insert($insert);
}
}else{
return('NO data returned');
}

return(count($get).' Records added');

}








//populate teacher by gender and ownership
public function populatePrimaryTeacherGenderOwnership(){
PrimaryTeacherGenderOwnershipModel::truncate();
ini_set('max_execution_time', '5000');
ini_set('memory_limit',-1);

$get1=DB::select('
select sum(teacher_count) as teacher_total, gender, district, region, year from primary_teacher_payroll_data where payroll=" " or payroll="NA" or payroll="N/A" or payroll IS null group by year,gender,district,region
');

if(count($get1)>0){
foreach($get1 as $row){
$insert=['region'=>$row->region,'district'=>$row->district,'gender'=>$row->gender,'status'=>'private','teacher_count'=>$row->teacher_total,'school_year'=>$row->year];
PrimaryTeacherGenderOwnershipModel::insert($insert);
}
}



$get2=DB::select('select sum(teacher_count) as teacher_total, gender, year, district, region from primary_teacher_payroll_data where payroll IS NOT null and payroll!="" and payroll!="NA" and payroll!="N/A" group by year,gender,district,region');
if(count($get2)>0){
    foreach($get2 as $row){
    $insert=['region'=>$row->region,'district'=>$row->district,'gender'=>$row->gender,'status'=>'government','teacher_count'=>$row->teacher_total,'school_year'=>$row->year];
    PrimaryTeacherGenderOwnershipModel::insert($insert);
    }
    }

    return (count($get1)+count($get2).' Records added');

}











//get teacher by gender and qualification
public function PrimaryTeacherGenderQualificationApi(){
PrimaryTeacherGenderQualificationModel::truncate();
ini_set('max_execution_time', '5000');
ini_set('memory_limit',-1);
$get1=DB::select('select count(intTeachersDetailsID) as teacher_count,
teacher_qualification.intHighestTeachingQualificationId as qualification,
settings_education_level.id as education_level,
tblteachersdetails.txtSex as gender,
school_year.school_year
from tblteachersdetails
left join teacher_qualification on tblteachersdetails.intHighestTeachingQualificationId=teacher_qualification.intHighestTeachingQualificationId
left join school on tblteachersdetails.intSchoolId=school.id
left join school_year on school.intSchoolYearID=school_year.id
left join settings_education_level on tblteachersdetails.intHighestLevelofEducationId=settings_education_level.id
where (school_year.school_year IS NOT NULL and teacher_qualification.intHighestTeachingQualificationId IS NOT NULL)and (tblteachersdetails.txtMPSPayrollComputerNumber="" or tblteachersdetails.txtMPSPayrollComputerNumber="NA" or tblteachersdetails.txtMPSPayrollComputerNumber="N/A" or tblteachersdetails.txtMPSPayrollComputerNumber IS null )and(settings_education_level.id IS NOT NULL)
group by school_year.school_year,teacher_qualification.intHighestTeachingQualificationId,tblteachersdetails.txtSex,settings_education_level.id');
if(count($get1)>0){
foreach($get1 as $row){
$insert=['qualification'=>$row->qualification,'gender'=>$row->gender,'status'=>'private','teacher_count'=>$row->teacher_count,'school_year'=>$row->school_year];
PrimaryTeacherGenderQualificationModel::insert($insert);
}
}



$get2=DB::select('select count(intTeachersDetailsID) as teacher_count,
teacher_qualification.intHighestTeachingQualificationId as qualification,
settings_education_level.id as education_level,
tblteachersdetails.txtSex as gender,
school_year.school_year
from tblteachersdetails
left join teacher_qualification on tblteachersdetails.intHighestTeachingQualificationId=teacher_qualification.intHighestTeachingQualificationId
left join school on tblteachersdetails.intSchoolId=school.id
left join school_year on school.intSchoolYearID=school_year.id
left join settings_education_level on tblteachersdetails.intHighestLevelofEducationId=settings_education_level.id
where (school_year.school_year IS NOT NULL and teacher_qualification.intHighestTeachingQualificationId IS NOT NULL)and (tblteachersdetails.txtMPSPayrollComputerNumber!="" and tblteachersdetails.txtMPSPayrollComputerNumber!="NA" and tblteachersdetails.txtMPSPayrollComputerNumber!="N/A" or tblteachersdetails.txtMPSPayrollComputerNumber IS NOT NULL )and(settings_education_level.id IS NOT NULL)
group by school_year.school_year,teacher_qualification.intHighestTeachingQualificationId,tblteachersdetails.txtSex,settings_education_level.id');
if(count($get2)>0){
    foreach($get2 as $row){
        $insert=['qualification'=>$row->qualification,'gender'=>$row->gender,'status'=>'government','teacher_count'=>$row->teacher_count,'school_year'=>$row->school_year];
        PrimaryTeacherGenderQualificationModel::insert($insert);
    }
    }

return(count($get1)+count($get2).' Records added');

}






//teacher gender qualification Api test
public function populatePrimaryTeacherGenderQualificationRegionApi(){
    PrimaryTeacherGenderQualificationRegionModel::truncate();
    ini_set('max_execution_time', '5000');
    ini_set('memory_limit',-1);

$get=DB::select('select count(tblteachersdetails.intTeachersDetailsID) as teacher_count,
school_year.school_year,
teacher_qualification.intHighestTeachingQualificationId as qualification,
tblteachersdetails.txtSex as gender,
admin_units_districts.id as district,
admin_units_districts.region_id as region
from tblteachersdetails
left join school on tblteachersdetails.intSchoolId=school.id
left join school_year on school.intSchoolYearID=school_year.id
left join teacher_qualification on tblteachersdetails.intHighestTeachingQualificationId=teacher_qualification.intHighestTeachingQualificationId
left join admin_units_districts on school.intDistrictId=admin_units_districts.id
where school_year.school_year IS NOT NULL and teacher_qualification.intHighestTeachingQualificationId IS NOT NULL
group by school_year.school_year,teacher_qualification.intHighestTeachingQualificationId,tblteachersdetails.txtSex,admin_units_districts.id,admin_units_districts.region_id');

if(count($get)>0){
foreach($get as $row){
    $insert=['region'=>$row->region,'district'=>$row->district,'qualification'=>$row->qualification,'gender'=>$row->gender,'teacher_count'=>$row->teacher_count,'school_year'=>$row->school_year];
PrimaryTeacherGenderQualificationRegionModel::insert($insert);
}

}else{
    return('No data has been selected');
}


return(count($get).' Records added');

}









//water source distance
public function populateDistanceWaterSource(){
    PrimarySchoolWaterSourceDistanceModel::truncate();
    ini_set('max_execution_time', '5000');
    ini_set('memory_limit',-1);

$get=DB::select('select count(school.id) as school_count,
school_distance_to_nearest_water_source.id as distance,
settings_school_status.id as status,
school_year.school_year,
admin_units_districts.id as district,
admin_units_districts.region_id as region
from school
left join school_distance_to_nearest_water_source on school.intWaterDistanceID=school_distance_to_nearest_water_source.id
left join school_year on school.intSchoolYearID=school_year.id
left join settings_school_status on school.intStatusOfSchoolID=settings_school_status.id
left join admin_units_districts on school.intDistrictId=admin_units_districts.id
where school_distance_to_nearest_water_source.id IS NOT NULL and settings_school_status.id IS NOT NULL
group by school_distance_to_nearest_water_source.id,school_year.school_year,settings_school_status.id,admin_units_districts.id,admin_units_districts.region_id
');

if(count($get)>0){
foreach($get as $row){
$insert=['region'=>$row->region,
'district'=>$row->district,
'distance'=>$row->distance,
'status'=>$row->status,
'school_count'=>$row->school_count,
'school_year'=>$row->school_year
];
PrimarySchoolWaterSourceDistanceModel::insert($insert);
}

}else{
    return('No data');
}

return(count($get).' REcords added');

}







//populate none teaching staff

public function populatePrimaryNoneTeachingStaff(){
    PrimaryNoneTeachingStaffModel::truncate();
    ini_set('max_execution_time', '5000');
    ini_set('memory_limit',-1);
$get=DB::select('select ntblnonteachingstafftype.intNonTeachingStaffTypeId as role,
sum(tblnonteachingstaffinfo.intMaleStaffCount) as males,
sum(tblnonteachingstaffinfo.intFeMaleStaffCount) as females,
settings_school_status.id as status,
school_year.school_year
from tblnonteachingstaffinfo
left join ntblnonteachingstafftype on tblnonteachingstaffinfo.intNonTeachingStaffTypeId=ntblnonteachingstafftype.intNonTeachingStaffTypeId
left join school on tblnonteachingstaffinfo.intSchoolId=school.id
left join school_year on school.intSchoolYearID=school_year.id
left join settings_school_status on school.intStatusOfSchoolID=settings_school_status.id
where school_year.school_year IS NOT NULL and settings_school_status.id IS NOT NULL
group by ntblnonteachingstafftype.intNonTeachingStaffTypeId,school_year.school_year,settings_school_status.id
');

if(count($get)>0){
foreach($get as $row){
$insert=['role'=>$row->role,'status'=>$row->status,'males'=>$row->males,'females'=>$row->females,'year'=>$row->school_year];
PrimaryNoneTeachingStaffModel::insert($insert);
}
}else{
return('No content');
}
return (count($get).' Records added');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */











    public function show()
    {

$get=SchoolModel::select('school.id','txtSchoolName','school_year','admin_units_districts.id as district','admin_units_districts.region_id as region')
->join('school_year','school.intSchoolYearID','=','school_year.id')
->join('enrolment_by_class_age','school.id','=','enrolment_by_class_age.school_id')
->join('admin_units_districts','school.intDistrictId','=','admin_units_districts.id')
->limit(100)
->groupBy('school.id','txtSchoolName','school_year','admin_units_districts.id','admin_units_districts.region_id')
->get();

foreach($get as $list){
$data[]=array(
'school_id'=>$list->id,
'name'=>$list->txtSchoolName,
'year'=>$list->school_year,
'district'=>$list->district,
'region'=>$list->region,
'males'=>EnrolmentByClassAgeModel::select('male_student_count','settings_education_grade.education_grade','female_student_count')
->distinct()
->join('settings_education_grade','enrolment_by_class_age.school_education_grade_id','=','settings_education_grade.id')
->where('school_id',$list->id)
->orderBy('enrolment_by_class_age.id','DESC')
->limit(7)
->get()

);

}


return $data;










    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






//add data to primary_school_distribution table

public function populate_primary_school_distribution_region(){
PrimarySchoolDistributionModel::truncate();
ini_set('memory_limit',-1);
ini_set('max_execution_time', '5000');
$get=DB::select('select count(school.id) as schools,
school_year.school_year as enrolment_year,
admin_units_districts.id as district,
admin_units_districts.region_id as region,
settings_founding_body.name as founded_by,
settings_school_registry_status.status as registration_status
from school

join school_year on school.intSchoolYearID=school_year.id
join admin_units_districts on school.intDistrictId=admin_units_districts.id
join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id
join settings_school_registry_status on school.intSchRegistryStatusID=settings_school_registry_status.id
join settings_education_level on school.intEduLevelId=settings_education_level.id
where settings_education_level.id=2

group by school_year.school_year,
admin_units_districts.region_id,
settings_founding_body.name,
settings_school_registry_status.status,
admin_units_districts.id

order by school_year.school_year,settings_founding_body.name ASC');
if(count($get)>0){
foreach($get as $row){
$insert=['region'=>$row->region,
'district'=>$row->district,
'school_total'=>$row->schools,
'founded_by'=>$row->founded_by,
'registration_status'=>$row->registration_status,
'enrolment_year'=>$row->enrolment_year];
PrimarySchoolDistributionModel::insert($insert);
}
return(count($get).' Records added have been added');
}else{
return ('No data');
}
}





//2018 data
public function tableData2018(){
PrimaryEnrolmentRegionModel::truncate();
ini_set('memory_limit',-1);
ini_set('max_execution_time', '5000');

    $get=DB::select('select sum(primarySchoolData2018.P1Male+primarySchoolData2018.P2Male+primarySchoolData2018.P3Male+primarySchoolData2018.P4Male+primarySchoolData2018.P5Male+primarySchoolData2018.P6Male+primarySchoolData2018.P7Male) as males,
    sum(primarySchoolData2018.P1Female+primarySchoolData2018.P2Female+primarySchoolData2018.P3Female+primarySchoolData2018.P4Female+primarySchoolData2018.P5Female+primarySchoolData2018.P6Female+primarySchoolData2018.P7Female) as females,
    school_year.school_year as enrolment_year,
    admin_units_districts.id as district,
    admin_units_districts.region_id as region

    from primarySchoolData2018
    join school on primarySchoolData2018.school_id=School.id
    join school_year on school.intSchoolYearID=school_year.id
    join admin_units_districts on school.intDistrictId=admin_units_districts.id

    group by school_year.school_year,admin_units_districts.id,admin_units_districts.region_id');

if(count($get)>0){

    foreach($get as $list){
        $insert=[
        'enrolment_by_class_age_id'=>0,
        'region'=>$list->region,
        'district'=>$list->district,
        'region_status'=>'District',
        'learners_population'=>$list->males+$list->females,
        'enrolment_year'=>$list->enrolment_year
        ];

        PrimaryEnrolmentRegionModel::insert($insert);
        }

    return (count($get).' Records added');


}
}










//school distribution by region
public function schoolDistributionByRegion(){
    PrimaryEnrolmentRegionModel::truncate();
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', '5000');

$get=DB::select('
select count(school.id) as schools,
school_year.school_year as enrolment_year,
school.intSchoolRegionID as region,
settings_founding_body.name as founded_by,
settings_school_region.school_region
from school
join school_year on school.intSchoolYearID=school_year.id
join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id
join settings_school_registry_status on school.intSchRegistryStatusID=settings_school_registry_status.id
join settings_education_level on school.intEduLevelId=settings_education_level.id
join settings_school_region on school.intSchoolRegionID=settings_school_region.id
where settings_education_level.id=2
group by school_year.school_year,
settings_founding_body.name,
settings_school_region.school_region,
school.intSchoolRegionID
order by school_year.school_year,settings_founding_body.name ASC
');


if(count($get)>0){
foreach($get as $list){
$insert=['region'=>$list->region,
'school_region'=>$list->school_region,
'founded_by'=>$list->founded_by,
'school_total'=>$list->schools,
'enrolment_year'=>$list->enrolment_year
];
SchoolDistributionRegionModel::insert($insert);
}

return count($get).' Records added';


}

}





//primary school registration
public function PopulateSchoolLicensedTable(){
$get=DB::select('select count(school.id) as school,
settings_school_registry_status.id as reg_status,
settings_founding_body.id as founder,
school_year.school_year as year
from school
join school_year on school.intSchoolYearID=school_year.id
join settings_school_registry_status on school.intSchRegistryStatusID=settings_school_registry_status.id
join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id
group by school_year.school_year,settings_school_registry_status.id,settings_founding_body.id');

if(count($get)>0){
foreach($get as $list){
$insert=[
'school'=>$list->school,
'reg_status'=>$list->reg_status,
'founder'=>$list->founder,
'year'=>$list->year
];
 PrimarySchoolLicensedModel::insert($insert);
}
    return(count($get).' Records have been added');
}else{
    return('No content');
}
}








//sports functions
public function createSportsFacilities(){
 return('Some information');
}















//delete tables

public function delete_tables(){
DB::select('drop table sports_category;');

}



//gender composition
public function createGenderComposition(){
$get=DB::select('select sum(males)as males,sum(females)as females,class,district,region,
sum(males+females) as total,enrolment_year from primary_enrolment_class_year
group by class,district,region,enrolment_year');
return $get;
}






//primary text books
public function populateTextbooks(){
$get=DB::select('select intTextbooks as textbook,
settings_subject.id as subject,
settings_founding_body.id as founder,
school_year.school_year as year
from primary_teaching_material
join school on primary_teaching_material.intSchoolId=school.id
join school_year on school.intSchoolYearID=school_year.id
join settings_subject on primary_teaching_material.intSubjectId=settings_subject.id
join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id');

if(count($get)>0){
foreach($get as $row){
$insert=['books'=>$row->textbook,'subject'=>$row->subject,'founder'=>$row->founder,'year'=>$row->year];
PrimaryTextbooksModel::insert($insert);
}


return(count($get).' Records added');
}else{
return('No data found');
}
}





//populate learning material
public function populateLearningMaterial(){
    //textbooks
    $get_textbooks=DB::select('select intTextbooks as item,
    settings_subject.id as subject,
    settings_founding_body.id as founder,
    school_year.school_year as year
    from primary_teaching_material
    join school on primary_teaching_material.intSchoolId=school.id
    join school_year on school.intSchoolYearID=school_year.id
    join settings_subject on primary_teaching_material.intSubjectId=settings_subject.id
    join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id');
if(count($get_textbooks)>0){
foreach($get_textbooks as $row){
$insert=['subject'=>$row->subject,'founder'=>$row->founder,'item'=>$row->item,'type'=>'textbook','year'=>$row->year];
PrimarySchoolTeachingMaterialModel::insert($insert);

}
}




//guides
    $get_guides=DB::select('select intGuides as item,
    settings_subject.id as subject,
    settings_founding_body.id as founder,
    school_year.school_year as year
    from primary_teaching_material
    join school on primary_teaching_material.intSchoolId=school.id
    join school_year on school.intSchoolYearID=school_year.id
    join settings_subject on primary_teaching_material.intSubjectId=settings_subject.id
    join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id');

if(count($get_guides)>0){
    foreach($get_textbooks as $row){
    $insert=['subject'=>$row->subject,'founder'=>$row->founder,'item'=>$row->item,'type'=>'guide','year'=>$row->year];
    PrimarySchoolTeachingMaterialModel::insert($insert);
    }
    }

//modules
$get_modules=DB::select('select intModules as item,
settings_subject.id as subject,
settings_founding_body.id as founder,
school_year.school_year as year
from primary_teaching_material
join school on primary_teaching_material.intSchoolId=school.id
join school_year on school.intSchoolYearID=school_year.id
join settings_subject on primary_teaching_material.intSubjectId=settings_subject.id
join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id');

if(count($get_modules)>0){
foreach($get_textbooks as $row){
$insert=['subject'=>$row->subject,'founder'=>$row->founder,'item'=>$row->item,'type'=>'module','year'=>$row->year];
PrimarySchoolTeachingMaterialModel::insert($insert);
}
}


//readers
$get_readers=DB::select('select intClassReaders as item,
settings_subject.id as subject,
settings_founding_body.id as founder,
school_year.school_year as year
from primary_teaching_material
join school on primary_teaching_material.intSchoolId=school.id
join school_year on school.intSchoolYearID=school_year.id
join settings_subject on primary_teaching_material.intSubjectId=settings_subject.id
join settings_founding_body on school.intFoundingBodyID=settings_founding_body.id');


if(count($get_readers)>0){
foreach($get_textbooks as $row){
$insert=['subject'=>$row->subject,'founder'=>$row->founder,'item'=>$row->item,'type'=>'reader','year'=>$row->year];
PrimarySchoolTeachingMaterialModel::insert($insert);
}
}


return count($get_textbooks)+count($get_guides)+count($get_modules)+count($get_readers).' Records added';



}



























}
