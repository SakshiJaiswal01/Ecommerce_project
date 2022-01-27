@extends('admin.dashboard')
@section('sakshi')

<div class="container mt-5">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="col-7 py-5 m-auto bg-white">
        <div class="float-right mt-1 mr-4 mb-1">
            <a href="/showconfig" type="button" class="mt-2 font-weight-bold btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <form class="container mt-5 bg-white" method="post" action="/update_configemail">
            @csrf
            <h1 class="text-center"><i class="fas fa-cogs"></i>Edit Configration Email:</h1>
            <div class="form-group py-4">
                @error('title')
                <span class="text-danger">
                    {{$message}}
                </span>
                @enderror
                <div class="input-group-prepend">
                    <span class="mr-1">
                        <img src="https://img.icons8.com/external-vitaliy-gorbachev-flat-vitaly-gorbachev/40/000000/external-email-support-vitaliy-gorbachev-flat-vitaly-gorbachev.png" />
                    </span>
                    <input type="email" value="{{$data->admin_email}}" name="admin_email" class="form-control ml-1" placeholder="Enter Configration Email">
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="pid" value="{{$data->id}}">
                <input type="submit" value="submit" class="font-weight-bold mb-2 btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection