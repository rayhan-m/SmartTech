
@extends('master')

@section('mainContent')
  <!-- Slid Sec -->
  <section >
    <div class="container">
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- Main Slider  -->
          <div class="col-md-12 no-padding" style="margin-left: -15px;"> 
            

            <div class="container">
              <div id="myCarousel" style="height: 500px;" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{ asset('frontend/images/slider/1.jpg')}}" alt="Los Angeles" style="width:100%; height:500px;">
                  </div>

                  <div class="item">
                    <img src="{{ asset('frontend/images/slider/2.jpg')}}" alt="Chicago" style="width:100%; height:500px;">
                  </div>
                
                  <div class="item">
                    <img src="{{ asset('frontend/images/slider/3.jpg')}}" alt="New york" style="width:100%; height:500px;">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Shipping Info -->
    <section class="shipping-info">
      <div class="container">
        <ul>
          
          <!-- Free Shipping -->
          <li>
            <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
            <div class="media-body">
              <h5>Free Shipping</h5>
              <span>On order over £99</span></div>
          </li>
          <!-- Money Return -->
          <li>
            <div class="media-left"> <i class="flaticon-arrows"></i> </div>
            <div class="media-body">
              <h5>Money Return</h5>
              <span>30 Days money return</span></div>
          </li>
          <!-- Support 24/7 -->
          <li>
            <div class="media-left"> <i class="flaticon-operator"></i> </div>
            <div class="media-body">
              <h5>Support 24/7</h5>
              <span>Hotline: (+100) 123 456 7890</span></div>
          </li>
          <!-- Safe Payment -->
          <li>
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body">
              <h5>Safe Payment</h5>
              <span>Protect online payment</span></div>
          </li>
        </ul>
      </div>
    </section>
    

    <!-- Top Selling Week -->
    <section class="light-gry-bg padding-top-60 padding-bottom-30">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Top Selling Products</h2>
          <hr>
        </div>
        
        <!-- Items -->
        <div class="item-col-5"> 

          <!-- Product -->
          @foreach ($products as $product)
              <div class="product">
            <article> <img class="img-responsive" style="height:120px;" width="auto;" src="{{asset('/')}}{{@$product->image}}" alt="" >
              @if ($product->product_status==1)
                  <span class="new-tag">New</span> 
              @endif
        
              <!-- Content --> 
            <span class="tag">{{@$product->category->name}}</span> <a href="{{url('product-details/'.@$product->id)}}" class="tittle">{{@$product->name}}</a> </br>
              <!-- Reviews -->
              
              <div class="price">£{{@$product->price}}</div>
            <a href="{{ url('cart-store/'.$product->id.'/1')}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <!-- Main Tabs Sec -->
    <section class="main-tabs-sec padding-top-60 padding-bottom-0">
      <div class="container">
        <!-- heading -->
        <div class="heading">
          <h2>New Products</h2>
          <hr>
        </div>
        <!-- Tab panes -->
        <div class="tab-content"> 
          
          <!-- TV & Audios -->
          <div role="tabpanel" class="tab-pane active fade in" id="tv-au"> 
            
            <!-- Items -->
            <div class="item-slide-5 with-bullet no-nav"> 

              @foreach ($nwe_products as $pro)
                  <!-- Product -->
              <div class="product">
                <article> <img style="height:120px;" width="auto;" class="img-responsive" src="{{asset('/')}}{{@$pro->image}}" alt="" > 
                  @if (@$pro->product_status==1)
                    <span class="new-tag">New</span> 
                @endif
                  <!-- Content --> 
                  <span class="tag">{{@$pro->category->name}}</span> <a href="{{url('product-details/'.@$product->id)}}" class="tittle">{{@$pro->name}}</a> </br>
                  <!-- Reviews -->
                  <div class="price">£{{@$product->price}} </div>
                  <a href="{{ url('cart-store/'.@$product->id.'/1')}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Top Selling Week -->
    <section class="padding-top-60 padding-bottom-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>From our Blog</h2>
          <hr>
        </div>
        <div id="blog-slide" class="with-nav"> 
          @foreach ($blogs as $item)
            <!-- Blog Post -->
            <div class="blog-post">
            <article> <img class="img-responsive"  src="{{asset('/')}}{{$item->image}}" alt="" > <span><i class="fa fa-bookmark-o"></i> {{$item->post_date}}</span> <a href="{{url('blog-details/'.@$item->id)}}" class="tittle">{{$item->title}} </a>
                <p>{{ Str::limit($item->details, 200) }}</p>
                <a href="#.">Readmore</a> </article>
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