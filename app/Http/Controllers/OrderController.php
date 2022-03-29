<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Order::latest()->paginate(20);

        foreach($list as $item){
            $item->customer();
            $item->customeraddrs();
        }

        return view('order.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::latest()->paginate(100);
        return view('order.create',['customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
            'customeraddrs_id'=>'required',
            'payment_type'=>'required'
        ]);
        $order=new Order();
        $order->customer_id=$request->get('customer_id');
        $order->customeraddrs_id=$request->get('customeraddrs_id');
        $order->payment_type=$request->get('payment_type');
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers=Customer::latest()->paginate(100);
        $order->customer();
        $order->customeraddrs();
        return view('order.edit',['order'=>$order,'customers'=>$customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id'=>'required',
            'customeraddrs_id'=>'required',
            'payment_type'=>'required'
        ]);
        $order->customer_id=$request->get('customer_id');
        $order->customeraddrs_id=$request->get('customeraddrs_id');
        $order->payment_type=$request->get('payment_type');
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
