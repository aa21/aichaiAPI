<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Campaigns;
//use App\Models\Customers;

//use Database\Seeders\CampaignsSeeder;
use Database\Seeders\CustomersSeeder;

class CampaignsTest extends TestCase
{

//    use RefreshDatabase;
    protected $seed = false;

/*     public function testShow(){
        // should fail when campaign doesn't exist in db
        $response = $this->getJson(route('api.campaigns.show', [ 'campaignId'=>1]));
        $response->assertStatus(404);

        $this -> seed(CampaignsSeeder::class);    

        // check campaign was inserted
        $response = $this->getJson(route('api.campaigns.show', [ 'campaignId'=>1]));
        $response->assertStatus(200);

    } */

    public function testEligibleCheck()
    { 
        // should fail if no customerId
        $response = $this->getJson(route('api.campaigns.eligibleCheck', [ 'campaignId'=>3]));
        $response   ->assertStatus(404)
                    ->assertJson(['message' =>  "Missing Customer Id or Campaign Id." ]);

        // should fail if no campaignId
        $response = $this->getJson(route('api.campaigns.eligibleCheck', [ 'customerId'=>3]));
        $response   ->assertStatus(404)
                    ->assertJson(['message' =>  "Missing Customer Id or Campaign Id." ]);
            
        // should return false if customer doesn't exist
        $response = $this->getJson(route('api.campaigns.eligibleCheck', ['customerId'=>21, 'campaignId'=>3]));
        $response   ->assertStatus(404)
                    ->assertJson(['message' =>  "Customer does not exist." ]);
 
        // seed customer table
        //$customer = Customers::factory() -> create();
        $this -> seed(CustomersSeeder::class);    
        //$CampaignsSeeder = new CampaignsSeeder();
        //$this -> seed($CampaignsSeeder->oneCustomer());    
        

        // should return false if campaign doesn't exist
        $response = $this->getJson(route('api.campaigns.eligibleCheck', ['customerId'=>1, 'campaignId'=>3]));
        $response   ->assertStatus(404)
                    ->assertJson(['message' =>  "Campaign does not exist." ]);


        // should return false if customer has <3 valid tns (tn <= 30 days)
        // should return false if sum < $100 for valid tns (tn <= 30 days)
        // should return false if customer redeemAmt =1 for this campaign
        // should return false if customer already has a voucher in active lock (<=10min)

        // should return true if customer's previous lock expired (>10min)
        
        /* On Pass */

        // should set voucher.locked_until value to 10 mins in future
        // should set vouched.locked_for_customer to customer_id
        // should return true if all above passed
    } 

    public function testPhotoUpload(){
        // should fail if no photo data 
        // should fail if no campaignId
        // should fail if invalid campaignId
        // should fail if no customerId
        // should fail if invalid customerId

        // should fail if no valid vocher lock (<=10min) for this customer
        // should fail if lock exists but expired (> 10min) for this customer

        /* On Pass */

        // should set voucher.issued_to_customer as customer_id
        // should set vouched.issued_on as datetime
        // should return Voucher, 200


    }   
}
