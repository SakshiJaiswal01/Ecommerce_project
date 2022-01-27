@extends('admin.dashboard')
@section('sakshi')
<section class="card">
    <div class="row">
        <h1 class="col-9 ml-4 mt-3"><img src="https://img.icons8.com/ios-glyphs/35/000000/product.png"/> Product's</h1>
        <a href="/addproduct" type="button" class="col-2 mt-2 font-weight-bold  btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th rowspan="2">#</th>
                    <th rowspan="2" class="mt-auto">Product Name</th>
                    <th rowspan="2">Description</th>
                    <th rowspan="2">Brand</th>
                    <th rowspan="2">Quantity</th>
                    <th rowspan="2">Price</th>
                    <th rowspan="2">Image</th>
                    <th rowspan="2">Categorie</th>
                    <th rowspan="2">Status</th>
                    <th colspan="3">Action</th>
                </tr>
                <tr>
                    <th>view</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->brand}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td><img src="{{'/uploads/'.$item->image}}" height="40" width="40"></td>
                    <td>{{$item->categorie_id}}</td>
                    <td>
                        @if($item->status=='Active')
                        <span class="btn btn-outline-success">Active</span>
                        @else
                        <span class="btn btn-outline-danger">Inactive</span>
                        @endif
                    </td>
                    <td><a href="/productview/{{$item->id}}" type="button" class="btn btn-info"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/24/000000/external-view-cyber-security-kiranshastry-solid-kiranshastry-2.png" /></a></td>
                    <td><a href="/editproduct/{{$item->id}}" type="button" class="btn btn-warning"><img src="https://img.icons8.com/glyph-neue/24/000000/edit.png" /></a></td>
                    <!-- <td><a href="deleteproduct/{{$item->id}}" type="button" class="btn btn-danger"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/24/000000/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" /></a></td> -->
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
                                    <a href="deleteproduct/{{$item->id}}" class="btn btn-danger">Delete</a>
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