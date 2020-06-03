@extends('admin.master')
@section('mainContent')


<div class="breadcrumb">
    <ul>
        <li><a href="#">Products</a></li>
        <li>Stock List</li>
    </ul>
</div>
<div class=" border-top"></div>
<div class="mt-20 mb-20">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <span>+</span>
        Stock</button>
</div>

<!-- Table row-->
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" id="zero_configuration_table"
                        style="width:100%; font-size:12px;">
                        <thead>
                            <tr>
                                <th style="width:10%">SL</th>
                                <th style="width:15%">Product ID</th>
                                <th style="width:35%">Product Name</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:10%">Voucher</th>
                                <th style="width:20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count=1;
                            @endphp
                            @foreach ($stocks as $item)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>#{{$item->product_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td> <a class="btn btn-primary" href="{{asset('/')}}{{$item->voucher}}" target="_blank">View</a></td>
                                <td style="text-align:center;">
                                    
                                    @if ($item->active_status==0)
                                        <a data-toggle="modal" data-target="#editModal{{$item->id}}" href="#"><ion-icon name="create-outline"></ion-icon></a>
                                        <a data-toggle="modal" data-target="#deleteCategoryModal" href="#"><ion-icon name="trash-outline"></ion-icon> </a>
                                        <a class="btn btn-primary" href="{{ url('admin/stock-updated/'.$item->id.'/'.$item->product_id.'/'.$item->quantity)}}">Update</a>
                                    @else
                                         <a class="btn btn-primary" href="#">Updated</a>
                                    @endif
                                </td>
                            </tr>
                            <!-- Edit Modal starts -->
                            <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel-2">Edit Stock</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{url('admin/stock-update')}}" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="{{@$item->id}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-10 ml-40">
                                <div class="input-effect">
                                    <label>Select Product</label>
                                    <select
                                        class="niceSelect w-100 bb form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}"
                                        name="product_id" id="product_id">
                                        <option data-display="Select Category *" value="">Select</option>
                                        @foreach($product as $key=>$value)

                                        <option value="{{@$value->id}}"{{@$value->id == @$item->product_id? 'selected':''}}>{{@$value->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="focus-border"></span>
                                    @if ($errors->has('product_id'))
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong>{{ $errors->first('product_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-effect mt-20  mb-20">
                                    <label>Quantity</label>
                                    <input
                                        class="primary-input form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                        type="text" onkeyup="isNumberKeyDecimal(this);"  value="{{@$item->quantity}}" name="quantity" placeholder="Quantity" autocomplete="off">
                                    <span class="focus-border"></span> @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span> @endif
                                </div>

                                <label>Voucher:</label>
                                <div class="form-group">
                                    <a class="btn btn-primary mb-10 " href="{{asset('/')}}{{@$item->voucher}}" target="_blank">View</a>
                                    <input type="file" name="voucher" class="file-upload-default {{ $errors->has('voucher') ? ' is-invalid' : '' }}">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Voucher">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    @if ($errors->has('voucher'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('voucher') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class=" btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal Ends -->

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal starts -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Stock Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('stock_submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-10 ml-40">
                                <div class="input-effect">
                                    <label>Select Product</label>
                                    <select
                                        class="niceSelect w-100 bb form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}"
                                        name="product_id" id="product_id">
                                        <option data-display="Select Category *" value="">Select</option>
                                        @foreach($product as $key=>$value)

                                        <option value="{{$value->id}}"{{old('product_id')!=''? (old('product_id') == $value->id? 'selected':''):''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="focus-border"></span>
                                    @if ($errors->has('product_id'))
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong>{{ $errors->first('product_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-effect mt-20  mb-20">
                                    <label>Quantity</label>
                                    <input
                                        class="primary-input form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                        type="text" onkeyup="isNumberKeyDecimal(this);"  name="quantity" placeholder="Quantity" autocomplete="off">
                                    <span class="focus-border"></span> @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span> @endif
                                </div>

                                <label>Voucher:</label>
                                <div class="form-group">
                                    <input type="file" name="voucher" class="file-upload-default {{ $errors->has('voucher') ? ' is-invalid' : '' }}">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Voucher">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    @if ($errors->has('voucher'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('voucher') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class=" btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ends -->
    {{-- Delete Modal--}}
    <div id="deleteCategoryModal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4>Are You Sure To Delete Item ?</h4>
                    </div>

                    <div class="mt-20 d-flex justify-content-between">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                        <form action="{{url('admin/product-delete/'.@$item->id)}}" method="DELETE"
                            enctype="multipart/form-data">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--End Delete Modal--}}

    @endsection