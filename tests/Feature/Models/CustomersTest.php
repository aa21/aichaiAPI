<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Customers;
use Database\Seeders\CustomersSeeder;

class CustomersTest extends TestCase
{

//    use RefreshDatabase;
    protected $seed = false;

    public function testGetPurchases(){
        // should fail if customer doesn't exist
        $response = $this->getJson(route('api.customers.getPurchases', [ 'customerId'=>1]));
        $response  
            ->assertStatus(404);

        // seed db
        $this -> seed(CustomersSeeder::class);    
//$customer = Customers::factory() -> create();

        // test customer was inserted
        $response = $this->getJson(route('api.customers.getPurchases', [ 'customerId'=>1]));
        $response  
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
            ]);


        // should get purchase with customer data
        $response  
        ->assertStatus(200)
        ->assertJsonStructure([
            'purchases' => [
                '*' => [
                    'customer_id',
                    'total_spent',
                    'total_saving',
                    'transaction_at',
                ]
            ],
        ]);



    }
 
    
}
