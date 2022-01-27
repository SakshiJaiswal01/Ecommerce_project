@extends('admin.dashboard')

@section('sakshi')
<section class="container col-8">

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <form class="container mt-2 bg-white" method="post" enctype="multipart/form-data" action="/update_product">
        @csrf
        <div class="float-right mt-1 mr-4 mb-1">
            <a href="/showproduct" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <h1 class="py-4 ml-3"><i class="fa fa-edit"></i> Edit Product</h1>
        <div class="form-group">
            <label>Product Name</label>
            @error('product_name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->product_name}}" name="product_name" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label>Description</label>
            @error('description')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->description}}" name="description" placeholder="Enter Description">
        </div>
        <div class="form-group">
            <label>Brand Name</label>
            @error('brand')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->brand}}" name="brand" placeholder="Enter Brand Name">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            @error('quantity')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="number" class="form-control" value="{{$data->quantity}}" name="quantity" placeholder="Enter Quantity">
        </div>
        <div class="form-group">
            <label>Price</label>
            @error('price')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->price}}" name="price" placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label>Image</label>
            @error('image')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="file" class="form-control" value="{{$data->image}}" name="image">
        </div>
        <div class="form-group">
            <label>Categorie Type:</label>
            @error('categorie')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <select class="form-control" name="categorie">
                @foreach($sel as $s)
                <option value="{{$s->id}}">{{$s->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <input type="radio" name="status" value="Active">
              <label>Active</label>
            <input type="radio" name="status" value="Inactive">
              <label>Inactive</label><br>
            @error('status')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <input type="hidden" name="pid" value="{{$data->id}}">
        <input type="submit" value="submit" class="mb-2 btn btn-success">
    </form>
</section>
@endsection