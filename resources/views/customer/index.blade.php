@extends('layout',['current_page'=>'Customers'])
@extends('customer.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <button role="link" onclick="location.href='/customer/create'" class="btn btn-danger">New Customer <i class="fa fa-plus"></i></button>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">


        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Operations</th></tr>
            </thead>
            @foreach($customers as $cus)
            <tr>
                <td>{{ $cus->id }}</td>
                <td>{{ $cus->name }}</td>
                <td>{{ $cus->phone }}</td>
                <td>{{ $cus->email }}</td>
                <th>
                    <form action="{{ route('customer.destroy',$cus->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-warning" href="{{ route('customeraddr.index',$cus) }}"><i class="fa fa-home"></i></a>
                        <a class="btn btn-success" href="{{ route('customer.edit',$cus->id) }}"><i class="fa fa-pencil"></i></a>

                        <button class="btn btn-danger"  type="submit" ><i class="fa fa-close"></i></button>

                    </form>
                </th>
            </tr>
            @endforeach

        </table>



      </div>

    </div>
  </div>
@endsection
