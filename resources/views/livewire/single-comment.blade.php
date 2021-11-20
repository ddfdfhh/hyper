<div style="width:100%">
   <b> @if($t->user) {{ucfirst($t->user->name)}} @else anonymous @endif</b>  {{ $t->created_at->diffForHumans() }}
   <div style="background: #3e3838;border-radius: 5px;padding: 5px;">
      {{$t->text}}
   </div>
   <div x-data="{reply_open:false }">
      <div style="display:flex;justify-item:space-between;position:relative">
         <a style="margin-right:7px;font-size:11px" type="button" wire:click="likeComment({{$t->id}})" >
          <span style="color:#e7af4b;font-size:25px;">&#9734;</span>
              <span style="line-height: 37px; margin-left: 4px;color:{{count($t->likes)>0?'orange':'white'}}">{{$r->like_count}} Hyper Stars</span>
            
         </a>
         <a  @click="reply_open=!reply_open" style="font-size:11px">
         <img width="10px" src="{{ asset('assets/frontend/images/svg/replay.svg') }}" />
         {{ count($t->replies)}}  Replies
         </a>
         
      </div>
      <!-----end of commern section-->
      <!-- //replie  list -->
      <div x-show="reply_open"  style="margin-top:11px;">
         @if($t->replies)
         @foreach($t->replies as $p)
         <div style="margin-bottom:2px;padding-bottom:2px;font-size: 11px;">
            <div class="profile_xf_ntm mb-1" style="justify-content:flex-start;">
               <img src="{{user_pic($p->user_id)}}" class="profile_pic">
               <div class="profile_name">
                  <h3>@if($t->user) {{ucfirst($p->user->name)}} @else anonymous @endif <span>{{ $p->created_at->diffForHumans() }}</span></h3>
                  <p class="mt-3" style="background: #3e3838;border-radius: 5px;padding: 5px;">{{$p->text}}</p>
                </div>
            </div>
            <div style="display:flex;padding-left:83px;padding-top:0;margin-top:0">
         <a style="margin-right:7px;font-size:11px" type="button" wire:click="likeComment({{$p->id}})" >
         <img width="10px" src="{{ asset('assets/frontend/images/svg/heard_like.svg') }}" />
         {{$p->like_count}} Like 
         </a>
        
         
              </div>
           
         </div>
         @endforeach
         @endif
      </div>
      <div class="form_sec_post dashpr-f"  x-show="reply_open" >
         @livewire('post-comment',['parent_id'=>$t->id,'forum_id'=>$t->forum_id],key($t->id))
      </div>
      <!-- endlist -->
   </div>
</div>