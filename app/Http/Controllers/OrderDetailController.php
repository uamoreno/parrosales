<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        $order->customer();
        return view('orderdetail.index',['list'=>$order->details,'order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $order->customer();
        $products=Product::get();
        return view("orderdetail.create",['order'=>$order,'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Order $order)
    {
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required'
        ]);

        $product=Product::select('price')->where('id',$request->get('product_id'))->get();

        $item=new OrderDetail();
        $item->order_id=$order->id;
        $item->product_id=$request->get('product_id');
        $item->quantity=$request->get('quantity');
        $item->value=$product->get(0)->price;
        $item->subtotal=$product->get(0)->price*$request->get('quantity');
        $item->save();

        return redirect()->route('orderdetail.index',$order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order,OrderDetail $orderdetail)
    {
        $order->customer();
        $products=Product::get();
        return view("orderdetail.edit",['order'=>$order,'orderdetail'=>$orderdetail,'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order,OrderDetail $orderDetail)
    {
        $orderDetail->delete();
    }
}
