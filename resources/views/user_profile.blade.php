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
          <div class="col-md-4 grid-margin stretch-card mb-40">
            <div class="card">
                <div class="card-body">
                    <img style="height: 150px; width:150px; margin-bottom: 50px; border-radius: 20px;" src="{{ file_exists(@$profile->image) ? asset(@$profile->image) : asset('backend/uploads/staff/customer.png') }}" class="img-lg rounded" alt="profile image" />
                    <div class="d-flex flex-row">
                        <div class="ml-2">
                            <form method="POST" action="{{route('update-image')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="image" class="file-upload-default">
                                </div>
                                <button class="btn-round" type="submit">Change Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
          <!-- Don’t have an Account? Register now -->
          <div class="col-md-4">
            <h5>Update Your Profile</h5>
            
            <!-- FORM -->
            <form method="POST" action="{{ route('update_profile') }}">
                @csrf
              <ul class="row">
                <li class="col-sm-12">
                  <label>Full Name
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ @$profile->name }}" required autocomplete="name" autofocus>
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Email
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ @$profile->email }}" required autocomplete="email">
                  </label>
                </li>
                
                <li class="col-sm-12">
                  <label>Phone No
                    <input type="text" onkeyup="isNumberKeyDecimal(this);"  value="{{ @$profile->phone }}" class="form-control" name="phone" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">Update</button>
                </li>
              </ul>
            </form>
          </div>
          <!-- Don’t have an Account? Register now -->
          <div class="col-md-4">
            <h5>Change Your Password</h5>
            
            <!-- FORM -->
            <form method="POST" action="{{url('change-password')}}" enctype="multipart/form-data">
                @csrf
              <ul class="row">
                
                <li class="col-sm-12">
                  <label>Current Password
                    <input id="password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required >
                    @if ($errors->has('current_password'))
                        <span class="invalid-feedback text-left pl-3" role="alert">
                            <strong style="color:red;">{{ $errors->first('current_password') }}</strong>
                        </span>
                    @endif
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>New Password
                    <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                      @if ($errors->has('new_password'))
                          <span class="invalid-feedback text-left pl-3" role="alert">
                              <strong style="color:red;">{{ $errors->first('new_password') }}</strong>
                          </span>
                      @endif
                  </label>
                </li>
                <li class="col-sm-12">
                    
                </li>
                
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">Update</button>
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