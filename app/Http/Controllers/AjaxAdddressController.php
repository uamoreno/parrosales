<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddr;
use Illuminate\Http\Request;

class AjaxAdddressController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($customer_id)
    {
        $address['data']=CustomerAddr::select('id','street','state','city','country')
            ->where('customer_id',$customer_id)
            ->get();
        return response()->json($address);

    }
}
