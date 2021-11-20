@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h1>Forget Password</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="join_sec padd-row">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-md-7">
                      @if (Session::has('status'))
                        <div class='alert alert-success col-md-12'>{{ Session::get('status') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class='alert alert-danger col-md-12'>{{ Session::get('error') }}</div>
                    @endif  
                     <form class="ewf-us-form" method="POST" action="{{ route('password.email') }}" >
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
                           
                           <div class="col-md-12 mt-3">
                               <button type="submit" class="common_btn common_yello">
                               {{ __('Send Password Reset Link') }}
                                </button>
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