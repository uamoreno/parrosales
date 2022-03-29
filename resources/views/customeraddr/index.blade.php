@extends('layout',['current_page'=>'Customer addresses'])
@extends('customeraddr.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>{{ $customer->name }} Addresses</h2>
        </div>
    </div>

    <div class="row ">
        <div class="col-12">
            <a href="{{ route('customeraddr.create',$customer) }}" class="btn btn-danger">
                New Address <i class="fa fa-plus"></i></a>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Zip code</th>
                    <th>Options</th>

                </tr>
            </thead>
            @foreach($list as $item)
            <tr>
                <td>{{ $item->street }}</td>
                <td>{{ $item->city }}</td>
                <td>{{ $item->state }}</td>
                <td>{{ $item->country }}</td>
                <td>{{ $item->zip_code }}</td>
                <th>
                    <form action="{{ route('customeraddr.destroy',['customer'=>$customer,'customeraddr'=>$item]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success" href="{{ route('customeraddr.edit',['customer'=>$customer,'customeraddr'=>$item]) }}"><i class="fa fa-pencil"></i></a>

                        <button class="btn btn-danger"  type="submit" ><i class="fa fa-close"></i></button>

                    </form>
                </th>
            </tr>
            @endforeach

        </table>



      </div>

    </div>
  </div>

  <div class="row ">
    <div class="col-12">
        <div class="text-center">
            <a href="{{ route('customer.index') }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    </div>

@endsection
