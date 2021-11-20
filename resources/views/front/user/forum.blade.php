@extends('front.layouts.userlayout')
@section('content')
<style>
    .cftat_div{
        display:flex;
    }
    
    </style>
<section class="main_section mt-4 text-white">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-3 order-md-1 order-md-2 order-2">
                  <div class="bg_box_fixed">
                     <div class="xf_inside">
                        <h4 class="padd-sec">Welcome to the Hyper Forum</h4>
                        <p class="padd-sec">
                            Hyper Meteor Ltd strives to encourage as many people as possible to look up at the
stars and start dreaming of what is possible in the future.
Here you can discuss our main focuses which are Astronomy, NFTs and Cryptos.
If you would like a new forum topic to be created, please ask a Super Moderator.
You are reminded to be kind and respectful of other peoples opinions!
                        </p>
                       </div>
                     <!--<div class="xf_inside mt-3">-->
                     <!--   <h4 class="padd-sec">Active Landers</h4>-->
                     <!--   <div class="box_text padd-sec">-->
                     <!--      <ul class="Active_Landers lagder">-->
                     <!--         <li>-->
                     <!--            <div class="active_lander_flex">-->
                     <!--               <img src="{{asset('assets/frontend/img-profile/profile.jpg')}}">-->
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
                    @if(!empty($single_forum_id))
                       @livewire('single-forum',['single_forum_id'=>$single_forum_id])
                  @else
                       @livewire('forum-front')
                  @endif
                               
                  </div>
               </div>
            </div>
         </div>
      </section>
    
@endsection
