@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h1>Contact Us</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="contact_page padd-row">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 mb-lg-0 mb-5 col-lg-4">
                     <div class="contact_left">
                        <div class="common_heading heading_left_clr">
                           <h2>Contact Details</h2>
                        </div>
                        <ul class="contact_details mt-4">
                            @php $footer = Helper::instance()->general_settings('*'); @endphp
                           <li>
                              <i class="fa fa-map-marker" aria-hidden="true"></i>
                              <div class="contact_bxt">
                                 <h6>OFFICE LOCATION</h6>
                                 <p class="mb-0">@if($footer && $footer->address){{ $footer->address }}@else{{ 'Birmingham, United Kingdom' }}@endif</p>
                              </div>
                           </li>
                           {{--<li>
                              <i class="fa fa-phone" aria-hidden="true"></i>
                              <div class="contact_bxt">
                                 <h6>PHONE</h6>
                                 <a href="tel:@if($footer && $footer->phone){{ $footer->phone }}@else{{ '+44-7010-7010' }}@endif">@if($footer && $footer->phone){{ $footer->phone }}@else{{ '+44-7010-7010' }}@endif</a>
                              </div>
                           </li>--}}
                           <li>
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                              <div class="contact_bxt">
                                 <h6>EMAIL</h6>
                                 <a href="mailto:@if($footer && $footer->email){{ $footer->email }}@else{{ 'info@hypermeteor.co.uk' }}@endif">@if($footer && $footer->email){{ $footer->email }}@else{{ 'info@hypermeteor.co.uk' }}@endif</a>
                              </div>
                           </li>
                        </ul>
<!--                        <img class="" src="images/image-5.jpg">-->
                     </div>
                  </div>
                  <div class="col-md-12 mb-lg-0 col-lg-8">
                     <div class="contact_right">
                        <div class="common_heading heading_left_clr">
                           <h2>SEND YOUR MESSAGE</h2>
                           <p>Don't hesitate to contact us. Our Community support team aim to reply within 1 working day. </p>
                        </div>
                         @if (Session::has('successmessage'))
						<div class="row mb-3"><div class='error text-success'>{{ Session::get('successmessage') }}</div></div>
					@endif 
					@if (Session::has('errormessage'))
						<div class="row mb-3"><div class='error text-success'>{{ Session::get('errormessage') }}</div></div>
					@endif 
                        <form class="contact-us-form" action="{{ route('contactus') }}" method="post" id="contactusform" name="contactusform">
                            @csrf
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Enter Name</label>
                                    <input type="text" class="form-control" id="namecontactusform" name="name" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <div class='error text-danger'>{{ $errors->first('name') }}</div>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Enter Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phonecontactusform" value="{{ old('phone') }}">
                                    @if($errors->has('phone'))
                                        <div class='error text-danger'>{{ $errors->first('phone') }}</div>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Enter E-mail</label>
                                    <input type="email" class="form-control" id="emailcontactusform" name="email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <div class='error text-danger'>{{ $errors->first('email') }}</div>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Enter Message</label>
                                    <textarea class="form-control" rows="6" id="messagecontactusform" name="message">{{ old('message') }}</textarea>
                                    @if($errors->has('message'))
                                        <div class='error text-danger'>{{ $errors->first('message') }}</div>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-12"><input type="submit" name="submitcontact" class="common_btn common_blue" value="Submit" id="submitcontactusform"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
@endsection

@section('script')

@endsection