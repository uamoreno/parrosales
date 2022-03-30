@extends('layout',['current_page'=>'Order details'])
@extends('orderdetail.layout')


@section('content')
<div class="container">

    <div class="card">
        <div class="card-header"><h3>Order No. {{ $order->id }} Items - {{ $order->customer->name }}</h3></div>
        <div class="card-body">
            <a href="{{ route('orderdetail.create',$order) }}" class="btn btn-danger">
                New item <i class="fa fa-plus"></i></a>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">Results</div>
      <div class="card-body">
        <table class="table table-striped align-items-center mb-0">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Value</th>
                    <th>Subtotal</th>
                    <th>Options</th>

                </tr>
            </thead>
            <tbody>
            @foreach($list as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->subtotal }}</td>

                <th>
                    <form action="{{ route('orderdetail.destroy',['order'=>$order,'orderdetail'=>$item]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success" href="{{ route('orderdetail.edit',['order'=>$order,'orderdetail'=>$item]) }}"><i class="fa fa-pencil"></i></a>

                        <button class="btn btn-danger"  type="submit" ><i class="fa fa-close"></i></button>

                    </form>
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>



      </div>

    </div>
    <div class="card-footer">
        <div class="text-center">
            <a href="{{ route('order.index') }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
  </div>


@endsection
