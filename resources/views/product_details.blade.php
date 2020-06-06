@extends('master')

@section('mainContent')
     <!-- Linking -->
         <div class="linking">
            <div class="container">
               <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">{{$product_details->category->name}}</a></li>
               <li class="active">{{$product_details->name}}</li>
               </ol>
            </div>
         </div>
         <!-- Content -->
         <div id="content">
            <!-- Products -->
            <section class="padding-top-40 padding-bottom-60">
               <div class="container">
                  <div class="row">
                     <!-- Shop Side Bar -->
                     <div class="col-md-2">
                        <div class="shop-side-bar">
                           <!-- Categories -->
                           <h6>Categories</h6>
                           <div class="checkbox checkbox-primary">
                              <ul>
                                  @foreach ($categories as $category)
                                    <li>
                                        <a href="{{url('products/'.$category->id)}}">{{$category->name}}</a>
                                    </li>
                                  @endforeach
                              </ul>
                           </div>
                           <!-- Categories -->
                           
                        </div>
                     </div>
                     <!-- Products -->
                     <div class="col-md-10">
                        <div class="product-detail">
                           <div class="product">
                              <div class="row">
                                 <!-- Slider Thumb -->
                                 <div class="col-xs-5">
                                    <article class="slider-item on-nav">
                                      <img height="320px;" width="380px;" src="{{asset('/')}}{{$product_details->image}}" alt="">
                                    </article>
                                    @if ($product_details->product_status==1)
                                          <span class="new-tag">New</span> 
                                    @endif
                                 </div>
                                 <!-- Item Content -->
                                 <div class="col-xs-7">
                                    <span class="tags">{{$product_details->category->name}}</span>
                                    <h5>{{$product_details->name}}</h5>
                                    <div class="row">
                                       <div class="col-sm-4"><span class="price">£{{$product_details->price}} </span></div>
                                    </div>
                                    <div class="row mt-20">
                                       <div class="col-sm-6">
                                          <p>Availabile Quantity: <span class="in-stock" style="font-size:20px; color:green;">{{$product_details->quantity}}</span></p>
                                       </div>
                                       <div class="col-sm-6">
                                          <p>Status:
                                             @if ($product_details->product_status==1)
                                                <span class="new-tag" style="font-size:16px; color:green;">New Product</span> 
                                             @else
                                                <span class="new-tag" style="font-size:16px; color:green;">Regular Product</span> 
                                             @endif   
                                          </p>
                                       </div>
                                    </div>
                                    <!-- List Details -->
                                    <ul class="bullet-round-list">
                                        <h5>Features:</h5>
                                       {{$product_details->feature}}
                                    </ul>
                                    
                                    <!-- Quinty -->
                                    <div class="quinty">
                                       <input type="number" value="01" readonly>
                                    </div>
                                    <a href="{{ url('cart-store/'.$product_details->id.'/1')}}" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Add to Cart</a> 
                                 </div>
                              </div>
                           </div>
                           <!-- Details Tab Section-->
                           <div class="item-tabs-sec">
                              <!-- Nav tabs -->
                              <ul class="nav" role="tablist">
                                 <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab">Product Details</a></li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                 <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                    <!-- List Details -->
                                    <ul class="bullet-round-list">
                                       {{$product_details->details}}
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Your Recently Viewed Items -->
            <section class="padding-bottom-60">
               <div class="container">
                  <!-- heading -->
                  <div class="heading">
                     <h2>Related Product</h2>
                     <hr>
                  </div>
                  <!-- Items Slider -->
                  <div class="item-slide-5 with-nav">
                     <!-- Product -->
                     @php
                         $related_products=App\Product::where('active_status',1)->where('category_id', $product_details->category_id)->orderBy('id', 'DESC')->get();
                     @endphp
                     @foreach ($related_products as $related_product)
                         <div class="product">
                        <article>
                            
                           <img style="height:120px;" width="auto;" class="img-responsive" src="{{asset('/')}}{{$related_product->image}}" alt="" > 
                           @if ($related_product->product_status==1)
                                 <span class="new-tag">New</span> 
                           @endif
                           <!-- Content --> 
                           <span class="tag">{{$related_product->category->name}}</span> <a href="{{url('product-details/'.$related_product->id)}}" class="tittle">{{$related_product->name}}</a> </br>
                           <!-- Reviews -->
                           <div class="price">£{{$related_product->price}}</div>
                           <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> 
                        </article>
                     </div>
                     @endforeach
                  </div>
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