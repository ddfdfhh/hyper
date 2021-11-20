@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     {{--<h1>Intialcoin Offering</h1>--}}
                  </div>
               </div>
            </div>
         </section>
          <!--<section class="">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 pt-4 pb-4 text-center">
                     <h5>Our goal here is to provide low prices on high quality
products and excellent service.</h5>
                  </div>
               </div>
            </div>
         </section>-->
         <section class="services_section padd-row">
             <div class="container">
             <div class="row">
                 <div class="col-md-7">
                    <div class="serv_sec">
                     <h2>Hyper Community Platform</h2>
                        <div class="sw_info_sec mt-3">
                        <ul>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Make new friends around the world using our chatrooms and forums</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Interactive and downloadable Educational content</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Showcasing community artwork and scientific findings to create gallery walls</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> NFT creation and Marketplace</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Crypto Token start up service</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Hyper Meteor Online Store</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> A forever growing platform for the community</li>
                        </ul>
                            <div class="mt-5">
                             
                              <a href="{{ route('services') }}" class=" me-3 common_btn common_yello">Buy Now </a>
                              <a href="{{ route('contactus') }}" class="common_btn common_blue">Chat Now</a>
                           </div>
                     </div>
                     </div>
                 </div>
                 <div class="col-md-5">
                    <img src="{{ url('assets/frontend/images/sev.jpeg') }}">
                 </div>
                 </div>
             </div>
             
         </section>
          <section class="tab_section padd-row">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <ul class="sev_tab nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Hyper Sensor Array Products</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Hyper Exchange</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="sw_info_sec mt-3">
                        <ul>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Capture footage of the stars and more</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Time slot booking system</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Captured footage ownership provided to the customer by way of NFT and the blockchain</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Providing additional services to Crypto adopting countries</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}">More Information Coming Soon!</li>
                        </ul>
                            
                     </div>
    
    </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <div class="sw_info_sec mt-3">
                        <ul>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Supporting new start up tokens in their quest for exposure and investments</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Affordable Listing</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Subscription service</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> In partnership with prestigious exchanges with the aim to create a programs to achieve listing discounts for maturing projects/tokens</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> Additional services along the way</li>
                           <li><img src="{{ url('assets/frontend/images/svg/arrow.svg') }}"> More Information Coming Soon!</li>
                        </ul>
                            
                     </div></div>
</div>
                  </div>
                </div>
              </div>
          </section>
      </main>
@endsection

@section('script')

@endsection