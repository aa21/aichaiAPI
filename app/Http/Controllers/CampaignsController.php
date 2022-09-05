<?php

namespace App\Http\Controllers;

use App\Models\Campaigns;
use App\Models\Customers;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
 
    public function eligibleCheck(Request $r){
        
        $customerId = is_null($r['customerId']) ? null : $r['customerId'];
        $campaignId = is_null($r['campaignId']) ? null : $r['campaignId'];

        if(is_null($customerId) || is_null($campaignId)) 
            return response()-> json(["message"=>"Missing Customer Id or Campaign Id."], 404);
 
        $customer = Customers::with('purchases')->find($customerId);
        if(is_null($customer)) 
            return response()-> json(["message"=>"Customer does not exist."], 404);

        $campaign = Campaigns::find($campaignId);
        if(is_null($campaign)) 
            return response()-> json(["message"=>"Campaign does not exist."], 404);

    }

    public function index(Request $r){
        $campaigns = Campaigns::all();
        return response()->json($campaigns);        
    }

    public function show(Request $r){
        $cid = is_null($r['campaignId']) ? null : $r['campaignId'];
        $campaign = Campaigns::find($cid);
        if(!empty($campaign))
            return response()-> json($campaign);
        else
            return response()-> json(["message"=>"campaign not found!"], 404);
    }
    public function store(Request $r){}
    public function update(Request $r){}
    public function destroy(Request $r){}
}
