<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $array=['admin','member'];
        $k=array_rand($array);
        $role=$array[$k];      
        $name=$this->faker->name(); 
        return [
            'username' => $this->faker->userName(),
            'fullname' => $name,
            'password' => bcrypt("password"), // password
            'role' => $role,
            'slug' => Str::slug($name),
            'profile_picture' => 'default_profile.png',
            'level' => 0,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
