@extends('admin.dashboard')

@section('sakshi')
<section class="card">
    <div class="row">
        <h1 class="col-9 ml-4 mt-3"><i class="fa fa-gift" aria-hidden="true"></i> Coupon's</h1>
        <a href="addcoupon" type="button" class="col-2 mt-2 font-weight-bold  btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Coupon</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Coupon Code</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Coupon value</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $pp=1;
                $p=0;
                @endphp
                @foreach($data as $item)
                <tr class="text-center">
                    <td>{{$pp++}}</td>
                    <td>{{$item->coupon_code}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->coupon_value}}</td>
                    <td>
                        <!-- <a href="deletecoupon/{{$item->id}}" type="button" class="btn btn-danger">Delete</a> -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$p}}"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/24/000000/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" /></button>
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
                                        <a href="deletecoupon/{{$item->id}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $p++ @endphp
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection