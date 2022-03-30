@extends('layout',['current_page'=>'Products'])
@extends('product.layout')



@section('content')
<div class="container">

    @if(session()->has('errors'))
        <div class="alert alert-danger">
            <p><strong>We found a problem: </strong> {{ $errors }}</p>
        </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        <p><strong>Done: </strong> {{ session()->get('success') }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <button role="link" onclick="location.href='/product/create'" class="btn btn-danger">New Product <i class="fa fa-plus"></i></button>
        </div>
    </div>
    <br/>

    <div class="card">
    <div class="card-header">Results</div>
      <div class="card-body">

        <table class="table table-striped align-items-center mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Weight</th></tr>
            </thead>
            <tbody>
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
            <tbody>
        </table>



      </div>

    </div>
  </div>
@endsection
