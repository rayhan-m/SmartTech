@extends('admin.master')

@section('mainContent')

                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG-->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Add-User"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Total Customer</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">{{ @$total_user}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Financial"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Sales</p>
                                <p class="text-primary text-24 line-height-1 mb-2">${{$total_sell}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Orders</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">{{ @$total_order }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Money-2"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Expense</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">${{$total_expense}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">This Year Sales</div>
                                <div id="echartBar" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">Sales by Countries</div>
                                <div id="echartPie" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="card card-chart-bottom o-hidden mb-4">
                                    <div class="card-body">
                                        <div class="text-muted">Last Month Sales</div>
                                        <p class="mb-4 text-primary text-24">${{$total_sell}}</p>
                                    </div>
                                    <div id="echart1" style="height: 260px;"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card card-chart-bottom o-hidden mb-4">
                                    <div class="card-body">
                                        <div class="text-muted">Last Week Sales</div>
                                        <p class="mb-4 text-warning text-24">${{$total_sell}}</p>
                                    </div>
                                    <div id="echart2" style="height: 260px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card o-hidden mb-4">
                                    <div class="card-header d-flex align-items-center border-0">
                                        <h3 class="w-50 float-left card-title m-0">New Users</h3>
                                        <div class="dropdown dropleft text-right w-50 float-right">
                                            <button class="btn bg-gray-100" id="dropdownMenuButton1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="nav-icon i-Gear-2"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"><a class="dropdown-item" href="#">Add new user</a><a class="dropdown-item" href="#">View All users</a><a class="dropdown-item" href="#">Something else here</a></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table text-center" id="user_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">SL</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Avatar</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Phone</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @php
                                                            $count=1;
                                                        @endphp
                                                        @foreach ($users as $item)
                                                            <th scope="row">{{ $count++ }}</th>
                                                            <td>{{$item->name}}</td>
                                                            <td><img class="rounded-circle m-0 avatar-sm-table" src="{{ file_exists(@$item->image) ? asset($item->image) : asset('backend/uploads/staff/customer.png') }}" alt="" /></td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->phone}}</td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card o-hidden mb-4">
                                    <div class="card-header d-flex align-items-center border-0">
                                        <h3 class="w-50 float-left card-title m-0">New Users</h3>
                                        <div class="dropdown dropleft text-right w-50 float-right">
                                            <button class="btn bg-gray-100" id="dropdownMenuButton1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="nav-icon i-Gear-2"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"><a class="dropdown-item" href="#">Add new user</a><a class="dropdown-item" href="#">View All users</a><a class="dropdown-item" href="#">Something else here</a></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table text-center" id="user_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">SL</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Avatar</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count=1;
                                                    @endphp
                                                    @foreach ($products as $item)
                                                    <tr>
                                                        <th scope="row">{{ $count++ }}</th>
                                                        <td>{{$item->name}}</td>
                                                        <td><img class="rounded-circle m-0 avatar-sm-table" src="{{ file_exists(@$item->image) ? asset($item->image) : asset('backend/uploads/staff/customer.png') }}" alt="" /></td>
                                                        <td>{{$item->price}}</td>
                                                        <td>{{$item->quantity}}</td>
                                                        <td>
                                                            @if ($item->product_status==1)
                                                                <label class="badge badge-success">New</label></a>
                                                            @else
                                                                <label class="badge badge-info">Regular</label></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                </div><!-- end of main-content -->

    @endsection