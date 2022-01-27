@extends('admin.dashboard')
@section('sakshi')
<section class="card">
    <div class="row">
        <h1 class="col-9 ml-2 py-4"><img src="https://img.icons8.com/ios-filled/50/000000/shopping-cart.png"/> User Details</h1>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Pincode</th>
                    <th scope="col">State</th>
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
                    <td>{{$item->firstname}}</td>
                    <td>{{$item->lastname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phonenumber}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->pincode}}</td>
                    <td>{{$item->state}}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$p}}"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/24/000000/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" /></button>
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
                                        <a href="deleteuserdetails/{{$item->id}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $p++ @endphp
                    </td>
                </tr>

                <!-- modal -->

                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection