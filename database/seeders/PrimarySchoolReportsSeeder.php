<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->truncateStaticTables();
        DB::unprepared(file_get_contents(base_path('uploads/tables/primary_enrolment_district.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/primary_enrolment_nationality_age.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/primary_enrolment_nationality_class.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/primary_enrolment_region.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/primary_enrolment_age.sql')));


    }


    public function truncateStaticTables()
    {
        DB::table('primary_enrolment_district')->truncate();
        // DB::table('primary_enrolment_nationality_age')->truncate();
        // DB::table('primary_enrolment_nationality_class')->truncate();
        // DB::table('primary_enrolment_region')->truncate();
    }
}
