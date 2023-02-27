<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimarySchool extends Seeder
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
        DB::unprepared(file_get_contents(base_path('uploads/tables/primary_school.sql')));
    }


    public function truncateStaticTables()
    {
        DB::table('primary_school')->truncate();
    }
}
