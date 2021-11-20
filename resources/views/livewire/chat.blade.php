<div class="row justify-content-center">
   <style>
    
      .li-disabled{
    cursor: not-allowed!important;
    border-radius: 5px;
    padding-left: 2px;
    color: #4e4b4b!important;
      }
      #file_place{
      position:absolute;
      display:none;background:white;top:0px;padding:5px;top:75px;object-fit:fit;
      }
      input[type='file']{
      width:0!important;
      }
        .add_icon{
          margin-top: -26px;
      }
      .msg{
      padding: 1px 6px;
      background: #568d18;
      color: white!important;
      overflow: hidden;
      min-width: 205px;
      display: inline-block;
      border-radius: 4px;margin-top:2px;
      }
      .online{
      background:green!important;
      width: 10px;
      height: 10px;
      position: absolute;
      display: block;
      border-radius: 10px;
      left: 0;
      bottom: 13px;
      }
     .message{
          overflow-wrap:break-word;
      }
      .type_input {
      height:46px!important;
      }
      .offline{
      background:grey!important;
      width: 10px;
      height: 10px;
      position: absolute;
      display: block;
      border-radius: 10px;
      left: 0;
      bottom: 13px;
      }
      .message{
          overflow-wrap:break-word;
      }
   </style>
   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
      <div class="left_message">
         <h4>Follower list</h4>
         <form class="form_search mb-2" wire:submit.prevent="doSearch">
            <input class="form-control me-2" type="search" wire:model.debounce.500ms="search" placeholder="Search" aria-label="Search">
            <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
         </form>
        <ul class="online_user_ofline style-4" x-data>
            
            @if($users)
            @foreach($users as $r)
            <li wire:key="{{ $loop->index }}" style="cursor:pointer" wire:click="setChattingUser('{{$r['info']['id']}}')" >
               <img src="{{user_pic($r['id'])}}">
               <span class="{{ (Cache::has('user-is-online-' . $r['info']['id']))? 'online':'offline'}}" id="status-{{$r['info']['id']}}">
               </span>
               <div class="text_user">
                  <h5>{{ucfirst($r['info']['name'])}}</h5>
                  <span  id="msg-{{$r['info']['id']}}">
                  </span>
               </div>
            </li>
            @endforeach
            @endif
         </ul>
      </div>
   </div>
   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
      <div class="center_message">
         <div class="message_header">
            <div class="left_center_header">
               <img src="{{user_pic($chatting_to_id)}}">
               <span class="{{ (Cache::has('user-is-online-' . $chatting_to_id))? 'online':'offline'}}" id="big-status-{{$chatting_to_id}}">
               </span>
               <div class="text_user">
                  <h5>{{@ucfirst($chatting_to_user->name) ?? ''}}</h5>
               </div>
            </div>
          
         </div>
         <div class="main_message_type" >
            <ul id="chat" class="style-4">
               @if($conversation_list)
               @foreach($conversation_list as $r)
               @if($r && $r['from_id']!=$me)
               <li class="you">
                  <div class="entete">
                     <span class="status green"></span>
                     <h2>{{@ucfirst($r['user']['name'])}}</h2>
                     <h3>{{ \Carbon\Carbon::parse($r['created_at'])->diffForHumans() }}</h3>
                  </div>
                  <div class="message">
                     {{ $r['message'] }}
                     @if($r['file'])
                     @php 
                     $ext=explode('.',$r['file'])[1];
                     //dd($ext);
                     $is_image=false;$is_video=false;
                     if(in_array($ext,['png','jpg','jpeg','gif','webp']))
                     $is_image=true;
                     elseif(in_array($ext,['mp4','avi']))
                     $is_video=true;
                     @endphp
                     <div>
                        <a href="{{asset('storage/chat/'.$r['file'])}}" download>
                           @if($is_image)
                           <img  src="{{asset('storage/chat/'.$r['file'])}}" alt="your image" style="width:100px;height:60px;"/>
                           @elseif($is_video)
                           <video width="200" height="100" src="{{asset('storage/chat/'.$r['file'])}}" controls  >
                              Your browser does not support the video tag.
                           </video>
                           @else
                           <span>&#128206; {{$r['file']}}</span>
                           @endif
                        </a>
                     </div>
                     @endif
                  </div>
               </li>
               @else
               <li class="me">
                  <div class="entete">
                     <span class="status blue"></span>
                     <h2>{{ucfirst(auth()->user()->name)}}</h2>
                     <h3>{{\Carbon\Carbon::parse($r['created_at'])->diffForHumans() }}</h3>
                  </div>
                  <div class="message">
                     {{ $r['message'] }}
                     @if(@$r['file'])
                     @php 
                     $ext=explode('.',$r['file'])[1];
                     //dd($ext);
                     $is_image=false;$is_video=false;
                     if(in_array($ext,['png','jpg','jpeg','gif','webp']))
                     $is_image=true;
                     elseif(in_array($ext,['mp4','avi']))
                     $is_video=true;
                     @endphp
                     <div>
                        <a href="{{asset('storage/chat/'.$r['file'])}}" download>
                           @if($is_image)
                           <img  src="{{asset('storage/chat/'.$r['file'])}}" alt="your image" style="width:100px;height:60px;"/>
                           @elseif($is_video)
                           <video width="200" height="100" src="{{asset('storage/chat/'.$r['file'])}}" controls  >
                              Your browser does not support the video tag.
                           </video>
                           @else
                           <span>&#128206; {{$r['file']}}</span>
                           @endif
                        </a>
                     </div>
                     @endif
                  </div>
               </li>
               @endif
               @endforeach
               @endif
            </ul>
            <div class="type_message"  wire:ignore style="position:relative;">
               <p style="position:absolute;top:-14px;left: 236px;" wire:loading>Please wait  <i class="fa fa-spinner fa-spin"  style="font-size: 18px;" ></i></p>
               <div class="type_input">
                  <div class="add_icon">
                     <input wire:model.defer='file' type="file" style="opacity:0!important" id="fileInp" /> 
                     <a href="javascript:openFile()"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                  </div>
                  <textarea placeholder="Type your message" wire:model.defer="message_txt" wire:keydown.enter.prevent="postMessage" class="f message_type_box"></textarea>
                  <a class="emoji" id="d" href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
                  <a class="send_msg" href="javascript:void(0)" wire:click="postMessage"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                  <div id="file_place">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
      <div class="right_message">
         <div class="inside_profile">
            <img src="{{user_pic(auth()->id())}}">
            <h5>{{ucfirst(auth()->user()->name)}}</h5>
           
         </div>
      </div>
      <div class="right_message mt-2" style="height:332px;overflow-y:auto">
         <div class="messages_files">
            <h4>Files</h4>
            <ul>
               @if($file_list)
               @foreach($file_list as $r)
               <li style="display:flex">
                  <a href="#">
                     <i class="fa fa-download" aria-hidden="true"></i>
                     <div class="text_download" style="word-wrap: break-word;
                        width: 100%;">
                        @if($r)
                        @php 
                        $ext=explode('.',$r)[1];
                        //dd($ext);
                        $is_image=false;$is_video=false;
                        if(in_array($ext,['png','jpg','jpeg','gif','webp']))
                        $is_image=true;
                        elseif(in_array($ext,['mp4','avi']))
                        $is_video=true;
                        @endphp
                        <div>
                  <a href="{{asset('storage/chat/'.$r)}}" download>
                  @if($is_image)
                  <img  src="{{asset('storage/chat/'.$r)}}" alt="your image" style="width:100px;height:60px;"/>
                  @elseif($is_video)
                  <video width="200" height="100" src="{{asset('storage/chat/'.$r)}}" controls  >
                  Your browser does not support the video tag.
                  </video>
                  @else
                  <span>&#128206; {{$r}}</span>
                  @endif
                  </a></div>
                  @endif
                  </div>
                  </a>
               </li>
               @endforeach
               @endif
            </ul>
         </div>
      </div>
   </div>
   @push('scripts')
   <script>
   function openFile(){
      $("#fileInp").click();
      }
      let inp=document.querySelector('#fileInp')
       
         inp.onchange = evt => {
           
         $('#file_place').show();
           const [file] = inp.files
           console.log(file);
           if (file) {
              let file1=file.name;
            var file_ext = file1.substr(file1.lastIndexOf('.')+1,file1.length);
            if(['jpg','jpeg','gif','png'].includes(file_ext))
             {
                let src = URL.createObjectURL(file)
                let img=`<img id="blah" src="${src}" alt="your image" style="width:100px;height:60px;"/>`;
                $('#file_place').html(img);
             }
             else if(['avi','mp4'].includes(file_ext))
             {
               
                let src = URL.createObjectURL(file)
                let vid=`<video width="200" height="100" style="object-fit:fit" src="${src}" controls id="video" >
                                           Your browser does not support the video tag.
                        </video>`;
                $('#file_place').html(vid);
             }
             else
             {
               $('#file_place').html('&#128206;');
               $('#file_place').append(`<p>${file.name}</p>`);
             }
             
           }
         }
       window.addEventListener('livewire:load', () => {
         Echo.join(`chat`)
       .here((users) => {
          
       })
       .joining(function (joiningMember, members) {
         if (!$('#status-'+joiningMember['id']).hasClass("online")) 
           {
              $('#status-'+joiningMember['id']).removeClass('offline')
              $('#status-'+joiningMember['id']).addClass('online')
              $('#big-status-'+joiningMember['id']).removeClass('offline')
              $('#big-status-'+joiningMember['id']).addClass('online')
           }
           
       })
       .leaving(function (leavingMember, members) {
         if ($('#status-'+leavingMember['id']).hasClass("online")) 
           {
              $('#status-'+leavingMember['id']).removeClass('online')
              $('#status-'+leavingMember['id']).addClass('offline')
              $('#big-status-'+leavingMember['id']).removeClass('online')
              $('#big-status-'+leavingMember['id']).addClass('offline')
           }
        
       });
         window.addEventListener('msg', event => {
          
            if(event.detail.to==@this.me);
                {
                   if(@this.chatting_to_id===event.detail.from)
                       @this.refetch();
                  else{
                    
                     let s=` <span class="msg">${event.detail.message}... </span><br>`;
                     $("#msg-"+event.detail.from).html(s);
                  }
                }
           
      })
            
      })
      
      
       
       
   </script>
   @endpush
</div>