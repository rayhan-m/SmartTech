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
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
            <div class="media-body"> <span>Step 3</span>
              <h6>Delivery Methods</h6>
            </div>
          </li>
          
          <!-- Step 4 -->
          <li class="col-sm-3">
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
        <div class="pay-method">
          <div class="row">
            <div class="col-md-6"> 
              
              <!-- Your information -->
              <div class="heading">
                <h2>Your information</h2>
                <hr>
              </div>
              <form action="{{ url('delivery-method') }}" method="post">
                @csrf
                <div class="row"> 
                  
                  <!-- Name -->
                  <div class="col-sm-6">
                    <label> First name
                      <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" name="first_name">
                      </label>
                      <span class="focus-border"></span>
                      @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                          <strong style="color:red;">{{ $errors->first('first_name') }}</strong>
                        </span> 
                      @endif
                    
                  </div>
                  
                  <!-- Number -->
                  <div class="col-sm-6">
                    <label> Last Name
                      <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text"name="last_name">
                    </label>
                    <span class="focus-border"></span>
                      @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                          <strong style="color:red;">{{ $errors->first('last_name') }}</strong>
                        </span> 
                      @endif
                  </div>
                  <!-- Phone -->
                  <div class="col-sm-6">
                    <label> Phone
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" type="text" name="phone">
                    </label>
                    <span class="focus-border"></span>
                      @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                          <strong style="color:red;">{{ $errors->first('phone') }}</strong>
                        </span> 
                      @endif
                  </div>
                  
                  <!-- Number -->
                  <div class="col-sm-6">
                    <label> Email
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email">
                    </label>
                    <span class="focus-border"></span>
                      @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                          <strong style="color:red;">{{ $errors->first('email') }}</strong>
                        </span> 
                      @endif
                  </div>
                  <!-- Zip code -->
                  <div class="col-sm-4">
                    <label> Zip code
                      <input class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" type="text" name="zip">
                    </label>
                    <span class="focus-border"></span>
                      @if ($errors->has('zip'))
                        <span class="invalid-feedback" role="alert">
                          <strong style="color:red;">{{ $errors->first('zip') }}</strong>
                        </span> 
                      @endif
                  </div>
                  
                  <!-- Address -->
                  <div class="col-sm-8">
                    <label> Address
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" type="text" name="address">
                    </label>
                    <span class="focus-border"></span>
                      @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                          <strong style="color:red;">{{ $errors->first('address') }}</strong>
                        </span> 
                      @endif
                  </div>
                </div>
            </div>
            <!-- Select Your Transportation -->
            <div class="col-md-6">
              <div class="heading">
                <h2>Select Your Transportation</h2>
                <hr>
              </div>
              <div class="transportation">
                <div class="row"> 

                  <!-- Free Delivery -->
                  <div class="col-sm-6">
                    <div class="charges">
                      <h6>Free Delivery</h6>
                      <br>
                      <span>7 - 12 days</span> </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Button -->
        <div class="pro-btn"> <a href="#." class="btn-round btn-light">Back to Payment</a> <button  type="submit" class="btn-round">Go Confirmation</button></div>
        </form>
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