 @php
      $categories=App\Category::where('active_status',1)->orderBy('id', 'ASC')->get();
      $setting=App\GeneralSetting::where('active_status',1)->first();
 @endphp
 <!-- Footer -->
  <footer>
    <div class="container"> 
      
      <!-- Footer Upside Links -->
      <div class="foot-link">
        <ul>
          <li><a href="#."> About us </a></li>
          <li><a href="#."> Customer Service </a></li>
          <li><a href="#."> Privacy Policy </a></li>
          <li><a href="#."> Site Map </a></li>
          <li><a href="#."> Search Terms </a></li>
          <li><a href="#."> Advanced Search </a></li>
          <li><a href="#."> Orders and Returns </a></li>
          <li><a href="#."> Contact Us</a></li>
        </ul>
      </div>
      <div class="row"> 
        
        <!-- Contact -->
        <div class="col-md-4">
          <h4>Contact {{$setting->site_title}}!</h4>
          <p>{{$setting->location}}</p>
          <p>Phone: {{$setting->phone}}</p>
          <p>Email: {{$setting->email}}</p>
          <div class="social-links"> <a href="{{$setting->f_url}}"><i class="fa fa-facebook"></i></a> <a href="{{$setting->t_url}}"><i class="fa fa-twitter"></i></a></a> <a href="{{$setting->i_url}}"><i class="fa fa-instagram"></i></a> <a href="{{$setting->g_url}}"><i class="fa fa-github"></i></a> </div>
        </div>
        
        <!-- Categories -->
        <div class="col-md-3">
          <h4>Categories</h4>
          <ul class="links-footer">
             @foreach ($categories as $category)
                <li><a href="{{url('products/'.$category->id)}}"> {{$category->name}}</a></li>
              @endforeach
          </ul>
        </div>
        
        <!-- Categories -->
        <div class="col-md-3">
          <h4>Customer Services</h4>
          <ul class="links-footer">
            <li><a href="#.">Shipping & Returns</a></li>
            <li><a href="#."> Secure Shopping</a></li>
            <li><a href="#."> International Shipping</a></li>
            <li><a href="#."> Affiliates</a></li>
            <li><a href="#."> Contact </a></li>
          </ul>
        </div>
        
        <!-- Categories -->
        <div class="col-md-2">
          <h4>Information</h4>
          <ul class="links-footer">
            <li><a href="#.">Our Blog</a></li>
            <li><a href="#."> About Our Shop</a></li>
            <li><a href="#."> Secure Shopping</a></li>
            <li><a href="#."> Delivery infomation</a></li>
            <li><a href="#."> Store Locations</a></li>
            <li><a href="#."> FAQs</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Rights -->
  <div class="rights">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p class="m-0">{!! $setting->copyright_text !!} </p>
        </div>
        <div class="col-sm-6 text-right"> <img src="images/card-icon.png" alt=""> </div>
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="{{asset('frontend/js/vendors/jquery/jquery.min.js')}}"></script> 
<script src="{{asset('frontend/js/vendors/wow.min.js')}}"></script> 
<script src="{{asset('frontend/js/vendors/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/js/vendors/own-menu.js')}}"></script> 
<script src="{{asset('frontend/js/vendors/jquery.sticky.js')}}"></script> 
<script src="{{asset('frontend/js/vendors/owl.carousel.min.js')}}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{asset('frontend/rs-plugin/js/jquery.tp.t.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/rs-plugin/js/jquery.tp.min.js')}}"></script> 
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>

<!-- Mirrored from event-theme.com/themes/html/smarttech/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 18:17:18 GMT -->
</html>