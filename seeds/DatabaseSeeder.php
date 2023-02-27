<?php

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

//user account
        factory(User::class)->create([
            'first_name' => 'Joshua',
            'last_name' => 'Kato',
            'email' => 'joshua@emis.com',

        ]);

        factory(User::class)->create([
            'first_name' => 'Jose',
            'last_name' => 'Setongo',
            'email' => 'joseph@emis.com',

        ]);


        factory(User::class)->create([
            'first_name' => 'School',
            'last_name' => 'Test',
            'email' => 'school@emis.com',

        ]);



        factory(User::class)->create([
            'first_name' => 'Admin',
            'last_name' => 'Test',
            'email' => 'admin@emis.com',

        ]);



        factory(User::class)->create([
            'first_name' => 'UBOS',
            'last_name' => 'Test',
            'email' => 'ubos@emis.com',

        ]);


//user roles

        DB::table('user_role')->insert([
            'user_id'=>1,
            'role'=>'super'
            ]);

            DB::table('user_role')->insert([
                'user_id'=>2,
                'role'=>'super'
                ]);


                DB::table('user_role')->insert([
                    'user_id'=>3,
                    'role'=>'school'
                    ]);

                    DB::table('user_role')->insert([
                        'user_id'=>4,
                        'role'=>'admin'
                        ]);
                        DB::table('user_role')->insert([
                            'user_id'=>5,
                            'role'=>'user'
                            ]);


    }
}
