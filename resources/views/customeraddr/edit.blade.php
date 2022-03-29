@extends('layout',['current_page'=>'Customer addresses'])
@extends('customeraddr.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>Edit Address for: {{ $customer->name }}<h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('customeraddr.update',['customer'=>$customer,'customeraddr'=>$customeraddr]) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label" >Street</label>
                <input type="text" class="form-control" name="street" value="{{ old('street',$customeraddr->street) }}"  >
            </div>
            <div class="form-group">
                <label class="form-label" >City</label>
                <input type="text" class="form-control" name="city" value="{{ old('street',$customeraddr->city) }}" >
            </div>
            <div class="form-group">
                <label class="form-label" >State</label>
                <input type="emtextail" class="form-control" name="state" value="{{ old('street',$customeraddr->state) }}" >
            </div>
            <div class="form-group">
                <label class="form-label" >Country</label>
                <input type="text" class="form-control" name="country" value="{{ old('street',$customeraddr->country) }}"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Zip code</label>
                <input type="text" class="form-control" name="zip_code" value="{{ old('street',$customeraddr->zip_code) }}" >
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
            <a href="{{ route('customeraddr.index',$customer) }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    </div>

@endsection
