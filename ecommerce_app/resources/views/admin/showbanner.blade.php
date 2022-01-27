@extends('admin.dashboard')

@section('sakshi')
<div class="row py-4">
    <h1 class="col-9 text-center"><i class="fa fa-image"></i></i> Banner's</h1>
    <a href="addbanner" type="button" class="col-2 mt-2 mb-1 font-weight-bold  btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Banner</a>
</div>
<section>
    <div class="container text-center row m-auto">
        @php
        $p=0;
        @endphp
        @foreach($data as $item)
        <div class="col-3 card mb-2 ml-5">
            <div class="m-auto">
                <figure class="mt-1">
                    <img src="{{'/uploads/'.$item->image}}" height="120" width="220">
                </figure>
            </div>
            <div class="m-auto">
                <figure class="">
                    <h5>{{$item->caption}}</h5>
                    <div class="row m-auto">
                        <a href="editbanner/{{$item->id}}" type="button" class="col-5 m-1 btn btn-warning"><img src="https://img.icons8.com/glyph-neue/34/000000/edit.png" /></a>
                        <button type="button" class="col-5 m-1 btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$p}}"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/24/000000/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" /></button>
                        <div class="modal fade" id="exampleModalCenter{{$p}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Alert</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you Really Want to Delete...?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="deletebanner/{{$item->id}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $p++ @endphp
                    </div>
                </figure>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection