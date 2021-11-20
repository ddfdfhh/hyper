<div class="xf_inside p">
   <style>
      .forums_sec_pg {
      margin: 0px!important;
      padding-bottom: 0px!important;
      }
      .forums_sec a> img{
   width:10px!important;
      } 
      .img_forums img {
    width: 51px!important;
    height: 50px!important;
    border-radius: 50%!important;
      }
      p{
          font-family:'Poppins', sans-serif!important;
      }
      p span{
          background:transparent!important;color:white!important;font-family:'Poppins', sans-serif!important;
      }
   </style>
   <!--<h4 class="padd-sec">{{$page_title}}</h4>-->
   <div class="padd-sec">
      <div class="forums_sec">
         <div class="row">
            <div class="col-md-12">
               <ul class="forum_inside_isc">
                  @if($forums)
                  @foreach($forums as $r)
                  <li>
                     <div class="forums_sec_pg">
                        <div class="inner_ctret_bx">
                           <div class="img_forums">
                              <img  src="{{ asset('assets/frontend/images/svg/dummy-profile-pic.jpg') }}">
                           </div>
                           <div class="text_forums">
                              <h5 class="mb-0"><a href="javascript:void(0)">{{ucfirst($r->title)}}</a></h5>
                              <div class="time_days">
                                 <span>{{ $r->created_at->diffForHumans() }}</span>
                              </div>
                           </div>
                           <a class="badge badge-success" href="{{route('user.forums')}}" style="background: white;color: black!important;">&#x25c0; Back To Forums</a>
                        </div>
                        <div class="row">
                           <div class="col-md-12 mt-2 mb-2">
                              <img src="{{asset('storage/forum/'.$r->featured_image)}}" style="width:100%">
                           </div>
                           <div class="col-md-12">
                              <p class="mt-2 mb-2">{!! $r->details !!}</p>
                           </div>
                        </div>
                        <div class="like_cmt" x-data="{share_open:false}" style="position:relative;width:100%">
                           <div class="d-flex align-items-center me-2"  >
                              <a  type="button" wire:click="likeForum({{$r->id}})">
                             
                                <span style="color:#e7af4b;font-size:16px;">&#9734;</span>
              <span style="line-height: 37px; margin-left: 4px;">{{$r->like_count}} Hyper Stars</span>
        
                              </a>  
                              </div>
                              <!-- <div class="d-flex align-items-center me-2"  >-->
                              <!--<a href="javascript:void(0)" @click="share_open = !share_open" >-->
                              <!--         <img  src="{{ asset('assets/frontend/images/svg/spread.svg') }}">Share-->
                              <!--          </a>-->
                              <!--     </div>   -->
                                  <div x-show="share_open" @click.away="share_open=false" style="display:none;border: 1px solid grey;
                                       position:absolute;top:-73px;padding: 5px;
                                       z-index: 999;background:#7c5e64">
                             <x-share  :img="asset('storage/forum/'.$r->featured_image)" :url="\URL::to('/forum/'.$r->id)" :title="($r->title)" :details="$r->details"/>
                            
                                    </div>                                             
                           </div>
                         
                        </div>
                        @if($comments)
                        @foreach($comments as $t)
                        <div style="margin-bottom: 5px;margin-top:20px;padding-left: 30px;padding-bottom: 20px;font-size: 11px;">
                           <div class="profile_xf_ntm mb-3" style="justify-content:flex-start;">
                              <img width='10' src="{{user_pic($t->user_id)}}">
                              <div class="profile_name">
                                 <h3>@if($t->user) {{ucfirst($t->user->name)}} @else anonymous @endif <span>{{ $t->created_at->diffForHumans() }}</span></h3>
                                 <p class="mt-3" style="background: #3e3838;border-radius: 5px;padding: 5px;">{{$t->text}}</p>
                          
                              </div>
                              
                           </div>
                           <div x-data="{ reply_open:false }">
                              <div class="like_cmt">
                                 <div class="d-flex align-items-center me-2" style="padding-left:80px;">
                                    <a type="button" wire:click="likeComment({{$t->id}})">
                                      <span style="color:#e7af4b;font-size:16px;">&#9734;</span>
              <span style="line-height: 37px; margin-left: 4px;">{{$t->like_count}} Hyper Stars</span>
        
                                    </a>
                                 </div>
                                
                                 <div class="d-flex align-items-center me-2">
                                    <a type="button"  @click="reply_open = !reply_open" >
                                    <img width='10px' src="{{ asset('assets/frontend/images/svg/replay.svg') }}"> {{count($t->replies)}}  Replies
                                    </a>
                                 </div>
                              </div>
                            
                              <!-- //replie  list -->
                              <div x-show="reply_open"  style="margin-top:11px;">
                                 @if($t->replies)
                                 @foreach($t->replies as $p)
                                 <div style="margin-bottom: 5px;padding-left: 50px;padding-bottom: 20px;font-size: 11px;">
                                    <div class="profile_xf_ntm mb-1" style="justify-content:flex-start;">
                                       <img src="{{user_pic($p->user_id)}}">
                                       <div class="profile_name">
                                          <h3>@if($t->user) {{ucfirst($p->user->name)}} @else anonymous @endif <span>{{ $p->created_at->diffForHumans() }}</span></h3>
                                          <p class="mt-3" style="background: #3e3838;border-radius: 5px;padding: 5px;">{{$p->text}}</p>
                                  
                                       </div>
                                    </div>
                                     <div class="like_cmt">
                                       <div class="d-flex align-items-center me-2" style="padding-left:83px;">
                                          <a type="button" wire:click="likeReply({{$p->id}})">
                                          <img width='10px' src="{{ asset('assets/frontend/images/svg/heard_like.svg') }}">{{$p->like_count}} Likes
                                          </a>
                                       </div>
                                    </div>
                                 </div>

                                 @endforeach
                                 @endif
                                 <div  x-show="reply_open" style="padding-left:35px;">
							
                                  @livewire('post-comment',['parent_id'=>$t->id,'comment_for'=>'Forum','forum_id'=>$r->id],key($t->id))
                                 
                              </div>
                              </div>
                             
                              <!-- endlist -->
                           </div>
                  
                 
                        </div>
						  @endforeach
						  @endif
						  
                          <div style="padding-left:17px;">
							
								@livewire('post-comment',['parent_id'=>0,'comment_for'=>'Forum','forum_id'=>$r->id],key($r->id))
							
						  </div>
                 
            </li>
            @endforeach 
            @endif
            </ul>
         </div>
      </div>
   </div>
</div>
</div>
</div>