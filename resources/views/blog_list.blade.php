@extends('master')

@section('mainContent')
     <!-- Linking -->
         <div class="linking">
            <div class="container">
               <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Blog</a></li>
               </ol>
            </div>
         </div>
         <!-- Content -->
         <div id="content">
            <!-- Blog -->
            <section class="blog-page padding-top-30 padding-bottom-60">
               <div class="container">
               <div class="row">
                  <div class="col-md-9"> 
                     @foreach ($blogs as $item)
                         <!-- Blog Post -->
                        <div class="blog-post">
                        <article class="row">
                           <div class="col-xs-7"> <img class="img-responsive" src="{{asset('/')}}{{@$item->image}}" alt="" > </div>
                           <div class="col-xs-5"> <span><i class="fa fa-bookmark-o"></i> {{@$item->post_date}}</span> <a href="#." class="tittle">{{@$item->title}} </a>
                              <p>{{ Str::limit(@$item->details, 200) }}</p>
                              <a href="{{url('blog-details/'.@$item->id)}}">Readmore</a></div>
                        </article>
                        </div>
                     @endforeach
                     
                     
                     
                     <!-- pagination -->
                     <ul class="pagination">
                     <li> <a href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a> </li>
                     <li><a class="active" href="#">1</a></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">3</a></li>
                     <li> <a href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>
                     </ul>
                  </div>
                  
                  <!-- Side Bar -->
                  <div class="col-md-3">
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