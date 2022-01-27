@extends('admin.dashboard')

@section('sakshi')

<section class="card">
    <div class="row">
        <h1 class="col-9 ml-4 mt-3"><i class="fa fa-user" aria-hidden="true"></i> User's</h1>
        <a href="adduser" type="button" class="col-2 mt-2 font-weight-bold  btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
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
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        @if($item->role_id==1)
                        Super Admin
                        @endif
                        @if($item->role_id==2)
                        Admin
                        @endif
                        @if($item->role_id==3)
                        Inventory manager
                        @endif
                        @if($item->role_id==4)
                        order Manager
                        @endif
                        @if($item->role_id==5)
                        Coustmer
                        @endif
                    </td>
                    <td>
                        @if($item->status=='Active')
                        <span class="btn btn-outline-success">Active</span>
                        @else
                        <span class="btn btn-outline-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="edituser/{{$item->id}}" type="button" class="btn btn-warning"><img src="https://img.icons8.com/glyph-neue/24/000000/edit.png" /></a>
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
                                        <a href="deleteuser/{{$item->id}}" class="btn btn-danger">Delete</a>
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