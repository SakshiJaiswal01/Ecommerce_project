@extends('admin.dashboard')

@section('sakshi')
<section class="container col-8">
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form class="container mt-5 bg-white" method="post" action="/categorie_insert">
    @csrf
    <div class="float-right mr-4 mb-1">
        <a href="showcategorie" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
    <h1 class="py-4 ml-3"><i class="fa fa-plus" aria-hidden="true"></i> Add categorie</h1>
    <div class="form-group">
        <label>Categorie Type</label>
        @error('title')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <input type="text" class="form-control" name="title" placeholder="Enter Categorie">
    </div>
    <div class="form-group">
        <label>Description</label>
        @error('description')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <textarea type="text" class="form-control" name="description" placeholder="Write Descrption here"></textarea>
    </div>
    <input type="submit" value="submit" class="mb-1 btn btn-success">
</form>
</section>
@endsection