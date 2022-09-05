<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name'=>fake()->firstName, 
            'last_name'=>fake()->lastName, 
            'gender'=>["male","female","other"][array_rand([1,2,3])], 
            'date_of_birth'=>fake()->dateTimeThisCentury->format('Y-m-d'), 
            'contact_number' => fake()->phoneNumber,
            'email' => fake()->email, 
        

        ];
    }

}
