@extends('layouts.backend.link')

@section('content')




      <!-- Start Page Loading -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- End Page Loading -->
       
      <!-- Login Page Header Area Start -->
      <div class="seipkon-login-page-header-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-sm-4">
                  <div class="login-page-logo">
                      <a href="index.html">
                     <img src="public/Frontend/images/fortune.png" alt="Seipkon Logo" />
                     </a> 
                  </div>
               </div>
               <!-- <div class="col-md-8 col-sm-8">
                  <div class="login-page-logo-right">
                     <p>New to Seipkon?</p>
                     <a href=" {{ route('register') }}">Sign up</a>
                  </div>
               </div>--> 
            </div>
         </div>
      </div>
      <!-- Login Page Header Area End -->
       
      <!-- Login Form Start -->
      <div class="seipkon-login-form-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-md-offset-4">
                  <div class="login-form-box">
                     <h3>Sign in</h3>
                     <form method="POST" action="{{ route('login') }}" >

                         @csrf
                        <div class="form-group">
                           <input type="email"id="email" placeholder="Enter Email" class="form-control
                            @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                     

                        <div class="form-group">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" >
                           @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group form-checkbox">
                           <input type="checkbox" id="chk_2">
                           <label class="inline control-label" for="chk_2">Remember me</label>
                           <p class="lost-pass pull-right">
                              <a href="{{ url('password/reset') }}">forget you password?</a>
                           </p>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-layout-submit">
                                    <button type="submit" >Sign in</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Login Form End -->
@endsection
