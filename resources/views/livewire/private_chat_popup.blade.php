<div>
    
<style>
 #file_place{
      position:absolute;overflow-x:auto;
     background:white;top:-60px;padding:5px;object-fit:fit;
     border: 1px solid #e5dddd;display:none;
      }
      input[type='file']{
      width:0!important;
      }
::-webkit-scrollbar {
    width: 10px
}
.cross-icon{
    width: 20px;
    height: 20px;
    display: inline-block;
    position: absolute;
    top: -10px;
    left: 34px;
    color: white;
   
    border-radius: 50%;
    text-align: center;
    background: #c3bfbf;
    font-size: 10px;
    line-height: 20px;
}
::-webkit-scrollbar-track {
    background: #eee
}

::-webkit-scrollbar-thumb {
    background: #888
}

::-webkit-scrollbar-thumb:hover {
    background: #555
}

.wrapper1 {
    
    display: flex;
    justify-content: center;
    align-items: center;
   
}

.wrapper1 .main {
    background-color: #eee;
    width: 320px;
    position: relative;
    border-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 6px 0px 0px 0px;
     padding-top:0!important;
}

.wrapper1 .scroll {
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 325px
}

.wrapper1 .img1 {
    border-radius: 50%;
    background-color: #66BB6A
}

.wrapper1 .name {
    font-size: 8px
}

.wrapper1 .msg {
    background-color: #fff;
    font-size: 11px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 500;
    color: #3e3c3c;
   max-width: 244px;
    overflow-wrap: break-word;
}

.wrapper1 .between {
    font-size: 8px;
    font-weight: 500;
    color: #a09e9e
}

.wrapper1 nav.navbar {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
.wrapper1 div.navbar {
    border-radius:8px!important;
   
}
.wrapper1 .form-control {
    font-size: 12px;
    font-weight: 400;
    width: 274px;
    height: 30px;
    border: none
}

.wrapper1 form-control: focus {
    box-shadow: none;
    overflow: hidden;
    border: none
}

.wrapper1 .form-control:focus {
    box-shadow: none !important
}

.wrapper1 .icon1 {
    color: #7C4DFF !important;
    font-size: 18px !important;
    cursor: pointer
}

.wrapper1 .icon2 {
    color: #512DA8 !important;
    font-size: 18px !important;
    position: relative;
    left: 8px;
    padding: 0px;
    cursor: pointer
}

.wrapper1 .icondiv {
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 2px;
    position: relative;
    bottom: 1px
}
.wrapper1 .name{
    color:black;
}
</style>
<div class="wrapper1">
    
    <div class="main">
         <div class="navbar bg-white navbar-expand-sm d-flex justify-content-start">{{$chatting_to_id}}
             <img src="{{user_pic($chatting_to_id)}}"  width="40" height='40' class="img1 mr-3" style="margin-right:5px;margin-left:5px;" /> <span style="color:black" >{{@ucfirst($chatting_to_user->name) ?? ''}}</span>
        </div>
        <div class="px-2 scroll">
              @if($conversation_list)
                @foreach($conversation_list as $r)
                  @if($r && $r['from_id']!=$me)
                    <div class="d-flex align-items-center">
                        <div class="text-left pr-1"><img src="{{user_pic($r['from_id'])}}" width="30" height="30" class="img1" /></div>
                        <div class="pr-2 pl-1"> <span class="name">{{@ucfirst($r['user']['name'])}}</span>
                            <p class="msg">{{ $r['message'] }}</p>
                           @if(!empty($r['file']))
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
                    </div> 
            @else
            <div class="d-flex align-items-center text-right justify-content-end ">
                <div class="pr-2"> <span class="name">{{auth()->user()->name}}</span>
                    <p class="msg">{{ $r['message'] }}</p>
                    @if(!empty($r['file']))
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
             
            </div>
             @endif
               @endforeach
               @endif
            
            
        </div>
        <nav class="navbar bg-white navbar-expand-sm d-flex justify-content-between" style="position:relative"  wire:ignore>
             <div class="icondiv d-flex align-content-center text-center" style="cursor:pointer"> <i class="fa fa-paperclip icon1 ml-2" onclick="openFile()"></i>  </div>
             <input wire:model.defer='file' type="file" style="opacity:0!important" id="fileInp" /> 
             <input type="text number" name="text" class="form-control" wire:model.defer="message_txt"  wire:keydown.enter.prevent="postMessage" placeholder="Type a message...">
            <div class="icondiv d-flex align-content-center text-center text-black" style="color:black;cursor:pointer" > <i class="fa fa-paper-plane mr-2"  wire:click.prevent="postMessage"></i>  </div>
           
             <div class="d-flex" id="file_place"></div>
        </nav>
    </div>
</div>
@push('scripts')
   <script>
   var i=0;
   function removeDiv(b){
     
       $("#file_place").find(`#div-${b}`).remove();
   }
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
                i=i+1;
                let img=`<div style="position:relative;" id='div-${i}'>
                          <img id="blah" src="${src}" alt="your image" style="width:50px;height:50px;margin-right:6px"/>
                          <span class="cross-icon" onclick="removeDiv(${i})"><i class="fa fa-times"></i></span>
                          </div>
                          `;
                         
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
          alert('msg');
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