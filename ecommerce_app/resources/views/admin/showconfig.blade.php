@extends('admin.dashboard')
@section('sakshi')
<div class="container mt-5">
    <div class="col-7 py-5 m-auto bg-white">
        <h1 class="text-center"><i class="fas fa-cogs"></i> Configration Email:</h1>
        @foreach($data as $item)
        <h4 class="text-center py-3"><img src="https://img.icons8.com/external-vitaliy-gorbachev-flat-vitaly-gorbachev/30/000000/external-email-support-vitaliy-gorbachev-flat-vitaly-gorbachev.png" /> {{$item->admin_email}}</h4>
        <div class="text-center">
            <a href="editconfig/{{$item->id}}" type="button" class="font-weight-bold mb-2 btn btn-warning"><img src="https://img.icons8.com/glyph-neue/24/000000/edit.png" />Edit Mail</a>
        </div>
        @endforeach
    </div>
</div>
@endsection