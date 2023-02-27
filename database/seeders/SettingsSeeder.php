<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateStaticTables();


        DB::table('settings_gender')->insert([
            [
                'id' => 1,
                'gender' => 'Male',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'gender' => 'Female',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('settings_nationality')->insert([
            [
                'id' => 1,
                'name' => 'Ugandans',
                'national_code' => '00',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'name' => 'Kenyans',
                'national_code' => '01',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 3,
                'name' => 'Tanzanians',
                'national_code' => '02',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 4,
                'name' => 'Rwandese',
                'national_code' => '03',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 5,
                'name' => 'Burundians',
                'national_code' => '04',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 6,
                'name' => 'Sudanese',
                'national_code' => '05',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 7,
                'name' => 'Congolese',
                'national_code' => '06',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 8,
                'name' => 'Rest of Africa',
                'national_code' => '07',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 9,
                'name' => 'Others',
                'national_code' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 10,
                'name' => 'European Union',
                'national_code' => '08',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 11,
                'name' => 'Rest of Europe',
                'national_code' => '09',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 12,
                'name' => 'India Sub-Continent',
                'national_code' => '10',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 13,
                'name' => 'Middle East',
                'national_code' => '11',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 14,
                'name' => 'Far East',
                'national_code' => '12',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 15,
                'name' => 'South America',
                'national_code' => '13',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 16,
                'name' => 'North America',
                'national_code' => '14',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 17,
                'name' => 'Oceania',
                'national_code' => '15',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);

        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblschoolregion.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblstatusofschool.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblschoolgender.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblschregistrystatus.sql')));

        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntbldistancetonearestschool.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntbldistancetonearestwatersource.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblfoundingbody.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblfundingsource.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblintinspectiondeolastyear.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntbledulevel.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntbleducationgrade.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntbldistancetodeooffice.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblschooltype.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblsubject.sql')));
        DB::unprepared(file_get_contents(base_path('uploads/tables/settings/ntblage.sql')));

    }


    public function truncateStaticTables()
    {
        DB::table('primary_school')->truncate();
        DB::table('settings_gender')->truncate();
        DB::table('settings_age')->truncate();
        DB::table('settings_nationality')->truncate();
    }
}
