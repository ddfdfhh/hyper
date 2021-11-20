<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        @if(!empty($post))
      <meta property="og:type" content="article">
        <meta property="og:title" content="{{$post->details ?? ''}}">
           <meta property="og:description" content="{{$post->details ?? ''}}">
        <meta property="og:image" content="{{asset('storage/post/images/'.$post->featured_image)}}">
        <meta property="og:url" content="{{\URL::to('/post/'.$post->id)}}">
        @endif
         @if(!empty($forum1))
      <meta property="og:type" content="article">
        <meta property="og:title" content="{{$forum1->title ?? ''}}">
           <meta property="og:description" content="{{ strip_tags($forum1->details)}}">
        <meta property="og:image" content="{{asset('storage/forum/'.$forum1->featured_image)}}">
        <meta property="og:url" content="{{\URL::to('/forum/'.$forum1->id)}}">
        @endif
      <link rel="shortcut icon" href="images/fav.jpg" type="image/x-icon">
      <link rel="icon" href="{{ asset('assets/frontend/images/fav.jpg')  }}" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="{{ asset('assets/frontend/css/bootstrap.min.css')  }}" rel="stylesheet">
      <link href="{{ asset('assets/frontend/css/owl.carousel.min.css')  }}" rel="stylesheet">
      <link href="{{ asset('assets/frontend/css/owl.theme.default.min.css')  }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    
      <link href="{{ asset('assets/frontend/css/style3.css')  }}" rel="stylesheet">
      <link href="{{ asset('assets/frontend/css/media.css')  }}" rel="stylesheet">
      <link href="{{ asset('assets/frontend/css/moblie-menu.css')  }}" rel="stylesheet">
      <title>::Hyper Meteor::</title>
      @livewireStyles
      <style>
      .msg-ic{
          color: red;
    display: inline-block;
    position: absolute;
    top: 7px;
    left: 80px;
    width: 19px;
    height: 20px;
    border: -radius;
    border-radius: 50%;
    background: red;
    color: white;
      }
    .modal-backdrop {
  z-index: -1!important;
}
 .btn-success{
   border-radius: 20px;
    background: #e2b441;
    color: white;
    padding: 5px 12px;
}
a{
    color:white!important;
}
.profile_pic{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

  
      .post-input{
          height: 40px;
    border-radius: 20px;
   
    padding-left: 10px;
    background: transparent;
    margin-left: 10px;
    width: 100%;

      } 
      .input_post{
          display:flex;
      }
   
         </style>
   </head>
   
   <body class="profile_page">
    
      <section class="header_box">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-12">
                  <div class="row align-items-center">
                     <div class="col-lg-2 col-md-2 col-sm-2 col-2" >
                        <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/frontend/img-profile/profile-logo.png')  }}"></a>
                     </div>
                     <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                       <form class="form_search" method="get" action="{{route('user.search')}}">
                                 @csrf
                           <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search">
                           <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                     </div>
                     <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg p-0">
                           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav ">
                                 <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('user.dashboard') }}"><img src="{{ asset('assets/frontend/img-profile/home.svg')  }}"><br>Home</a>
                                 </li>
                                 <!-- <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><img src="{{ asset('assets/frontend/img-profile/Companies.svg')  }}"><br>Companies</a></li> -->
                                 <li class="nav-item"><a class="nav-link" href="{{route('user.forums')}}"><img src="{{ asset('assets/frontend/img-profile/Clans.svg')  }}"><br>Forum</a></li>
                                 <li class="nav-item"><a class="nav-link" href="{{route('user.hyperzone.front')}}"><img src="{{ asset('assets/frontend/img-profile/Companies.svg')  }}"><br>Hyperzone</a></li>
                                 <!-- <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><img src="{{ asset('assets/frontend/img-profile/Clans.svg')  }}"><br>Clans</a></li>
                                 <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><img src="{{ asset('assets/frontend/img-profile/Missions.svg')  }}"><br>Missions</a></li> -->
                                 <li class="nav-item"><a class="nav-link" href="{{route('user.messages')}}"><img src="{{ asset('assets/frontend/img-profile/Messages.svg')  }}"><br>Messages</a>
                                  <li class="nav-item" style="position:relative"><a class="nav-link" href="{{route('user.private_message')}}" ><img src="{{ asset('assets/frontend/img-profile/Messages.svg')  }}"><br>Private Messages
                                 @if(Helper::unreadChats()>0) <span class="msg-ic">{{ Helper::unreadChats()}}</span> @endif</a>
                                 <li class="nav-item"><a class="nav-link" href="{{route('user.notifications')}}"><img src="{{ asset('assets/frontend/img-profile/Notifications.svg')  }}"><br>Notifications</a></li>
                                 </li>
                                 <li class="nav-item"><a class="nav-link" href="{{route('user.wallet')}}"><img src="{{ asset('assets/frontend/img-profile/Wallet.svg')  }}"><br>Wallet</a></li>
                                 <!--<li class="nav-item"><a class="nav-link" href="{{route('user.airdrop')}} "><img src="{{ asset('assets/frontend/img-profile/airdrop.svg')  }}"><br>Airdrops<span class="alert_new">New</span></a></li>-->
                                 <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @php $photo = \App\Models\User::find(auth()->id()); @endphp
                                    @if(!empty($poto))
                                        <img src="@if($photo->photo){{ asset('/'.$photo->photo) }}@else{{ asset('assets/frontend/img-profile/profile_dummy.jpg')  }}@endif">
                                    @endif
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       <li><a class="dropdown-item" href="{{route('user.help_center')}}"><i class="fa fa-question-circle" aria-hidden="true"></i>Help Cener</a></li>
                                       <li><a class="dropdown-item" href="{{route('user.profileView')}}"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                                       <li><a class="dropdown-item" href="{{route('user.hyper_tokens')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Hyper Tokens</a></li>
                                       <li><a class="dropdown-item" href="{{route('user.about')}}"><i class="fa fa-info-circle" aria-hidden="true"></i>About</a></li>
                                      
                                       <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
      </section>
      
       @yield('content')
      <br>
      <br>
      <br>
      @livewireScripts
     
      <script src="{{asset('js/alpine.min.js')}}" ></script>
        <script src="{{ asset('assets/frontend/js/jquery.min.js')  }}" ></script>
      <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js')  }}" ></script>
      <script src="{{ asset('js/app.js') }}"></script>
       <script src="{{ asset('assets/frontend/js/owl.carousel.min.js')  }}" ></script>
      <script src="{{ asset('assets/frontend/js/jquery.smartmenus.min.js')  }}" ></script>
      <script src="{{ asset('assets/frontend/js/Function.js') }}" ></script>
      @yield('script')
      @stack('scripts')
     
      <script src="{{asset('fgEmojiPicker.js')}}"></script>
      
<script type="text/javascript">
Pusher.logToConsole = true;
let x= new FgEmojiPicker({
   insertInto: document.querySelector('#f1'),
   trigger: ['#d'],
   position: ['bottom', 'left'],
   dir: '{!! \URL::to('/public') !!}/',
   emit(obj, triggerElement) {
       console.log(triggerElement)
         const emoji1 = obj.emoji;
         let s=$(triggerElement).prev('#f').val(); 
         $(triggerElement).prev('#f').val(s+emoji1);
         x=null;
   }
});


window.addEventListener('scroll', event => {
   var mydiv = $("#chat");
   //$('#file_place').hide();
    mydiv.scrollTop(mydiv.prop("scrollHeight"));
 //   $('#file_place').hide();
})
window.addEventListener('hide', event => {
  
   $('#file_place').hide();
   
})

</script>

         
       
   </body>
</html>