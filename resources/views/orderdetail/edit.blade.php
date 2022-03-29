@extends('layout',['current_page'=>'Order Item'])
@extends('orderdetail.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>Edit Order No. {{ $order->id }} Items for {{ $order->customer->name }}</h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('orderdetail.store',$order) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label" >Item</label>
               <select name="product_id">
                   @foreach($products as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $orderdetail->product_id ? 'selected' : '' }}  >{{ $p->name }} {{ $p->price }}</option>
                   @endforeach
               </select>
            </div>
            <div class="form-group">
                <label class="form-label" >Quantity</label>
                <input type="number" class="form-control" name="quantity" value="{{ old('quantity',$orderdetail->quantity) }}"  >
            </div>
            <br/>
            <div class="text-center">
                <button class="btn btn-success" type="submit">Save</button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </div>

       </form>
    </div>


      </div>

    </div>
  </div>

  <div class="row ">
    <div class="col-12">
        <div class="text-center">
            <a href="{{ route('orderdetail.index',$order) }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    </div>

@endsection
