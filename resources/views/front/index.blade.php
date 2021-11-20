@extends('front.layouts.layout')
@section('content')
<main>
         <section class="slider_main">
            <div class="slider_section">
               <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  </div>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img src="{{ asset('assets/frontend/images/slider.jpg') }}" class="w-100" alt="...">
                        <div class="carousel-caption">
                           <div class="slider_cnt">
                              <h1>Introducing Hyper Meteor Ltd</h1>
                              <p>We encourage and educate the next generation with a focus on space, science and the future of humanity.</p>
                              <a href="{{ route('contactus') }}" class="common_btn common_yello">Contact Us </a>
                              <a href="{{ route('team') }}" class="common_btn common_blue">Join Us</a>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <img src="{{ asset('assets/frontend/images/slider-2.jpg') }}" class="w-100" alt="...">
                        <div class="carousel-caption">
                           <div class="slider_cnt">
                              <h1>Hyper Community</h1>
                              <p>An exciting home for our communities around the world to be part of, to interact with and learn from.</p>
                              <a href="{{ route('contactus') }}" class="common_btn common_yello">Contact Us </a>
                              <a href="{{ route('register') }}" class="common_btn common_blue">Join Us</a>
                           </div>
                        </div>
                     </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/frontend/images/slider-3.jpg') }}" class="w-100" alt="...">
                        <div class="carousel-caption">
                           <div class="slider_cnt">
                              <h1>Hyper Sensor Array</h1>
                              <p>Product that brings the delights of the stars to everyday people. Coming Soon!  </p>
                              <a href="{{ route('register') }}" class="common_btn common_yello">Join Us</a>
                              <a href="javascript:void(0)" class="common_btn common_blue">More Information </a>
                           </div>
                        </div>
                     </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/frontend/images/slider-4.jpg') }}" class="w-100" alt="...">
                        <div class="carousel-caption">
                           <div class="slider_cnt">
                              <h1>Hyper Exchange </h1>
                               <p class="mb-0"><strong>Maximise your token potential!</strong></p>
                              <p>The first place to list your brand-new tokens. Coming Soon!  </p>
                              <a href="{{ route('register') }}" class="common_btn common_yello">Join Us</a>
                              <a href="javascript:void(0)" class="common_btn common_blue">More Information </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"><img src="{{ asset('assets/frontend/images/svg/awesome-arrow-left.svg') }}"></span>
               <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"><img src="{{ asset('assets/frontend/images/svg/awesome-arrow-right.svg') }}"></span>
               <span class="visually-hidden">Next</span>
               </button>
            </div>
         </section>
         
    
         <section class="about_Hyper_Unity padd-row">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                     <h2>Who are Hyper Meteor Ltd?</h2>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                     <p class="mb-0">Hyper Meteor Ltd strives to encourage as many people as possible to look up at the stars and start dreaming of what is possible in the future. An international communications and education network, providing the very best, brightest and courageous people working tirelessly toward making space a place not just of distant wonder but a place we live, work and play.</p>
                  </div>
               </div>
            </div>
         </section>
         <section class="box_hyper_unity padd-row">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-9 col-md-12 col-sm-12 col-12 text-center">
                      <p>One company branching into three directions, each branch specialising in the fundamentals required to provide an engaging and interactive experience for all.</p>
                     <div class="video_div">
                        <iframe width="100%" height="510" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src="https://www.youtube.com/embed/Fs-wxMYNb5U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		 
	
         <section class="Hyper_Unity padd-row">
            <div class="container">
               <div class="row align-items-center white_head_brder">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                     <h2>Our Community Platform</h2>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                     <!--<p class="mb-0">We provide the opportunity for 
					 Crypto start up projects to have a great starting point, 
					 to grow and achieve great exposure for investments from 
					 around the globe. Affordable for all start up projects 
					 big and small.</p>-->
                  </div>
               </div>
            </div>
         </section>
         <section class="box_hyper_unity padd-row">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                     <div class="hyper_box_ut">
                        <img src="{{ asset('assets/frontend/images/hyper-unity.jpg') }}">
                        <div class="hypur_box_tup">
                           <span class="serial_box">01</span>
                           <h4>Hyper Unity</h4>
                           <p style="text-align:justify">TALU! Our community platform is an innovative and diverse place for those with a common interest in Astronomy, NFTs and Cryptocurrencies. Make new connections with people from around the world.
                          ... </p>
                           <a href="/who-are-hypo-meteor">Read more >></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                     <div class="hyper_box_ut">
                        <img src="{{ asset('assets/frontend/images/Hyper-Sensor-Array.jpg') }}">
                        <div class="hypur_box_tup">
                           <span class="serial_box">02</span>
                           <h4>Hyper Sensor Array </h4>
                           <p style="text-align:justify">The first major product of Hyper Meteor Ltd. A product that brings the delights of the stars to everyday people. L
                           ook to the sky and use our Hyper Sensor Array products to do it!...</p>
                           <a href="/who-are-hypo-meteor">Read more >></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-0">
                     <div class="hyper_box_ut">
                        <img src="{{ asset('assets/frontend/images/Hyper-Exchange.jpg') }}">
                        <div class="hypur_box_tup">
                           <span class="serial_box">03</span>
                           <h4>Hyper Exchange </h4>
                           <p style="text-align:justify">We provide the opportunity for Crypto start up projects to have a great starting point,
                           to grow and achieve great exposure for investments from around the globe. Affordable for all start up projects big and small...</p>
                           <a href="/who-are-hypo-meteor">Read more</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 text-center">
                     <p class="hyper_last_linge">Join our Hyper community platform today!  <strong><a href="javascript:void(0)">Click Here</a></strong></p>
                  </div>
               </div>
            </div>
         </section>
         
         
         <!--
         
         <section class="meet_team padd-row">
            <div class="container">
               <div class="row align-items-center white_head_brder">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                     <h2>MEET THE TEAM</h2>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                     <p class="mb-0">One company branching into three directions, each branch specialising in the fundamentals required to provide an engaging and interactive experience for all.</p>
                  </div>
               </div>
               <div class="row mt-5 justify-content-center">
                  <div class="col-md-12">
                     <div class="owl-carousel owl-theme">
                         <div class="item">
                           <div class="meeet_team">
                              <div class="row justify-content-center">
                                 <div class="col-md-8">
                                    <div class="teams_section_cnt">
                                       <p>Aadon brings all the pieces of the project together. Overseeing the development of the companies business goals and objectives.</p>
                                       <h5>Aadon</h5>
                                       <p>CEO</p>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="teams_section_img">
                                       <img src="{{ asset('assets/frontend/images/Don.png') }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                       
                         <div class="item">
                           <div class="meeet_team">
                              <div class="row  justify-content-center">
                                 <div class="col-md-8">
                                    <div class="teams_section_cnt">
                                       <p>Clive breaths life into all things visual and digital. Growing our NFT portfolio and engaging with the community to produce fine works of art and imagery for Hyper Meteor Ltd. He will work alongside members of the executive management team also.</p>
                                       <h5>Clive</h5>
                                       <p>CCO</p>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="teams_section_img">
                                       <img src="{{ asset('assets/frontend/images/Clive.png') }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                         <div class="item">
                           <div class="meeet_team">
                              <div class="row justify-content-center">
                                 <div class="col-md-8">
                                    <div class="teams_section_cnt">
                                       <p>Freidrich is our smart contract and Blockchain master with years of experience in computer science, cyber security and programming. He has successfully launched and administered several innovative and complex smart contracts in the ICO, ITS and IDO field. </p>
                                       <h5>Freidrich</h5>
                                       <p>CTO</p>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="teams_section_img">
                                       <img src="{{ asset('assets/frontend/images/Freidrich.png') }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                         
                         <div class="item">
                           <div class="meeet_team">
                              <div class="row  justify-content-center">
                                 <div class="col-md-8">
                                    <div class="teams_section_cnt">
                                       <p>Miquel is the driving force in bringing new ideas to the Hyper Meteor Ltd table. Vast experience and knowledge of Crypto and the blockchain, he thrives to grow Hyper Meteor Ltd to be a major player in the space, science and education industries</p>
                                       <h5>Miquel</h5>
                                       <p>CIO</p>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="teams_section_img">
                                       <img src="{{ asset('assets/frontend/images/Miquel.png') }}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                         
                         
                         
                        
                     </div>
                  </div>
               </div>
            </div>
            
            -->
            
            
            
            
            
         </section>
         <section class="mission-one padd-row">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 mb-4 text-center">
                     <h2>MISSION ONE</h2>
                     <span class="hyper_unity">HyperUnity Token</span>
                  </div>
                  <div class="col-md-3">
                     <div class="mission_hyper text-center">
                        <img src="{{ asset('assets/frontend/images/svg/COMMUNITY-PLATFORM-LAUNCH.svg') }}">
                        <h4>COMMUNITY PLATFORM<br>
                           LAUNCH
                        </h4>
                         <a href="#"> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="mission_hyper text-center">
                        <img src="{{ asset('assets/frontend/images/svg/PRIVATE-PRE-SALE.svg') }}">
                        <h4>PARTNERSHIPS
                        </h4>
                         <a href="https://www.hypermeteor.co.uk/partnerships-and-collaborations"> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="mission_hyper text-center">
                        <img src="{{ asset('assets/frontend/images/svg/PUBLIC-PRE-SALE.svg') }}">
                        <h4>PUBLIC PRE<br>
                           SALE
                        </h4>
                         <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="mission_hyper text-center">
                        <img src="{{ asset('assets/frontend/images/svg/HYPERUNITY-LAUNCH.svg') }}">
                        <h4>HYPERUNITY TOKEN<br>
                           LAUNCH
                        </h4>
                         <a href="#"> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="lst_section padd-row">
            <div class="container">

               <div class="row">
                  <div class="col-md-3 mb-3">
                     <div class="lst_section_ox">
                        <img src="{{ asset('assets/frontend/images/PRIVATE-SALE.jpg') }}">
                        <div class="content_box_last text-center">
                           <h4>JOIN THE PRIVATE PRE SALE NOW</h4>
                           <a href="#" class="common_btn common_yello">Complete</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 mb-3">
                     <div class="lst_section_ox">
                        <img src="{{ asset('assets/frontend/images/PUBLIC-SALE.jpg') }}">
                        <div class="content_box_last text-center">
                           <h4>PUBLIC PRE SALE</h4>
                           
                           <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#JoinModal" class="common_btn common_yello">Buy Now</a>
                            <div class="modal fade" id="JoinModal" tabindex="-1" aria-labelledby="JoinModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1>PUBLIC PRE SALE</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                     <div class='alert alert-danger col-md-12 tokenPresaleFormrror' style="display:none;text-align: left;"></div>
                                     <form class="ewf-us-form" action="" method="post" id='tokenPresaleForm'>
                                         @csrf
                                                      <div class="row">
                                                         <div class="col-md-6 ">
                                                            <div class="form-group">
                                                               <label>Enter Amount (USD)</label>
                                                               <input type="text" class="form-control" id="presaleform_amount" name="presale_amount" value="" onkeyup="getethereumValue(this.value)">
                                                               <span style="font-size: 14px;color: red;font-weight: 500;">Entered amount must be less than 1 Ethereum.</span>
                                                            </div>
                                                         </div>

                                                         <div class="col-md-6 ">
                                                            <div class="form-group">
                                                               <label>Ethereum Amount</label>
                                                               <input type="email" class="form-control" id="presaleform_ethereum" value="" readonly>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6  mt-3">
                                                            <div class="form-group">
                                                               <label>Hyper Unity Token </label>
                                                               <input type="text" class="form-control" id="presaleform_hymeteortoken" value="" readonly>
                                                            </div>
                                                         </div>
                                                         {{--<div class="col-md-6  mt-3">
                                                            <div class="form-group">
                                                               <label> Transaction Hash Number </label>
                                                               <input type="text" class="form-control" id="presaleform_hashnumber" value="" name="hash_number">
                                                            </div>
                                                         </div>--}}
                                                         <div class="col-md-6  mt-3">
                                                            <div class="form-group">
                                                               <label>Your Receive Ethereum Wallet </label>
                                                               <input type="text" class="form-control" id="presaleform_walletaddress" value="" name="yourwallet_address">
                                                            </div>
                                                         </div>
                                                         
                                                          <div class="col-md-6  mt-3">
                                                            <div class="form-group">
                                                               <label> Hyper Meteor LTD Wallet Address </label>
                                                               {{--<input type="text" class="form-control" id="presaleform_yourwallet" value="{{ Helper::instance()->general_settings('wallet_address')->wallet_address }}" name="wallet_address" readonly> --}}
                                                               {{--<span class="grp-hypow">{{ Helper::instance()->general_settings('wallet_address')->wallet_address }}</span>--}}
                                                               <input type="text" class="form-control" id="presaleform_yourwallet" value="{{ Helper::instance()->general_settings('wallet_address')->wallet_address }}" readonly style="font-size: 11px;">
                                                               <span class="js-textareacopybtn" style="cursor:pointer;">Click to copy.</span>
                                                            </div>
                                                         </div>
                                                         
                                                         <div class="col-md-12 mt-4"><input type="button" onclick="submittokenPresale()" name="presaleSubmit" class="common_btn common_yello" value="Submit" id="presaleSubmit"></div>
                                                         <div class="col-md-12">
                                                             <p class="alert alert-info mt-2">Once you have selected the desired amount of Hyper Unity you would like to purchase, 
                                                             complete the transaction by transferring your Ethereum to the ' Hyper Meteor LTD Wallet' and provide the Transaction Hash Number. 
                                                             Make sure to account for your gas fees, Then click, Submit. Your tokens will deposited to 'Your Ethereum wallet' within 24hrs.<br> 
                                                    Hyper Meteor LTD will not be held responsible for any information being input incorrectly.</p>
                                                         </div>
                                                      </div>
                                                   </form>
                                    </div>

                                  </div>
                                </div>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 mb-3">
                     <div class="lst_section_ox">
                        <img src="{{ asset('assets/frontend/images/JHYMETEOR-TOKEN.jpg') }}">
                        <div class="content_box_last text-center">
                           <h4>HYMETEOR TOKEN HOLDERS
                              REGISTRATION
                           </h4>
                           
                           {{--<a href="javascript:void(0)" class="common_btn common_yello" data-bs-toggle="modal" data-bs-target="#RegisterModal" id="tokenRegister">Register Now</a>--}}
                           <a href="javascript:void(0)" class="common_btn common_yello">Complete</a>
                           
                            <div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="RegisterModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1>HYMETEOR TOKEN HOLDERS REGISTRATION</h1>
                                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class='alert col-md-12 tokenerror tokencss' style="display:none;text-align: left;"></div>
                                   <form class="ewf-us-form" action="" method="post" id='tokenRegistration'>
                                       @csrf
                                                    <div class="row">
                                                       <div class="col-md-6 ">
                                                          <div class="form-group">
                                                             <label>Enter Username</label>
                                                             <input type="text" class="form-control" id="nametokenregistration" name="tokenform_name" value="">
                                                          </div>
                                                       </div>

                                                       <div class="col-md-6 ">
                                                          <div class="form-group">
                                                             <label>Enter E-mail</label>
                                                             <input type="email" class="form-control" id="emailtokenregistration" name="email" value="">
                                                          </div>
                                                       </div>
                                                       <div class="col-md-6  mt-3">
                                                          <div class="form-group">
                                                             <label>Password</label>
                                                             <input type="Password" class="form-control" id="passwordtokenregistration" name="password" value="">
                                                          </div>
                                                       </div>
                                                       <div class="col-md-6  mt-3">
                                                          <div class="form-group">
                                                             <label>Confirm Password</label>
                                                             <input type="Password" class="form-control" id="cpasswordtokenregistration" name="tokenform_cpassword" value="">
                                                          </div>
                                                       </div>
                                                       <div class="col-md-12  mt-3">
                                                          <div class="form-group">
                                                             <label>Hymeteor Wallet Address: </label>
                                                             <input type="text" class="form-control" id="walletaddresstokenregistration" name="tokenform_walletaddress" value="">
                                                          </div>
                                                       </div>

                                                        <div class="col-md-12 mt-4"><input type="button" onclick="submittokenRegistration()" name="submitcontact" class="common_btn common_yello" value="Register" id="submitcontactusform"></div>
                                                    </div>
                                                 </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="lst_section_ox">
                        <img src="{{ asset('assets/frontend/images/WHITE-PAPER.jpg') }}">
                        <div class="content_box_last text-center">
                           <h4>HYPER METEOR LTD
                              WHITEPAPER
                           </h4>
                           <a href="https://www.hypermeteor.co.uk/assets/frontend/pdf/Hyper-Unity-White-Paper.pdf" target="_blank" class="common_btn common_yello">GET</a>
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