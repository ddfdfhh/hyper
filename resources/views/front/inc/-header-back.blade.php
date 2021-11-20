<header>
         <section class="header_top">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                     <div class="mail_info">
                        <a href="mailto:info@hypermeteor.co.uk"><img src="{{ url('assets/frontend/images/svg/Icon-metro-mail-read.svg') }}"> info@hypermeteor.co.uk</a>
                     </div>
                  </div>
                 <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                     <div class="bit_details d-flex justify-content-end">
                        <!-- <a href="#">Buy ETH: $2462</a> -->
                     </div>
                  </div>
                  <div class="col-lg-2 d-lg-block  d-md-none  d-sm-none  d-none"></div>
                  <div class="col-lg-2 col-md-3  col-sm-4 col-6">
                     <div class="bit_details">
                        <!-- <a href="#">Sell ETH: $2465</a> -->
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                     <div class="sign_in_up d-flex justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                        @if(Auth::guest())
                         <a href="{{ route('login') }}">Sign In </a>&nbsp;\&nbsp;<a href="{{ route('register') }}"> Register</a>
                        @else
                            <a href="{{ route('user.dashboard') }}">My Account </a> &nbsp;\&nbsp;
                            <a href="{{ route('logout') }}">Logout </a>
                        @endif
                        {{--<a class="join_us" href="javascript:void(0)">Join Us</a>--}}
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="main_header">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg col-md col-sm col d-md-block d-none">
                     <div class="left_side_bar">
                        {{--<a href="#"  style="cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></a>--}}
                        <div id="mySidenav" class="sidenav">
                           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                           <div class="left_sider_section text-center">
                              <a href="#"> <img src="{{ url('assets/frontend/images/blackslogo.png') }}"></a>
<!--
                              <form class="side-us-form text-start" action="" method="post">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h3>Free Consultation</h3>
                                    </div>
                                    <div class="col-md-12 ">
                                       <div class="form-group">
                                          <label>Enter Name</label>
                                          <input type="text" class="form-control" id="namecontactusform" name="name" value="">
                                       </div>
                                    </div>
                                    <div class="col-md-12  mt-3">
                                       <div class="form-group">
                                          <label>Enter E-mail</label>
                                          <input type="email" class="form-control" id="emailcontactusform" name="email" value="">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label>Enter Message</label>
                                          <textarea class="form-control" rows="6" id="messagecontactusform" name="message"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-12 mt-3"><input type="submit" name="submitcontact" class="common_btn common_yello" value="submit" id="submitcontactusform"></div>
                                 </div>
                              </form>
-->
                              <div class="sldi_form">
                                 <div class="sign_in_up ">
                                    <a href="{{ route('login') }}" class="common_btn common_yello">Sign In </a>  <a href="{{ route('register') }}" class="common_btn common_blue"> Join Now</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-10 col-9">
                     <div class="mobile_menu">
                        <div class="header_logo_mobile">
                           <a href="{{ route('index') }}">
                               @php $logo = Helper::instance()->general_settings('logo'); @endphp
                               @if($logo->logo)
                                <img  src="{{ url('storage/app/'.$logo->logo) }}">
                               @else
                                <img  src="{{ url('assets/frontend/images/blackslogo-header.png') }}">
                               @endif
                           
                           </a>
                        </div>
                        <nav class="main-nav" role="navigation">
                           <input id="main-menu-state" type="checkbox" />
                           <label class="main-menu-btn" for="main-menu-state">
                           <span class="main-menu-btn-icon"></span> main menu
                           </label>
                           <ul id="main-menu" class="sm sm-clean">
                              <li><a href="javascript:void(0)">Who Are Hyper Meteor</a></li>
                              <!-- <li><a href="javascript:void(0)">Meet The Team</a></li> -->
                              <li><a href="javascript:void(0)" target="_blank">Store</a></li>
                              <li><a href="javascript:void(0)" target="_blank">NFT Store</a></li>
                              <li><a href="pdf/Hyper-Unity-White-Paper.pdf" target="_blank">White Paper</a></li>
                              <li><a href="javascript:void(0)">Contact Us</a></li>
                           </ul>
                        </nav>
                     </div>
                      
                     <nav class="navbar-expand-lg desktop_menu">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                           <ul class="navbar-nav start-nav">
                               
                              <li class="nav-item">
                                 <a class="nav-link active" aria-current="page" href="javascript:void(0)">Who Are Hyper Meteor</a>
                              </li>
                             <!-- <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Meet The Team</a></li> -->
                              <li class="nav-item"><a class="nav-link" target="_blank" href="javascript:void(0)">Store</a></li>
                           </ul>
                           <div class="header_logo">
                              <a href="{{ route('index') }}">
                              @php $logo = Helper::instance()->general_settings('logo'); @endphp
                               @if($logo->logo)
                                <img  class="header_logo_sin" src="{{ url('storage/app/'.$logo->logo) }}">
                               @else    
                              <img class="header_logo_sin" src="{{ url('assets/frontend/images/blackslogo-header.png') }}">
                              @endif
                              <img class="header_logo_bg" src="{{ url('assets/frontend/images/svg/logo_bg.svg') }}">
                              </a>
                           </div>
                           <ul class="navbar-nav last_nav">
                              <li class="nav-item"><a class="nav-link" href="https://app.refinable.com/profile/0x233deCc7b5b87741Ef3b414751b9aBF190462c2E" target="_blank">NFT Store</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('assets/frontend/pdf/Hyper-Unity-White-Paper.pdf') }}" target="_blank"> White Paper</a></li>
                              <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Contact Us</a></li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-lg col-md col-sm col">
                     <div class="left_side_bar text-end">
                        <a href="#"><i class="fa fa-search " aria-hidden="true"></i></a>
                         
                         
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </header>