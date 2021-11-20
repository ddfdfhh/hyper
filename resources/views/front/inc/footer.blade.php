<footer>
         <section class="footer_section">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="footer_ctn">
                        <div class="footer_logo">
                           <a href="{{ route('index') }}"><img src="{{ asset('assets/frontend/images/whitelogo_footer.png') }}"></a>
                        </div>
                        <p>Hyper Meteor Ltd strives to encourage as many people as possible to look up at the stars and start dreaming of what is possible in the future.</p>
                        <ul class="social_media">
                            @php $footer = Helper::instance()->general_settings('*'); @endphp
                           <li><a target="_blank" href="@if($footer && $footer->twitter){{ $footer->twitter }}@else{{ 'javascript:void(0)' }}@endif"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a target="_blank" href="@if($footer && $footer->instagram){{ $footer->instagram }}@else{{ 'javascript:void(0)' }}@endif"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                           <li><a target="_blank" href="@if($footer && $footer->reddit){{ $footer->reddit }}@else{{ 'javascript:void(0)' }}@endif"><i class="fa fa-reddit" aria-hidden="true"></i></a></li>
                           <li><a target="_blank" href="@if($footer && $footer->youtube){{ $footer->youtube }}@else{{ 'javascript:void(0)' }}@endif"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                           <li><a target="_blank" href="@if($footer && $footer->linkedin){{ $footer->linkedin }}@else{{ 'javascript:void(0)' }}@endif"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           
                           <li><a target="_blank" href="@if($footer && $footer->hyper){{ $footer->hyper }}@else{{ 'javascript:void(0)' }}@endif"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md"></div>
                  <div class="col-md-3">
                     <div class="menu_info_sec">
                        <h4>USEFUL LINKS</h4>
                        <ul>
                           <li><a href="{{ route('aboutus') }}"><img src="{{ asset('assets/frontend/images/svg/arrow.svg') }}"> Who are Hyper Meteor</a></li>
                           <li><a href="{{ route('services') }}"><img src="{{ asset('assets/frontend/images/svg/arrow.svg') }}"> Services</a></li>
                           <!--<li><a href="{{ route('team') }}"><img src="{{ asset('assets/frontend/images/svg/arrow.svg') }}"> Meet The Team</a></li>-->
                           <li><a href="{{ route('partnerships') }}"><img src="{{ asset('assets/frontend/images/svg/arrow.svg') }}"> Partners & Collaborations</a></li>
                           <li><a href="https://hypermeteor.shop/" target="_blank"><img src="{{ asset('assets/frontend/images/svg/arrow.svg') }}"> Shop</a></li>
                           <li><a href="{{ route('contactus') }}"><img src="{{ asset('assets/frontend/images/svg/arrow.svg') }}"> Contact Center</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="menu_info_sec">
                        <h4>GET IN TOUCH</h4>
                        <ul class="contact_info_details">
                           <li>
                              <a href="#">
                                 <img src="{{ asset('assets/frontend/images/svg/loc.svg') }}"> 
                                 <div class="contact_info_section">
                                    <p><strong>Address:</strong><br>@if($footer && $footer->address){{ $footer->address }}@else{{ 'Birmingham, United Kingdom' }}@endif</p>
                                 </div>
                              </a>
                           </li>
<!--
                           <li>
                              <a href="tel:+44-7010-7010">
                                 <img src="images/svg/call.svg"> 
                                 <div class="contact_info_section">
                                    <p><strong>Phone:</strong><br>+44-7010-7010</p>
                                 </div>
                              </a>
                           </li>
-->
                           <li>
                              <a href="mailto:info@hypermeteor.co.uk">
                                 <img src="{{ asset('assets/frontend/images/svg/mail.svg') }}"> 
                                 <div class="contact_info_section">
                                    <p><strong>Email:</strong><br>@if($footer && $footer->email){{ $footer->email }}@else{{ 'info@hypermeteor.co.uk' }}@endif</p>
                                 </div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="copy_right">
                        <p>Copyrights &copy; {{ date('Y') }} All Rights Reserved by <span>Hypermeteor.</span></p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </footer>