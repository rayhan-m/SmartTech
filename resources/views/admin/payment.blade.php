@extends('admin.master')
@section('mainContent')

    
    <div class="breadcrumb">
        <ul>
            <li><a href="#">Payments</a></li>
            <li>Payment List</li>
        </ul>
    </div>
    <div class=" border-top"></div>
    <div class="mt-20 mb-20">
        <a href="{{route('payment_create')}}"> <button type="button" class="btn btn-primary"> <span>+</span> Payment</button></a>
    </div>

     <!-- Table row-->
                <div class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%; font-size:12px;">
                                        <thead>
                                            <tr>
                                                <th style="width:15%">Payment ID</th>
                                                <th style="width:15%">Ordered ID</th>
                                                <th style="width:15%">Payable Amount</th>
                                                <th style="width:15%">Paid Amount</th>
                                                <th style="width:15%">Payment Date</th>
                                                <th style="width:15%">Payment Status</th>
                                                <th style="width:10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            @foreach ($payments as $item)
                                                <tr>
                                                    <td>#{{$item->id }}</td>
                                                    <td>{{$item->order_id}}</td>
                                                    <td>{{$item->pay_amount}}</td>
                                                    <td>{{$item->pay_amount}}</td>
                                                    <td>{{$item->payment_date}}</td>
                                                    <td>
                                                        @if ($item->payment_status==1)
                                                            <a href="{{ url('admin/payment-deactive/'.$item->id)}}"><label class="badge badge-success">Paid</label></a>
                                                        @else
                                                            <a href="{{ url('admin/payment-active/'.$item->id)}}" ><label class="badge badge-danger">Due</label></a>
                                                        @endif
                                                    </td>
                                                    {{-- <td>{{$item->active_status}}</td> --}}
                                                    <td> 
                                                      <a  data-toggle="modal" data-target="#editModal{{$item->id}}"   href="#" ><ion-icon name="create-outline"></ion-icon>
                                                    </a>
                                                     
                                                      <a  data-toggle="modal" data-target="#deleteModal{{$item->id}}"  href="#" class="disabled"><ion-icon name="trash-outline"></ion-icon></a>
                                                  </td>
                                                </tr>
                                              
                                            {{-- Delete Modal--}}
                                            <div  class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true" >
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
                                                                {{-- <form action="{{url('admin/payment-delete/'.$item->id)}}" method="get" enctype="multipart/form-data"> --}}
                                                                <a href="{{url('admin/payment-delete/'.$item->id)}}"><button class="btn btn-danger" >Delete</button></a>
                                                                </form>
                                                                
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Delete Modal --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                  
                   
@endsection





