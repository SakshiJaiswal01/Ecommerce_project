@extends('admin.dashboard')

@section('sakshi')
<section class="container col-8">
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form class="container mt-5 bg-white" enctype="multipart/form-data" method="post" action="/update_banner">
    @csrf
    <div class="float-right mr-4 mb-1">
        <a href="/showbanner" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
    <h1 class="py-4 ml-3"><i class="fa fa-edit"></i> Edit Banner</h1>
    <div class="form-group">
        <label>Caption</label>
        @error('caption')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <textarea type="text" class="form-control" name="caption" placeholder="Write Caption for Image">{{$data->caption}}</textarea>
    </div>
    <div class="form-group">
        <label>Image</label>
        @error('image')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <img src="{{('/uploads/'.$data->image)}}" height="40" width="40">
        <input type="file" value="{{$data->image}}" class="form-control" name="image">
    </div>
    <input type="hidden" name="pid" value="{{$data->id}}">
    <input type="submit" value="submit" class="mb-2 btn btn-success">
</form>
</section>
@endsection