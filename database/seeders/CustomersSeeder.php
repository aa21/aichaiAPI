<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<2; $i++){
            Customers::create([
                'first_name'=>$faker->firstName, 
                'last_name'=>$faker->lastName, 
                'gender'=>["male","female","other"][array_rand([1,2,3])], 
                'date_of_birth'=>$faker->dateTimeThisCentury->format('Y-m-d'), 
                'contact_number' => $faker->phoneNumber,
                'email' => $faker->email, 
            ]);
        }
    }
}
