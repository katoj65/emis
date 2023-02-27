<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $this->truncateStaticTables();

//create users
        DB::table('users')->insert([
            'first_name' => 'Joshua',
            'last_name' => 'Kato',
            'email' => 'joshua@emis.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),

        ]);


//create users
        DB::table('users')->insert([
            'first_name' => 'Jose',
            'last_name' => 'Setongo',
            'email' => 'joseph@emis.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),

        ]);


//create users
        DB::table('users')->insert([
            'first_name' => 'School',
            'last_name' => 'Test',
            'email' => 'school@emis.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),

        ]);


//create users
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Test',
            'email' => 'admin@emis.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),

        ]);


//create users
        DB::table('users')->insert([
            'first_name' => 'UBOS',
            'last_name' => 'Test',
            'email' => 'ubos@emis.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),

        ]);


//create users
        DB::table('users')->insert([
            'first_name' => 'MOE',
            'last_name' => 'Test',
            'email' => 'moe@emis.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),

        ]);


//User role table


        DB::table('user_role')->insert([
            'user_id' => 1,
            'role' => 'super'
        ]);

        DB::table('user_role')->insert([
            'user_id' => 2,
            'role' => 'super'
        ]);


        DB::table('user_role')->insert([
            'user_id' => 3,
            'role' => 'school'
        ]);

        DB::table('user_role')->insert([
            'user_id' => 4,
            'role' => 'admin'
        ]);

        DB::table('user_role')->insert([
            'user_id' => 5,
            'role' => 'user'
        ]);

        DB::table('user_role')->insert([
            'user_id' => 6,
            'role' => 'admin'
        ]);


    }


    public function truncateStaticTables()
    {
        DB::table('users')->truncate();

    }
}
