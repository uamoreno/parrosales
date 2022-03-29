@extends('layout',['current_page'=>'Customers'])
@extends('customer.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>New Customer<h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" >Name</label>
                <input type="text" class="form-control" name="name"  >

            </div>
            <div class="form-group">
                <label class="form-label" >Phone</label>
                <input type="phone" class="form-control" name="phone"  >

            </div>
            <div class="form-group">
                <label class="form-label" >Email</label>
                <input type="email" class="form-control" name="email"  >

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
            <a href="{{ route('customer.index') }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    </div>

@endsection
