@extends('master')

@section('mainContent')
<!-- Content -->
  <div id="content"> 
    
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">
          
          <!-- Step 1 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>
          
          <!-- Step 2 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Payment Methods</h6>
            </div>
          </li>
          
          <!-- Step 3 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 3</span>
              <h6>Delivery Methods</h6>
            </div>
          </li>
          
          <!-- Step 4 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 4</span>
              <h6>Confirmation</h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
    
    <!-- Payout Method -->
    <section class="padding-bottom-60">
      <div class="container"> 
        <!-- Payout Method -->
        <div class="pay-method check-out"> 
          
          <!-- Shopping Cart -->
          <div class="heading">
            <h2>Shopping Cart</h2>
            <hr>
          </div>
          @foreach ($cartItems as $item)
            <!-- Check Item List -->
            <ul class="row check-item">
                <li class="col-xs-6">
                <p>{{ $item->name }}</p>
                </li>
                <li class="col-xs-2 text-center">
                <p>£{{ $item->price }}</p>
                </li>
                <li class="col-xs-2 text-center">
                <p>{{ $item->qty }} Items</p>
                </li>
                <li class="col-xs-2 text-center">
                <p>£{{ $item->price * $item->qty }}</p>
                </li>
            </ul>
          @endforeach    
          <!-- Payment information -->
          <div class="heading margin-top-50">
            <h2>Payment information</h2>
            <hr>
          </div>
          
          <!-- Check Item List -->
        <div class="checkbox checkbox-primary">
            <input id="cate1" class="styled" name="payment_method" value="1" checked type="checkbox" >
            <label for="cate1"> Cash On Delivery </label>
        </div>
          
          <!-- Delivery infomation -->
          <div class="heading margin-top-50">
            <h2>Delivery infomation</h2>
            <hr>
          </div>
          @php
              $first_name=session()->get('first_name');
              $last_name=session()->get('last_name');
              $phone=session()->get('phone');
              $email=session()->get('email');
              $zip=session()->get('zip');
              $address=session()->get('address');
          @endphp
          <!-- Information -->
          <ul class="row check-item infoma">
            <li class="col-sm-4">
              <h6>Name:</h6>
              <span>{{ $first_name }} {{ $last_name }}</span> </li>
            <li class="col-sm-4">
              <h6>Phone:</h6>
              <span>{{ $phone }}</span> </li>
            <li class="col-sm-4">
              <h6>Email:</h6>
              <span>{{ $email }}</span> </li>
            <li class="col-sm-4">
              <h6>Zipcode:</h6>
              <span>{{ $zip }}</span> </li>
            <li class="col-sm-4">
              <h6>Address:</h6>
              <span>{{ $address }}</span> </li>
          </ul>
                   
          <!-- Totel Price -->
          <div class="totel-price">
            <h4><small> Total Price: </small> £{{Cart::priceTotal()}}</h4>
          </div>
        </div>
        
        <!-- Button -->
    <div class="pro-btn"> <a href="#." class="btn-round btn-light">Back to Delivery</a> <a href="{{ url('checkout-success')}}" class="btn-round">Proceed to Checkout</a> </div>
      </div>
    </section>
            <!-- Clients img -->
            <section class="light-gry-bg clients-img">
               <div class="container">
                  <ul>
                     <li><img src="images/c-img-1.png" alt="" ></li>
                     <li><img src="images/c-img-2.png" alt="" ></li>
                     <li><img src="images/c-img-3.png" alt="" ></li>
                     <li><img src="images/c-img-4.png" alt="" ></li>
                     <li><img src="images/c-img-5.png" alt="" ></li>
                  </ul>
               </div>
            </section>
            <!-- Newslatter -->
            @include('include.newslatter')
         </div>
         <!-- End Content --> 
@endsection