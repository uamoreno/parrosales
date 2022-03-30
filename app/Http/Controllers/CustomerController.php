<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddr;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::paginate(20);
        return view('customer.index',compact('customers'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);
        $customer=new Customer();
        $customer->name=$request->get('name');
        $customer->phone=$request->get('phone');
        $customer->email=$request->get('email');
        $customer->save();
        return redirect()->route('customer.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->email=$request->email;

        $customer->save();

        return redirect()->route('customer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try{
            $customer->delete();
        }catch(Exception $ex){
            return redirect()->route('customer.index')->with('errors',"Customer {$customer->name} has orders and can not be deleted.");
        }
        return redirect()->route('customer.index')->with('success',"Customer {$customer->name} deleted.");



    }
}
