<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{   
    //get customer transactions
    public function getPurchases(Request $r)
    {
        $cid = is_null($r['customerId']) ? null : $r['customerId'];
        $customer = Customers::with('purchases')->find($cid);

        if(!empty($customer))
            return response()-> json($customer);
        else
            return response()-> json(["message"=>"customer not found!"], 404);
    }

    /*
    $comment = Post::find(1)->comments()
                        ->where('title', 'foo')
                        ->first();
    */

}
