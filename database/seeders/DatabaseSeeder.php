<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(PrimarySchoolReportsSeeder::class);
         $this->call(AdminUnitsSeeder::class);
         //$this->call(PrimarySchool::class);
         $this->call(SampleDataSeeder::class);
    }
}
