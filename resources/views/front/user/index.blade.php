@extends('front.layouts.userlayout')
@section('content')
<style>
    
    .hov{
        cursor:pointer!important;
    }
    
    .box_comp_ctn{
        margin-top:20px;
    }
.prof-name{
    margin-left:0;
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
                        <div class="homeProfileTab-user-info-container">
                           <div class="text_profile_info">
                              <h4>{{ucfirst(auth()->user()->name)}}</h4>
                              <a class="homeProfileTab-user-id" href="#">@ {{ucfirst(auth()->user()->name )}}</a>
                           </div>
                           <div class="follow follow_space" style="border-right:0;margin-right:0px;">
                              <p>{{@ auth()->user()->total_point->first()->point}}</p>
                              <h5>EARNED POINTS</h5>
                           </div>
                           <div class="follow follow_space" style="margin-right:5px;">
                              <p>{{$followers_count1}}</p>
                              <h5>FOLLOWERS</h5>
                           </div>
                           <div class="follow">
                             <p>{{$following_count1}}</p>
                              <h5>FOLLOWING</h5>
                           </div>
                        </div>
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
                    
                       
                       @livewire('follower1')
                    
                     <div class="xf_inside mt-4">
                        <div class="box_text box_btn footer_info">
                           <p>
                             
                              <a href="#">About Us</a>•
                              <a href="#">Help Center</a>•
                             
                           </p>
                           <p>Hypermeter © 2020 - 2021</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-3 order-md-2 order-sm-2 order-2">
                  <div class="bg_box_fixed">
                     <div class="profile_section">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="FOLLOWING-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="FOLLOWING" aria-selected="true"><img src="{{ asset('assets/frontend/images/svg') }}/following.svg"><br>All </button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="DISCOVER-tab" data-bs-toggle="tab" data-bs-target="#my" type="button" role="tab" aria-controls="DISCOVER" aria-selected="false"><img src="{{ asset('assets/frontend/images/svg') }}/rocket.svg"><br>Posts</button>
                           </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="FOLLOWING-tab">
                              <div class="profile_home mt-3">
                                 <div class="row">
                                   
                                    <div class="col-md-12 mt-3">
                                       <div class="tab-content" id="myTab-nContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                         
                                                      @livewire('post-comment-livewire')
                                                   
                                          </div>
                                           </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                             <!---My posts --->
                           <div class="tab-pane fade show" id="my" role="tabpanel" aria-labelledby="FOLLOWING-tab">
                              <div class="profile_home mt-3">
                                 <div class="row">
                                    
                                    <div class="col-md-12 mt-3">
                                       <div class="tab-content" id="myTab-nContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                         
                                                       @if($my_posts)
                                                       @foreach($my_posts as $r)
                                                       <div class="xf_inside mt-3">
                                                          <div class="xf_dash_profile">
                                                             <div class="profile_xf_ntm mb-3">
                                                                <img src="{{user_pic(@$r->owner->id)}}">
                                                                <div class="profile_name">
                                                                   <h3 class='hov' onclick="window.location='/hyper/user/post/{!! $r->id !!}'">{{ucfirst(@$r->owner->name)}} <span>{{ @$r->created_at->diffForHumans() }}
                                                                      </span>
                                                                   </h3>
                                                                   <!-- <p>I am not a financial advisor or a cat</p> -->
                                                                </div>
                                                                <div class="info_click">
                                                                   <a href="#"><img src="{{ asset('assets/frontend/images/svg') }}/3doute.svg"></a>
                                                                </div>
                                                             </div>
                                                             <div class="profile_img_trx mb-3">
                                                             <div class="row hov"  onclick="window.location='/hyper/user/post/{!! $r->id !!}'">
                                                                               <div class="col-md-12 mt-2 mb-2">
                                                                               @php
                                                                                   $is_img=false;
                                                                                   $is_vid=false;
                                                                                     if($r->featured_image && file_exists(storage_path('app/public/post/images/'.$r->featured_image)))
                                                                                      $is_img=true;
                                                                                     if($r->video && file_exists(storage_path('app/public/post/videos/'.$r->video)))
                                                                                       $is_vid=true;
                                                                                  @endphp
                                                                                   @if($is_img)
                                                                                      <img src="{{asset('storage/post/images/'.$r->featured_image)}}" style="width:100%;">
                                                                                  @endif
                                                                                  @if($is_vid)
                                                                                  <video width="100%" height="100%" controls>
                                                                                     <source src="{{asset('storage/post/videos/'.$r->video)}}" type="video/mp4">
                                                                                  </video>
                                                                                     @endif
                                                                               </div>
                                                                               <div class="col-md-12">
                                                                                  <p class="mt-2 mb-2">{!! $r->details !!}</p>
                                                                               </div>
                                                                            </div>
                                                             </div>
                                                             <div class="like_cmt" x-data="{share_open:false}" style="position:relative;width:100%">
                                                                <div class="d-flex align-items-center me-2"  >
                                                                   <a   type="button" wire:click="likePost({{$r->id}})">
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
                                                                     <x-share  :img="asset('storage/post/images/'.$r->featured_image)" :url="\URL::to('/post/'.$r->id)" :title="substr($r->details,0,20)" :details="$r->details"/>
                                 
                                                                </div>
                                                             </div>
                                                             @if($r->comments)
                                                             @foreach($r->comments as $t)
                                                             <div style="margin-bottom: 5px;margin-top:20px;padding-left: 30px;padding-bottom: 20px;font-size: 11px;">
                                                                <div class="profile_xf_ntm mb-3" style="justify-content:flex-start;">
                                                                   <img width='10' src="{{user_pic($t->user_id)}}">
                                                                   <div class="profile_name">
                                                                      <h3>@if($t->user) {{ucfirst($t->user->name)}} @else anonymous @endif <span>{{ $t->created_at->diffForHumans() }}</span></h3>
                                                                      <p class="mt-3" style="background: #3e3838;border-radius: 5px;padding: 5px;">{{$t->text}}</p>
                                                                   </div>
                                                                </div>
                                                             </div>
                                                             @endforeach
                                                             @endif
                                                             <div class="form_sec_post dashpr-f">
                                                                @livewire('post-comment',['parent_id'=>0,'comment_for'=>'Post','post_id'=>$r->id],key($r->id))
                                                             </div>
                                                          </div>
                                                       </div>
                                                       @endforeach
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
                     <div class="xf_inside">
                        <h4 class="padd-sec">Hyper Announcements</h4>
                        <div class="box_text padd-sec">
                           <div class="row">
                               @if(!empty($news))
                               @foreach($news as $r)
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                 <div class="box_comp">
                                      @if($r->featured_image)
                                    <div class="box_comp_img">
                                       
                                       <img src="{{ asset('storage/news/'.$r->featured_image) }}">
                                    </div>
                                    @endif
                                    <div class="box_comp_ctn">
                                       <div class="d-flex prof_ttx">
                                       
                                          <div class="prof-name">
                                             <h5 class="text-center">{{ucwords($r->title)}}</h5>
                                             <p class="mb-0" style="font-size:12px;">{!!ucwords($r->details)!!}</p>
                                          </div>
                                       </div>
                                      
                                    </div>
                                 </div>
                              </div>
                             @endforeach
                             @endif
                           </div>
                           <div class="view_more">
                              <a href="#">View More</a>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
    
@endsection
