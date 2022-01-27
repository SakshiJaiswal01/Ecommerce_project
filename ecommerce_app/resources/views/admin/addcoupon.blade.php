@extends('admin.dashboard')
    @section('sakshi')
    <section class="container col-8">
    
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form class="container mt-5 bg-white" method="post" action="coupon_insert">
        @csrf
        <div class="float-right mt-1 mr-4 mb-1">
        <a href="/showcoupon" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
    <h1 class="py-4 ml-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Coupon</h1>
         <div class="form-group">
            <label>Coupon Code</label>
            @error('coupon_code')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code eg.zjruno30" >
         </div>
         <div class="form-group">
            <label>Quantity</label>
            @error('quantity')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" >
         </div>
         <div class="form-group">
            <label>Coupon Value</label>
            @error('coupon_value')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" name="coupon_value" placeholder="Coupon Value" >
         </div>
         
         
        
         <input type="submit" value="submit" class="mb-2 btn btn-success">
    </form>
    </section>
    @endsection
