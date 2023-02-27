<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class usersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
'first_name'=>$this->faker->first_name,
'last_name'=>$this->faker->last_name,
'email'=>$this->faker->email,
'password'=>Hash::make('secret'),
'remember_token'=>Str::random(10),
        ];
    }
}
