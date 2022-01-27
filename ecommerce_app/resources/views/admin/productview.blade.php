@extends('admin.dashboard')
@section('sakshi')

<div class="container mt-5">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="col-8 py-3 m-auto bg-white">
        <div class="float-right mt-1 mr-4 mb-1">
            <a href="/showproduct" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <section class="container mt-1 bg-white">
            <h1 class="text-center"><i class="fas fa-eye"></i>View Product</h1>
             <hr>
             <div class="row">
                <div class="col-sm-7 my-auto">                  
                    <img src="{{('/uploads/'.$data->image)}}" height="300" width="300">
                </div>
                <div class="col-sm-5 padding-right my-auto text-center">
                <h1 class="">{{$data->product_name}}</h1>
                <h5 class=""><small class="font-weight-bold">Description: </small>{{$data->description}}</h5>
                <h3 class="font-weight-bold">{{$data->brand}}</h3>
                <h4 class="text-warning"><small class="font-weight-bold text-dark">Quantity: </small>{{$data->quantity}}</h4>
                <h3 class="text-primary">₹ {{$data->price}}</h3>
                <h5 class="text-danger">{{$data->status}}</h5>
                </div>
             </div>
        </section>
    </div>
</div>
@endsection