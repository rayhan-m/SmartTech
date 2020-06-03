@extends('master')

@section('mainContent')

<!-- Content -->
  <div id="content"> 
    
    <!-- Linking -->
    <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Authentication</li>
        </ol>
      </div>
    </div>
    
    <!-- Blog -->
    <section class="login-sec padding-top-30 padding-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-md-6"> 
            <!-- Login Your Account -->
            <h5>Login Your Account</h5>
            
            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <ul class="row">
                <li class="col-sm-12">
                  <label>Email
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                </li>
                <li class="col-sm-12">
                  <label>Password
                    <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                    </span>
                    @enderror
                  </label>
                </li>
                <li class="col-sm-6">
                  <div class="checkbox checkbox-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="cate1"> Keep me logged in </label>
                  </div>
                </li>
                <li class="col-sm-6"> <a href="#." class="forget">Forgot your password?</a> </li>
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">Login</button>
                </li>
              </ul>
            </form>
          </div>
          
          <!-- Don’t have an Account? Register now -->
          <div class="col-md-6">
            <h5>Don’t have an Account? Register now</h5>
            
            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <ul class="row">
                <li class="col-sm-12">
                  <label>Full Name
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Email
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Password
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Confirm Password
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Phone No
                    <input type="text" onkeyup="isNumberKeyDecimal(this);" class="form-control" name="phone" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">Register</button>
                </li>
              </ul>
            </form>
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