@extends('master')

@section('mainContent')
     <!-- Linking -->
         <div class="linking">
            <div class="container">
               <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">{{$blog->title}}</a></li>
               </ol>
            </div>
         </div>
         <!-- Content -->
         <div id="content">
            <!-- Blog -->
      <section class="blog-single padding-top-30 padding-bottom-60">
         <div class="container">
         <div class="row">
            <div class="col-md-9"> 
               
               <!-- Blog Post -->
               <div class="blog-post">
               <article> <img class="img-responsive margin-bottom-20" src="{{asset('/')}}{{$blog->image}}" alt="" > <span>By: <strong>{{$blog->post_by}}</strong></span> <span><i class="fa fa-bookmark-o"></i> {{$blog->post_date}}</span> 
                  <h5>{{$blog->title}}</h5>
                  <p>{{$blog->details}}</p>
               </article>
               
               </div>
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