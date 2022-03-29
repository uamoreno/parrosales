@extends('layout',['current_page'=>'Products'])
@extends('product.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>Edit Product: {{  $product->name }}<h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('product.update',$product) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label" >Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name',$product->name) }}"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Description</label>
                <input type="text" class="form-control" name="description" value="{{ old('description',$product->description) }}" >
            </div>
            <div class="form-group">
                <label class="form-label" >price</label>
                <input type="decimal" class="form-control" name="price" value="{{ old('price',$product->price) }}" >
            </div>
            <div class="form-group">
                <label class="form-label" >Weigth</label>
                <input type="decimal" class="form-control" name="weight" value="{{ old('weight',$product->weight) }}" >
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
