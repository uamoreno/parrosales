@extends('layout',['current_page'=>'Products'])
@extends('product.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>New Product<h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" >Name</label>
                <input type="text" class="form-control" name="name"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Description</label>
                <input type="text" class="form-control" name="description"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Price</label>
                <input type="decimal" class="form-control" name="price"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Weigth</label>
                <input type="decimal" class="form-control" name="weight"  >
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
            <a href="{{ route('product.index') }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    </div>

@endsection
