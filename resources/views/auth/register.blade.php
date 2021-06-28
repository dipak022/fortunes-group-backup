{{--@extends('layouts.backend.link')

@section('content')




      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
    
      <div class="seipkon-login-page-header-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-sm-4">
                  <div class="login-page-logo">
                     <a href="index.html">
                     <img src="assets/img/logo.png" alt="Seipkon Logo" />
                     </a>
                  </div>
               </div>
               <div class="col-md-8 col-sm-8">
                  <div class="login-page-logo-right">
                     <p>Already have an account? </p>
                     <a href="{{ route('login') }} ">Sign in</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
    
      <div class="seipkon-login-form-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-md-offset-4">
                  <div class="login-form-box">
                     <h3>Sign up to Seipkon</h3>
                     <form  method="POST" action="{{ route('register') }}" >

                        @csrf
                        <div class="form-group">
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name " >
                           @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror
                        </div>

                      

                        <div class="form-group">
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" >
                           @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror
                        </div>

                     

                        <div class="form-group">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Choose Password"  >

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                          

                        <div class="form-group">
                           <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" >
                        </div>

                        

                        <div class="form-group form-checkbox">
                           <input type="checkbox" id="chk_2" required >
                           <label class="inline control-label" for="chk_2">I Accept <a href="#">Terms and Conditions</a></label>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-layout-submit">
                                    <button type="submit" >sign up</button>
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
      
@endsection
--}}