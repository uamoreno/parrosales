<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddr;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;

class CustomerAddrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {

        return view('customeraddr.index',['list'=>$customer->addresses,'customer'=>$customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('customeraddr.create',['customer'=>$customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Customer $customer)
    {
        $request->validate([
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'zip_code'=>'required',
        ]);

        $addr=new CustomerAddr();
        $addr->street=$request->get('street');
        $addr->city=$request->get('city');
        $addr->state=$request->get('state');
        $addr->country=$request->get('country');
        $addr->customer_id=$customer->id;
        $addr->zip_code=$request->get('zip_code');
        $addr->save();
        return redirect()->route('customeraddr.index',$customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerAddr  $customerAddr
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerAddr $customerAddr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerAddr  $customerAddr
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer,CustomerAddr $customeraddr)
    {
        return view('customeraddr.edit',['customer'=>$customer,'customeraddr'=>$customeraddr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerAddr  $customerAddr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Customer $customer , CustomerAddr $customeraddr)
    {
        $request->validate([
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'zip_code'=>'required',
        ]);
        $customeraddr->street=$request->get('street');
        $customeraddr->city=$request->get('city');
        $customeraddr->state=$request->get('state');
        $customeraddr->country=$request->get('country');
        $customeraddr->customer_id=$customer->id;
        $customeraddr->zip_code=$request->get('zip_code');
        $customeraddr->save();

        return redirect()->route('customeraddr.index',$customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerAddr  $customerAddr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer,CustomerAddr $customeraddr)
    {
        $customeraddr->delete();
        return redirect()->route('customeraddr.index',$customer);
    }
}
