@extends('admin.dashboard')
    @section('sakshi')
    <section class="container col-8">
    
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form class="container mt-5 bg-white" method="post" action="/update">
        @csrf
        <div class="float-right mt-1 mr-4 mb-1">
          <a href="/showcategorie" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <h1 class="py-4 ml-3"><i class="fa fa-edit"></i> Edit Categorie</h1>
         <div class="form-group">
            <label>Title</label>
            @error('title')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Title" >
         </div>
         <div class="form-group">
            <label>Description</label>
            @error('description')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <textarea  type="text" class="form-control"  name="description" placeholder="description">{{$data->description}}</textarea>
         </div>
         <input type="hidden" name="pid" value="{{$data->id}}">
         <input type="submit" value="submit" class="mb-2 btn btn-success">
         
    </form>
    </section>
    @endsection
