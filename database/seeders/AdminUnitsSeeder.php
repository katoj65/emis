<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUnitsSeeder extends Seeder
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
        DB::unprepared(file_get_contents(base_path('uploads/tables/admin_units/ntblregion.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/admin_units/ntbldistricts.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/admin_units/ntblcounty.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/admin_units/ntblsubcounty.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/admin_units/ntblparishward.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/admin_units/ntblvillage.sql')));
    }


    public function truncateStaticTables()
    {
        DB::table('primary_school')->truncate();
    }
}
