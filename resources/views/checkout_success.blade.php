@extends('master')

@section('mainContent')
<!-- Content -->
  <div id="content"> 
    
    <!-- Oder-success -->
    <section>
      <div class="container"> 
        <!-- Payout Method -->
         @php
              $first_name=session()->get('first_name');
              
          @endphp
        <div class="order-success"> <i class="fa fa-check"></i>
            {{ $first_name }}
          <h6>Congratulation! Your order has been processed</h6>
          <p>Thanks For Buying Our products</p>
        <a href="{{url('/')}}" class="btn-round">Return to Shop</a> </div>
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
            <section class="newslatter">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <h3>Subscribe our Newsletter <span>Get <strong>25% Off</strong> first purchase!</span></h3>
                     </div>
                     <div class="col-md-6">
                        <form>
                           <input type="email" placeholder="Your email address here...">
                           <button type="submit">Subscribe!</button>
                        </form>
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <!-- End Content --> 
@endsection