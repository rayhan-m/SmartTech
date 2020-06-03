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
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>
          
          <!-- Step 2 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Payment Methods</h6>
            </div>
          </li>
          
          <!-- Step 3 -->
          <li class="col-sm-3">
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
            <div class="col-md-6 col-md-offset-3"> 
              
              <!-- Your Card -->
              <div class="heading">
                <h2>Payment Method Test</h2>
                <hr>
                <form action="{{ url('payment-method') }}" method="post">
                    @csrf
                  <div class="checkbox checkbox-primary">
                    <input id="cate1" class="styled" name="payment_method" value="1" checked type="checkbox" >
                    <label for="cate1"> Cash On Delivery </label>
                  </div>
                  <div class="col-md-4">
                    <a href="#" onclick="myFunction()"><img src="backend/images/paypal.png" alt=""></a>
                    <p style="color:red !important;" id="demo"></p>
                  </div>
                  <div class="col-md-4">
                    <a href="#" onclick="myFunction1()"><img src="backend/images/master-card.png" alt=""></a>
                    <p style="color:red !important;" id="demo1"></p>
                  </div>
                  <div class="col-md-4">
                    <a href="#" onclick="myFunction2()"><img src="backend/images/visa.png" alt=""></a>
                    <p style="color:red !important;" id="demo2"></p>
                  </div>
              </div>
          </div>
        </div>
        
        <!-- Button -->
        <div class="pro-btn"> <a href="#." class="btn-round btn-light">Back to Shopping Cart</a> <button  type="submit" class="btn-round">Go Delivery Methods</button> </div>
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
         <script>
            function myFunction() {
              document.getElementById("demo").innerHTML = "Further Development";
            }
            function myFunction1() {
              document.getElementById("demo1").innerHTML = "Further Development";
            }
            function myFunction2() {
              document.getElementById("demo2").innerHTML = "Further Development";
            }
          </script>
@endsection