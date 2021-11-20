@extends('front.layouts.userlayout')
@section('content')
<style>
    .profile_xf_ntm {
      justify-content: flex-start!important; 
    }
    .hilit{
            color: orange;
    }
    .hov{
        cursor:pointer;
    }
</style>

<section class="profile_info mt-3">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div id="cover-banner-image" style="position:relative">
                   @livewire('banner')
                     <div class="profile_img">
                         <img src="{{user_pic(auth()->id())}}" />
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-3 order-md-1 order-sm-3 order-3">
                  <div class="bg_box_fixed">
                    
                       
                     
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-3 order-md-2 order-sm-2 order-2">
                  <div class="bg_box_fixed">
                     <div class="profile_section">
                        <h3>Search results..</h3>
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade active show" id="my" role="tabpanel" aria-labelledby="FOLLOWING-tab">
                              <div class="profile_home mt-3">
                                 <div class="row">
                                    
                                    <div class="col-md-12 mt-3">
                                       <div class="tab-content" id="myTab-nContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                         
                                                       @if(count($posts)>0)
                                                           @foreach($posts as $r)
                                                           <div class="xf_inside mt-3">
                                                              <div class="xf_dash_profile">
                                                                 <div class="profile_xf_ntm mb-3">
                                                                    <img src="{{user_pic(@$r->owner->id)}}">
                                                                    <div class="profile_name">
                                                                       <h3 class="hov" onclick="window.location='/hyper/user/post/{!! $r->id !!}'">{{ucfirst(@$r->owner->name)}} <span>{{ @$r->created_at->diffForHumans() }}
                                                                          </span>
                                                                       </h3>
                                                                       <!-- <p>I am not a financial advisor or a cat</p> -->
                                                                    </div>
                                                                   
                                                                 </div>
                                                                 <div class="profile_img_trx mb-3">
                                                                 <div class="row hov" onclick="window.location='/hyper/user/post/{!! $r->id !!}'">
                                                                                
                                                                                   <div class="col-md-12">
                                                                                      <p class="mt-2 mb-2">{!! preg_replace("/($term)/i", "<b class='hilit'>".$term."</b>", $r->details) !!}</p>
                                                                                   </div>
                                                                                </div>
                                                                 </div>
                                                                 <div class="like_cmt" x-data="{share_open:false}" style="position:relative;width:100%">
                                                                    <div class="d-flex align-items-center me-2"  >
                                                                       <a   type="button">
                                                                       <img src="{{ asset('assets/frontend/images/svg/heard_like.svg') }}">
                                                                       {{$r->like_count}} Likes
                                                                       </a> 
                                                                    </div>
                                                                    <div class="d-flex align-items-center me-2"  >
                                                                       <a   type="button" >
                                                                       <img src="{{ asset('assets/frontend/images/svg/comment_prof.svg') }}">
                                                                       {{$r->all_comments_count}} Comments
                                                                       </a> 
                                                                    </div>
                                                                    <div class="d-flex align-items-center me-2"  > 
                                                                       <a href="javascript:void(0)" @click="share_open = !share_open">
                                                                       <img  src="{{ asset('assets/frontend/images/svg/spread.svg') }}">Share
                                                                       </a>
                                                                    </div>
                                                                    <div x-show="share_open" @click.away="share_open=false" style="display:none;border: 1px solid grey;
                                                                       position:absolute;top:-73px;padding: 5px;
                                                                       z-index: 999;background:#7c5e64">
                                                                       @include('livewire.social_share')
                                                                    </div>
                                                                 </div>
                                                                
                                                                
                                                              </div>
                                                           </div>
                                                           @endforeach
                                                           @else
                                                              <center><h3>No results found</h3></center>
                                                       
                                                       @endif
                                                   
                                          </div>
                                           </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                          </div>
                         
                         
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-3 order-md-3 order-sm-2 order-2">
                  <div class="bg_box_fixed">
                  
                  </div>
               </div>
            </div>
         </div>
      </section>
    
@endsection
