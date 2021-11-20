@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h1>SIGN IN</h1>
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
                     <form class="ewf-us-form" method="POST" action="{{ route('login') }}" >
                         @csrf
                        <div class="row">
                            <div class="col-md-12 mb-5 text-center">
                                <a href="{{ route('index') }}">
                                <img src="{{ asset('assets/frontend/images/blackslogo.png') }}">
                                </a>
                            </div>
                           <div class="col-md-12 mb-3">
                              <div class="form-group">
                                 <label>Enter Email</label>
                                 <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @if($errors->has('email'))
                                    <div class='error'>{{ $errors->first('email') }}</div>
                                @endif
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Enter Password</label>
                                 <input type="password" class="form-control" id="password"  name="password" required autocomplete="current-password">
                                @if($errors->has('password'))
                                    <div class='error'>{{ $errors->first('password') }}</div>
                                @endif
                              </div>
                           </div>
                           
                           <div class="col-md-12 mt-3">
                               <p><a href="{{\URL::to('/password/reset')}}" class="mt-2">Forgot Password?</a></p>
                               <button type="submit" class="common_btn common_yello">
                                    {{ __('Login') }}
                                </button>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('register') }}" class="mt-2">Haven't an account?</a>
                               {{--<input type="submit" name="submitcontact" class="common_btn common_yello" value="Login" id="submitcontactusform">--}}
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