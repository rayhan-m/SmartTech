@php
    $setting=App\GeneralSetting::where('active_status',1)->first();
    $categories=App\Category::where('active_status',1)->orderBy('id', 'ASC')->get();
@endphp
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from event-theme.com/themes/html/smarttech/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 18:14:32 GMT -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="M_Adnan" />
<!-- Document Title -->
<!-- Favicon -->
    <title>{{$setting->site_name}} | {{$setting->site_title}}</title>
    <link rel="shortcut icon" href="{{asset('/')}}{{ $setting->fav }}" />

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/rs-plugin/css/settings.css" media="screen') }}" />

<!-- StyleSheets -->
<link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


<!-- JavaScripts -->
<script src="{{ asset('frontend/js/vendors/modernizr.js') }}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : (event.keyCode);
            if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return false;
            }
            return true;
        }
    </script>
     <script type="text/Javascript">
        function isNumberKeyDecimal(el){
            var ex = /^[0-9]+\.?[0-9]*$/;
                if(ex.test(el.value)==false){
                el.value = el.value.substring(0,el.value.length - 1);
            }
        }
</script>
<!-- Page Wrapper -->
<div id="wrap" class="layout-1"> 
  
  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
      <p>Welcome to {{$setting->site_title}}!</p>
      <div class="right-sec">
        <ul>
          @guest
            <li><a href="{{ route('login') }}">Login/Register </a></li>
          @else
            <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          @endguest
          <li><a href="{{url('contact')}}">Store Location </a></li>
          @if (Auth::check())
            {{-- <li><a href="#.">Previous History </a></li> --}}
          <li><a href="{{url('user-profile')}}">( {{ Auth::user()->name }} )</a></li>
          @endif

        </ul>
        <div class="social-top"> <a href="{{$setting->f_url}}"><i class="fa fa-facebook"></i></a> <a href="{{$setting->t_url}}"><i class="fa fa-twitter"></i></a></a> <a href="{{$setting->i_url}}"><i class="fa fa-instagram"></i></a> <a href="{{$setting->g_url}}"><i class="fa fa-github"></i></a> </div>
      </div>
    </div>
  </div>
  
  <!-- Header -->
  <header>
    <div class="container">
    <div class="logo"> <a href="{{url('/')}}"><img style="height:50px; width:150px;" src="{{asset('/')}}{{$setting->logo}}" alt="" ></a> </div>
      <div class="search-cate">
       <form action="{{url('products/by_search')}}" method="POST">
        @csrf
        <select class="selectpicker">
          <option> All Categories</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <input type="text" name="key" placeholder="Search entire store here...">
        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
        </form>
      </div>
      
      <!-- Cart Part -->
      <ul class="nav navbar-right cart-pop">
        <li> <a href="{{route('cart')}}"  role="button" ><span class="itm-cont">{{Cart::content()->count()}}</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
          <span>{{Cart::count()}} item(s) - £{{Cart::priceTotal()}}</span></a>
        </li>
      </ul>
    </div>
    
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container"> 
        
        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Our Categories </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">
              <ul>
                  @foreach ($categories as $category)
                    <li><a href="{{url('products/'.$category->id)}}"> {{$category->name}}</a></li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
        </div>
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
          <li class="dropdown megamenu"> <a href="{{url('/')}}">Home </a></li>
            <li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Shop </a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                 @foreach ($categories as $category)
                    <li><a href="{{url('products/'.$category->id)}}"> {{$category->name}}</a></li>
                  @endforeach
              </ul>
            </li>
            
            <li class="dropdown"> <a href="{{url('blog-list')}}">Blog</a>
            </li>
            <li> <a href="{{url('about-us')}}">About Us </a></li>
            <li> <a href="{{url('contact')}}">Contact </a></li>
          </ul>
        </div>
        
        <!-- NAV RIGHT -->
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong> {{$setting->phone}}</span> </div>
      </div>
    </nav>
  </header>