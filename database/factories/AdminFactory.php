<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Adam',
            'phone' => '08913x', // password
        ];
    }
}
