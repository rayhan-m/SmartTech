@extends('admin.master')
@section('mainContent')
    <div class="breadcrumb">
        <ul>
            <li><a href="#">Payments</a></li>
            <li>Payment List</li>
        </ul>
    </div>
    <div class=" border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-5 ">
            <div class="card-body col-md-6" style="margin-left:50px">
                <div class="mb-40">
                    {{-- {{dd(@$data)}} --}}
                    <form method="POST" action="{{url('admin/payment-create')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="inputEmail3">Select Order</label>
                            <div class="col-md-7">
                                <select class="niceSelect w-100 bb form-control{{ $errors->has('order_id') ? ' is-invalid' : '' }}"
                                    name="order_id" id="order_id">
                                    <option data-display="Select Category *"
                                            value="">Select ID</option>
                        
                                    @foreach($unpaid_orders as $key=>$value)
                                        
                                        <option value="{{$value->id}}" {{old('order_id')!=''? (old('order_id') == $value->id? 'selected':''):''}} >{{$value->id}}</option>
                                        {{-- <input type="hidden" name="id" value="{{$value->id}}"> --}}
                                        @endforeach
                                </select>
                                <span class="focus-border"></span>
                                @if ($errors->has('order_id'))
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong>{{ $errors->first('order_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="POST" action="{{route('payment_submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputEmail3">Payable Amount</label>
                        <div class="col-sm-9">
                            <input class="primary-input form-control" name="payable" type="text" value="{{@$order->total}}" readonly >
                            <input  name="order_id" type="hidden" name="order_id" value="{{@$order->id}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputPassword3" >Paid Amount</label>
                        <div class="col-sm-9">
                            <input class="primary-input form-control{{ $errors->has('pay_amount') ? ' is-invalid' : '' }}" type="text" onkeyup="isNumberKeyDecimal(this);"  value="{{@$order->total}}" name="pay_amount" placeholder="Paid amount"autocomplete="off">
                            <span class="focus-border"></span>
                            @if ($errors->has('pay_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pay_amount') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputPassword3">Payment Status</label>
                        <div class="col-sm-9">
                            <select class="niceSelect w-100 bb form-control{{ $errors->has('payment_status') ? ' is-invalid' : '' }}"
                                name="payment_status" id="payment_status">
                                <option data-display="Select Payment Status *"value="">Select</option>
                                <option value="1" {{old('payment_status')!=''? (old('payment_status') == 1? 'selected':''):''}} >Paid</option>
                                <option value="0" {{old('payment_status')!=''? (old('payment_status') == 0? 'selected':''):''}} >Due</option>
                            </select>
                            <span class="focus-border"></span>
                            @if ($errors->has('payment_status'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('payment_status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9">
                            <button class="btn btn-primary" type="submit">Add Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                   
@endsection





