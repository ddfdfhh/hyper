@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h1>About Us</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="about_text">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 pt-4 pb-4 text-center">
                     <!--<h5>Our goal here is to provide
					 low prices on high quality products and excellent service.</h5>-->
                  </div>
               </div>
            </div>
         </section>
         <section class="about_Hyper_Unity padd-row">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                    <h2>Who are Hyper Meteor Ltd?</h2>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                     <p class="mb-0">Hyper Meteor Ltd strives to encourage as many people as possible to look up at the stars and start dreaming of what is possible in the future. An international communications and education network, providing the very best, brightest and courageous people working tirelessly toward making space a place not just of distant wonder but a place we live, work and play. One company branching into three directions, each branch specialising in the fundamentals required to provide an engaging and interactive experience for all.</p>
                  </div>
               </div>
            </div>
         </section>
         <section class="box_hyper_unity padd-row">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-9 col-md-12 col-sm-12 col-12 ">
                     <div class="video_div">
                        <iframe width="100%" height="510" src="https://www.youtube.com/embed/Fs-wxMYNb5U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="services_text padd-row">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 mb-4">
                     <div class="srv_box">
                        <div class="row align-items-center">
                           <div class="col-md-8">
                              <h2>01 – Hyper Unity</h2>
                              <p>
                                  TALU! Our community platform is an innovative and diverse place for those with a common interest in Astronomy,
                                  NFTs and Cryptocurrencies. Make new connections with people from around the world. 
                                  Upload cool snaps to make your community members say WOW! and of course use our hyper tokens with a purpose! Let
                                  your artistic dreams come alive as we look to the stars together! 
                              </p>
                            </div>
                           <div class="col-md-4">
						  
						   <img src="{{ url('assets/frontend/images/Hyper-Unity.jpg') }}">
                              <!--<img src="images/unity-t.png">-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mb-4">
                     <div class="srv_box">
                        <div class="row align-items-center">
                           <div class="col-md-8">
                              <h2>02 – Hyper Sensor Array</h2>
                              <p>The first major product of Hyper Meteor Ltd. A product that brings the delights of the stars to everyday people. Look to the sky and use our Hyper Sensor Array products to do it!</p>
                           </div>
                           <div class="col-md-4">
						   
						    <img src="{{ url('assets/frontend/images/Hyper-Sensor-Array.jpg') }}">
                              <!--<img src="images/sc.jpg">-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="srv_box">
                        <div class="row align-items-center">
                           <div class="col-md-8">
                              <h2>03– Hyper Exchange</h2>
                              <p >We provide the opportunity for Crypto start up projects to have a great starting point, to grow and achieve great exposure for investments from around the globe. Affordable for all start up projects big and small.</p>
                           </div>
                           <div class="col-md-4">
						 
						   <img src="{{ url('assets/frontend/images/Hyper-Exchange.jpg') }}">
                              <!--<img src="images/XCHANGE-121.png">-->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
@endsection

@section('script')

@endsection