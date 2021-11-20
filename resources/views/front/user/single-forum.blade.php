@extends('front.layouts.userlayout')
@section('content')
<style>
    .cftat_div{
        display:flex;
    }
    .cftat_div div{
        margin:10px;
    }
    </style>
<section class="main_section mt-4 text-white">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-3 order-md-1 order-md-2 order-2">
                  <div class="bg_box_fixed">
                     <div class="xf_inside">
                        <h4 class="padd-sec">Welcome to Hypermeter</h4>
                        <p class="padd-sec">
                   Hyper Meteor Ltd strives to encourage as many people as possible to look up at the stars and start dreaming of what is possible in the future. An international communications and education network, providing the very best, brightest and courageous people working tirelessly toward making space a place not just of distant wonder but a
                   place we live, work and play. One company branching into three directions, each branch specialising in the fundamentals required to provide an engaging and interactive experience for all.     </p>
                     </div>
                     <!--<div class="xf_inside mt-3">-->
                     <!--   <h4 class="padd-sec">Active Landers</h4>-->
                     <!--   <div class="box_text padd-sec">-->
                     <!--      <ul class="Active_Landers lagder">-->
                     <!--         <li>-->
                     <!--            <div class="active_lander_flex">-->
                     <!--               <img src="dashbord_img/profile.jpg">-->
                     <!--               <div class="active_flex">-->
                     <!--                  <h5>startagain</h5>-->
                     <!--                  <div class="userDescription" ><span>6,320 Followers</span></div>-->
                     <!--               </div>-->
                     <!--               <a href="#" class="follow_btn">FOLLOW</a>-->
                     <!--            </div>-->
                     <!--         </li>-->
                     <!--         <li>-->
                     <!--            <div class="active_lander_flex">-->
                     <!--               <img src="dashbord_img/profile.jpg">-->
                     <!--               <div class="active_flex">-->
                     <!--                  <h5>startagain</h5>-->
                     <!--                  <div class="userDescription" ><span>6,320 Followers</span></div>-->
                     <!--               </div>-->
                     <!--               <a href="#" class="follow_btn">FOLLOW</a>-->
                     <!--            </div>-->
                     <!--         </li>-->
                     <!--         <li>-->
                     <!--            <div class="active_lander_flex">-->
                     <!--               <img src="dashbord_img/profile.jpg">-->
                     <!--               <div class="active_flex">-->
                     <!--                  <h5>startagain</h5>-->
                     <!--                  <div class="userDescription" ><span>6,320 Followers</span></div>-->
                     <!--               </div>-->
                     <!--               <a href="#" class="follow_btn">FOLLOW</a>-->
                     <!--            </div>-->
                     <!--         </li>-->
                     <!--         <li>-->
                     <!--            <div class="active_lander_flex">-->
                     <!--               <img src="dashbord_img/profile.jpg">-->
                     <!--               <div class="active_flex">-->
                     <!--                  <h5>startagain</h5>-->
                     <!--                  <div class="userDescription" ><span>6,320 Followers</span></div>-->
                     <!--               </div>-->
                     <!--               <a href="#" class="follow_btn">FOLLOW</a>-->
                     <!--            </div>-->
                     <!--         </li>-->
                     <!--      </ul>-->
                     <!--      <div class="view_more">-->
                     <!--         <a href="#">View More</a>-->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--</div>-->
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-md-2 order-md-1 order-1">
                  <div class="bg_box_fixed">
                     <div class="xf_inside p">
                        <h4 class="padd-sec">Forums</h4>
                        <div class="padd-sec">
                           <div class="forums_sec">
                              <div class="row">
                                 <div class="col-md-12">
                                  @livewire('single-forum')
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
    
@endsection
