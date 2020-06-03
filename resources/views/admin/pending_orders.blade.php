@extends('admin.master')
@section('mainContent')

    
    <div class="breadcrumb">
        <ul>
            <li><a href="#">Orders</a></li>
            <li>Orders List</li>
        </ul>
    </div>
    <div class=" border-top"></div>

     <!-- Table row-->
                <div class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%; font-size:12px;">
                                        <thead>
                                            <tr>
                                                <th style="width:15%">Order ID</th>
                                                <th style="width:20%">Ordered By</th>
                                                <th style="width:15%">Total</th>
                                                {{-- <th style="width:15%">Payment Status</th> --}}
                                                <th style="width:15%">Delivery Status</th>
                                                <th style="width:20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            @foreach ($orders as $item)
                                                <tr>
                                                    <td>#{{$item->id }}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->total}}</td>
                                                    {{-- <td>
                                                        @if ($item->payment_status==1)
                                                            <label class="badge badge-success">Paid</label></a>
                                                        @else
                                                            <label class="badge badge-danger">Unpaid</label></a>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        @if ($item->delivery_status==1)
                                                            <a href="{{ url('admin/delivery-deactive/'.$item->id)}}" class="disabled"><label class="badge badge-success">Delivered</label></a>
                                                        @else
                                                            <a class="disabled" href="{{ url('admin/delivery-active/'.$item->id)}}" class="disabled"><label class="badge badge-danger">Pending</label></a>
                                                        @endif
                                                    </td>
                                                    
                                                    {{-- <td>{{$item->active_status}}</td> --}}
                                                    <td> 
                                                      <a class="btn btn-primary"  data-toggle="modal" data-target="#viewModal{{$item->id}}"   href="#" >View
                                                    </a>
                                                      {{-- <button type="button" style="float:right;" class="btn btn-info" data-toggle="modal" data-target="#editModal">+ Add</button> --}}
                                                      <a class="btn btn-primary" href="{{ url('admin/invoice/'.$item->id)}}">Invoice</a>
                                                  </td>
                                                </tr>
                                               
                                        <!--  Large Modal -->
                                                <div class="modal fade" id="viewModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Order Items</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-20">
                                                                    <div class="col-lg-12">
                                                                        
                                                                        <label style="width:10%">SL</label>
                                                                        <label style="width:40%">Product Name</label>
                                                                        <label style="width:15%">Price</label>
                                                                        <label style="width:10%">Quantity</label>
                                                                        <label style="width:15%">Total</label>
                                                                        <hr style="margin-top:0px; margin-bottom:10px;" />
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        @php
                                                                            $order_items= App\OrderItem::where('order_id','=',$item->id )->get();
                                                                            $count=1;
                                                                        @endphp
                                                                        @foreach ($order_items as $order_item)
                                                                            <label style="width:10%">{{ $count++ }}</label>
                                                                            <label style="width:40%">{{$order_item->name }}</label>
                                                                            <label style="width:15%">{{$order_item->price }}</label>
                                                                            <label style="width:10%">{{$order_item->qty }}</label>
                                                                            <label style="width:15%">{{$order_item->total }}</label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Ends -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal starts -->

                   
@endsection





