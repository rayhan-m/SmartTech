@php
    $setting=App\GeneralSetting::where('active_status',1)->first();
@endphp
@extends('admin.master')
@section('mainContent')
<div class="main-content pt-4" id="print">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">Invoice</a></li>
                        </ul>
                        <div class="card">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <div class="d-sm-flex mb-5" data-view="print"><span class="m-auto"></span>
                                        <button onclick="javascript:printDiv('print')" class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                                    </div>
                                    <!-- -===== Print Area =======-->
                                    <div id="print-area" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="font-weight-bold">Order Info</h4>
                                                <p>Order ID: #{{$orders->id}}</p>
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <p><strong>Delivery Status: </strong> 
                                                    @if ($orders->delivery_status == 1)
                                                        Delivered
                                                    @else
                                                        Pending
                                                    @endif
                                                </p>
                                                <p><strong>Order date: </strong>{{$orders->order_date}}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-4 border-top"></div>
                                        <div class="row mb-5">
                                            <div class="col-md-6 mb-3 mb-sm-0">
                                                <h5 class="font-weight-bold">Bill From</h5>
                                                <p>{{$setting->site_title}}</p><span >
                                                    {{$setting->location}}
                                                <p>+{{$setting->phone}}</p>
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <h5 class="font-weight-bold">Bill To</h5>
                                                <p>{{$billing_info->first_name}} {{$billing_info->last_name}}</p><span>
                                                    {{$billing_info->email}}
                                                    <p>+{{$billing_info->phone}} Zip:{{$billing_info->zip}} </p>
                                                    {{$billing_info->address}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table class="table table-hover mb-4">
                                                    <thead class="bg-gray-300">
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Item Name</th>
                                                            <th scope="col">Unit Price</th>
                                                            <th scope="col">Quentity</th>
                                                            <th scope="col">Cost</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count=1;
                                                        @endphp
                                                        @foreach ($order_items as $item)
                                                        <tr>
                                                            <th scope="row">{{$count++}}</th>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->price}}</td>
                                                            <td>{{$item->qty}}</td>
                                                            <td>{{$item->total}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="col-md-12 mb-40">
                                                <div class="invoice-summary">
                                                    <p>Sub total: <span>${{$orders->total}}</span></p>
                                                    {{-- <p>Vat: <span>$120</span></p> --}}
                                                    <h5 class="font-weight-bold">Grand Total: <span>${{$orders->total}}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ==== / Print Area =====-->
                                </div>
                                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end of main-content -->
            </div>
            
            <script>
                function printDiv(divID) {
                    //Get the HTML of div
                    var divElements = document.getElementById(divID).innerHTML;
                    //Get the HTML of whole page
                    var oldPage = document.body.innerHTML;
                    //Reset the page's HTML with div's HTML only
                    document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
                    //Print Page
                    window.print();
                    //Restore orignal HTML
                    document.body.innerHTML = oldPage;
                }

            </script>
@endsection





