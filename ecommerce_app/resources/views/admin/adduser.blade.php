@extends('admin.dashboard')

    @section('sakshi')
    <section class="container col-8">
    
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form class="container mt-2 bg-white" method="post" action="user_insert">
        @csrf
        <div class="float-right mt-1 mr-4 mb-1">
        <a href="showuser" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
    <h1 class="py-4 ml-3"><i class="fa fa-plus" aria-hidden="true"></i> Add User</h1>
         <div class="form-group">
            <label>First Name</label>
            @error('first_name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" name="first_name" placeholder="First Name" >
         </div>
         <div class="form-group">
            <label>Last Name</label>
            @error('last_name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" >
         </div>
         <div class="form-group">
            <label>Email</label>
            @error('email')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="email" class="form-control" name="email" placeholder="Enter email" >
         </div>
         <div class="form-group">
            <label>Password</label>
            @error('password')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="password" class="form-control" name="password" placeholder="Password" >
         </div>
         <div class="form-group">
            <label>Role Type:</label>
            @error('role')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <select class="form-control" name="role">
            <option value="5">customer</option>
                @foreach($sel as $s)                
                <option value="{{$s->id}}">{{$s->name}}</option>
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
         <input type="submit" value="submit" class="mb-2 btn btn-success">
    </form>
    </section>
    @endsection
