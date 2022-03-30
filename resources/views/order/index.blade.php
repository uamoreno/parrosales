@extends('layout',['current_page'=>'Orders'])
@extends('order.layout')


@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            <button role="link" onclick="location.href='/order/create'" class="btn btn-danger">
                Place Order <i class="fa fa-plus"></i></button>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-header">Results</div>
      <div class="card-body">

        <table class="table table-striped align-items-center mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Payment type</th>
                    <th>Date</th>
                    <th>Options</th>
            </thead>
            <tbody>
            @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->customer->name }}</td>
                <td>{{ $item->customeraddrs->street }}</td>
                <td>{{ $item->payment_type }}</td>
                <td>{{ $item->created_at }}</td>
                <th>
                    <form action="{{ route('order.destroy',$item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-warning" href="{{ route('orderdetail.index',$item) }}"><i class="fa fa-list"></i></a>
                       <!-- <a class="btn btn-success" href="{{ route('order.edit',$item) }}"><i class="fa fa-pencil"></i></a>
                       -->
                        <button class="btn btn-danger"  type="submit" ><i class="fa fa-close"></i></button>

                    </form>
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>



      </div>

    </div>
  </div>


@endsection
