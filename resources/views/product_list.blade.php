@extends('master')

@section('mainContent')
     <!-- Linking -->
         <div class="linking">
            <div class="container">
               <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active"><a href="#">{{$cat_name->category->name}}</a></li>
               </ol>
            </div>
         </div>
         <!-- Content -->
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
            </div>
          </div>
            <!-- Items -->
            <div class="col-md-10">
                <div class="item-col-4"> 
               <!-- Product -->
                @foreach ($product_list as $product)
                <div class="product">
                    <article> <img class="img-responsive" style="height:120px;" width="auto;" src="{{asset('/')}}{{@$product->image}}" alt="" >
                    @if (@$product->product_status==1)
                        <span class="new-tag">New</span> 
                    @endif
                
                    <!-- Content --> 
                    <span class="tag">{{@$product->category->name}}</span> <a href="{{url('product-details/'.@$product->id)}}" class="tittle">{{@$product->name}}</a> </br>
                    <!-- Reviews -->
                    
                    <div class="price">${{@$product->price}}</div>
                    <a href="{{ url('cart-store/'.@$product->id.'/1')}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                </div>
                @endforeach
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
                         $related_products=App\Product::where('active_status',1)->where('category_id', $cat_name->category_id)->orderBy('id', 'DESC')->get();
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
                           <div class="price">${{$related_product->price}}</div>
                           <a href="{{ url('cart-store/'.@$product->id.'/1')}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> 
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