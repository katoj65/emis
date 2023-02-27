<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->truncateStaticTables();
        ini_set('memory_limit',-1);
        DB::unprepared(file_get_contents(base_path('uploads/tables/sample_data/ntblschoolyear.sql')));
//        DB::unprepared(file_get_contents(base_path('uploads/tables/sample_data/tblschool.sql')));
//        DB::unprepared(file_get_contents(base_path('uploads/tables/sample_data/tblenrolmentbyclassage.sql')));
//        DB::unprepared(file_get_contents(base_path('uploads/tables/sample_data/tblenrolmentbynationality.sql')));
    }


    public function truncateStaticTables()
    {
//        DB::table('primary_school')->truncate();
    }
}
