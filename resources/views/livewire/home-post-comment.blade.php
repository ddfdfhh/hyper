<div class="bg_box_fixed">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6171887138f8310012c86788&product=inline-share-buttons" async="async"></script>
    
 
   <div class="xf_inside">
     
      <div class="box_text padd-sec">
         <div class="form_sec_post">
            <div class="input_post">
               <img src="{{user_pic(auth()->id())}}" alt="Profile pic">
               <input id="f" wire:model.defer="post_content" name="content" wire:keydown.enter="postContent" type="text" placeholder="Your thoughts here...">
               <a href="javascript:void(0)"  wire:click="postContent" class="follow_btn">POST</a>
            </div>
            <ul class="xf_list_dashboard">
               <li><a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#img"><img src="{{ asset('assets/frontend/images/svg') }}/img_upload.svg"></a></li>
               <li><a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#vid"><img src="{{ asset('assets/frontend/images/svg') }}/play.svg"></a></li>
               <li><a href="#" id="d"><img src="{{ asset('assets/frontend/images/svg') }}/emoji.svg"></a></li>
            </ul>
            @include('livewire.post_modals.upload_image')
           @include('livewire.post_modals.upload_video')
         </div>
      </div>
   </div>
   @if($list)
   @foreach($list as $r)
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
         <div class="row hov" onclick="window.location='/hyper/user/post/{!! $r->id !!}'">
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
               <a   type="button" wire:click="likePost({{$r->id}})" class="d-flex">
              <span style="color:#e7af4b;font-size:25px;">&#9734;</span>
              <span style="line-height: 37px; margin-left: 4px;">{{$r->like_count}} Hyper Stars</span>
               </a> 
            </div>
            <div class="d-flex align-items-center me-2"  >
               <a   type="button" >
               <img src="{{ asset('assets/frontend/images/svg/comment_prof.svg') }}">
               {{$r->all_comments_count}} Comments
               </a> 
            </div>
            <div class="d-flex align-items-center me-2"  > 
               <a   type="button" href="javascript:void(0)" @click="share_open = !share_open">
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
   <script type="text/javascript">
      let inp=document.querySelector('#inp')
      let te=document.querySelector('#te')
      inp.onchange = evt => {
         te.style.zIndex='-1!important'
      
        const [file] = inp.files
        if (file) {
          blah.src = URL.createObjectURL(file)
          blah.style.visibility ='visible'
          
        }
      }
      let inp1=document.querySelector('#video_inp')
      let vid=document.querySelector('#video')
      let te1=document.querySelector('#te1')
      inp1.onchange = evt => {
        
         document.querySelector('#te1').style.zIndex='-1!important'
         document.querySelector('#te1').style.visibility='hidden!important'
        const [file] = inp1.files
        if (file) {
          vid.src = URL.createObjectURL(file)
          vid.style.visibility ='visible'
          
        }
      }
window.addEventListener('hide-modal', event => {
 
    $('#img').hide();
    $('#vid').hide();
  
   
   
});

   </script>
</div>