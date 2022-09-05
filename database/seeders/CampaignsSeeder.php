<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaigns;
use App\Models\Customers;

class CampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Campaigns::create([
            'name'=>$faker->sentence, 
            'active'=>0, 
            'purchase_validity_days'=>$faker->numberBetween(10, 365),
            'purchase_count_min' => $faker->numberBetween(1, 10),
            'purchase_total_value_min' => $faker->numberBetween(10, 1000),
            'redemption_per_customer' => $faker->numberBetween(1, 5)
        ]);
        
    }

    public function oneCustomer()
    {
        $faker = \Faker\Factory::create();

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
