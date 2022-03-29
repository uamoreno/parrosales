@extends('layout',['current_page'=>'Customers'])
@extends('customeraddr.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>New Address for: {{ $customer->name }}<h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('customeraddr.store',$customer) }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" >Street</label>
                <input type="text" class="form-control" name="street"  >
            </div>
            <div class="form-group">
                <label class="form-label" >City</label>
                <input type="text" class="form-control" name="city"  >
            </div>
            <div class="form-group">
                <label class="form-label" >State</label>
                <input type="emtextail" class="form-control" name="state"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Country</label>
                <input type="text" class="form-control" name="country"  >
            </div>
            <div class="form-group">
                <label class="form-label" >Zip code</label>
                <input type="text" class="form-control" name="zip_code"  >
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
