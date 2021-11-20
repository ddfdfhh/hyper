@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h1>SIGN UP</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="join_sec padd-row">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-md-7">
                    @if (Session::has('successmessage'))
                        <div class='alert alert-success col-md-12'>{{ Session::get('successmessage') }}</div>
                    @endif
                    @if (Session::has('errormessage'))
                        <div class='alert alert-danger col-md-12'>{{ Session::get('errormessage') }}</div>
                    @endif    
                     <form class="ewf-us-form" action="{{ route('user.register') }}" method="post">
                         @csrf
                        <div class="row">
                            <div class="col-md-12 mb-5 text-center">
                                <a href="{{ route('index') }}">
                                 <img src="{{ asset('assets/frontend/images/blackslogo.png') }}">
                                </a>
                            </div>
                           <div class="col-md-6 ">
                              <div class="form-group">
                                 <label>Enter Username *</label>
                                 <input type="text" class="form-control" id="nameregister" name="name" value="{{ old('name') }}">
                                 @if($errors->has('name'))
                                    <div class='error'>{{ $errors->first('name') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-6 ">
                              <div class="form-group">
                                 <label>Enter E-mail *</label>
                                 <input type="email" class="form-control" id="emailregister" name="email" value="{{ old('email') }}">
                                 @if($errors->has('email'))
                                    <div class='error'>{{ $errors->first('email') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-6  mt-3">
                              <div class="form-group">
                                 <label>Enter Date Of Birth *</label>
                                 <input type="date" class="form-control" id="dobregister" name="dob" value="{{ old('dob') }}">
                                 @if($errors->has('dob'))
                                    <div class='error'>{{ $errors->first('dob') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-6  mt-3">
                              <div class="form-group">
                                 <label>Whatsapp Number</label>
                                 <input type="text" class="form-control" id="watsappregister" name="watsapp" value="{{ old('watsapp') }}">
                                 @if($errors->has('watsapp'))
                                    <div class='error'>{{ $errors->first('watsapp') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-12  mt-3">
                              <div class="form-group">
                                 <label>Twitter Link</label>
                                 <input type="text" class="form-control" id="twitterlinkregister" name="twitter_link" value="{{ old('twitter_link') }}">
                                 @if($errors->has('twitter_link'))
                                    <div class='error'>{{ $errors->first('twitter_link') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-6  mt-3">
                              <div class="form-group">
                                 <label>Password *</label>
                                 <input type="password" class="form-control" id="passwordregister" name="password" value="">
                                 @if($errors->has('password'))
                                    <div class='error'>{{ $errors->first('password') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-6  mt-3">
                              <div class="form-group">
                                 <label>Confirm Password *</label>
                                 <input type="password" class="form-control" id="cpasswordregister" name="cpassword" value="">
                                 @if($errors->has('cpassword'))
                                    <div class='error'>{{ $errors->first('cpassword') }}</div>
                                @endif
                              </div> 
                           </div>
                           <div class="col-md-12 mt-3">
                               <input type="submit" name="submitcontact" class="common_btn common_yello" value="Sign Up" id="submitcontactusform">
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('login') }}" class="mt-2">Have an existing account?</a>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </section>
      </main>
@endsection

@section('script')

@endsection