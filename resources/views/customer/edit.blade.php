@extends('layout',['current_page'=>'Customers'])
@extends('customer.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>Edit Customer: {{ $customer->name }} <sub>({{ $customer->id }})</sub><h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('customer.update',$customer) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label" >Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name',$customer->name) }}"  >

            </div>
            <div class="form-group">
                <label class="form-label" >Phone</label>
                <input type="phone" class="form-control" name="phone" value="{{ old('phone',$customer->phone) }}" >

            </div>
            <div class="form-group">
                <label class="form-label" >Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email',$customer->email) }}" >

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
