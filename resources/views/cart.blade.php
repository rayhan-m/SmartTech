@extends('master')

@section('mainContent')
 <!-- Content -->
  <div id="content "> 
    
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row ">
          
          <!-- Step 1 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>
          
          <!-- Step 2 -->
          <li class="col-sm-3">
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
    
    <!-- Shopping Cart -->
    <section class="shopping-cart padding-bottom-60">
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Items (Product Name)</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total Price </th>
              <th>&nbsp; </th>
            </tr>
          </thead>
          <tbody>
            
            <!-- Item Cart -->
            @foreach ($cartItems as $item)
                
           
            <tr>

              <td><div class="media">
                  <div class="media-body">
                    <p>{{ $item->name}}</p>
                  </div>
                </div></td>
              <td class="text-center padding-top-60">£{{ $item->price}}</td>
              <td class="text-center"><!-- Quinty -->
                <div class="quinty">
                    <form action="{{ url('cart-update/'.$item->rowId) }}" method="PUT">
                        <input class="form-control {{ $errors->has('qty') ? ' is-invalid' : '' }}" type="number" name="qty" value="{{ $item->qty}}">
                        <span class="focus-border"></span> 
                        @if ($errors->has('qty'))
                          <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $errors->first('qty') }}</strong>
                          </span>
                        @endif
                        <input type="hidden" name="Product_id" value="{{ $item->id}}">
                        <button class="btn-round btn-light" style="padding: 2px 8px; font-size:12px; margin-top:10px;" type="submit" >Update</button>
                    </form>
                </div>
            </td>
            <td class="text-center padding-top-60">£{{$item->price *  $item->qty}}</td>
              <td class="text-center padding-top-60"><a href="{{ url('cart-delete/'.$item->rowId)}}" class="remove"><i class="fa fa-close"></i></a></td>
            </tr>
             @endforeach
          </tbody>
        </table>
          
          <!-- Grand total -->
          <div class="g-totel">
            <h5>Grand total: <span>£{{Cart::priceTotal()}}</span></h5>
          </div>
        </div>
        
        <!-- Button -->
    <div class="pro-btn"> <a href="#." class="btn-round btn-light">Continue Shopping</a> <a href="{{ url('cart-payment') }}" class="btn-round">Go Payment Methods</a> </div>
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