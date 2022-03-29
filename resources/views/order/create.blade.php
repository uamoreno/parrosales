@extends('layout',['current_page'=>'Orders'])
@extends('order.layout')


@section('content')
<div class="container">

    <div class="row ">
        <div class="col-12">
            <h2>New Order<h2>
        </div>
    </div>


    <div class="row ">

      <div class="col-12">

    <div class="card-body">
       <form role="form" class="text-start" action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" >Customer</label>
                <select id="customer_idid" name="customer_id">
                    <option value="-1"> -- Choose --</option>
                @foreach ($customers as $cus)
                    <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" >Address</label>
                <select id="customeraddr_idid" name="customeraddrs_id">
                    <option value="-1"> -- Choose --</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" >Payment type</label>
                <select name="payment_type">
                    <option value="cash" >cash</option>
                    <option value="cash" >credir card</option>
                    <option value="cash" >check</option>
                    <option value="cash" >other</option>
                </select>
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

  <script type='text/javascript'>

    $(document).ready(function(){

      // Department Change
      $('#customer_idid').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#customeraddr_idid').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
           url: '/ajaxAddress/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['data'][i].id;
                 var street = response['data'][i].street;
                 var city = response['data'][i].city;
                 var state = response['data'][i].state;
                 var country = response['data'][i].country;

                 var option = "<option value='"+id+"'>"+country+"-"+state+": "+city+" "+street+" </option>";

                 $("#customeraddr_idid").append(option);
               }
             }

           }
        });
      });

    });

    </script>


<div class="row ">
    <div class="col-12">
        <div class="text-center">
            <a href="{{ route('order.index') }}" class="btn btn-danger">Back <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    </div>

@endsection
