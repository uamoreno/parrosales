@extends('layout',['current_page'=>'Products'])
@extends('product.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <button role="link" onclick="location.href='/product/create'" class="btn btn-danger">New Product <i class="fa fa-plus"></i></button>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Weight</th></tr>
            </thead>
            @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->weight }}</td>
                <th>
                    <form action="{{ route('product.destroy',$item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success" href="{{ route('product.edit',$item) }}"><i class="fa fa-pencil"></i></a>

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
