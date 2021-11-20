@extends('front.layouts.userlayout')
@section('content')
<style>
   .modal-content h5,.modal-content label{
        color:white!important;
    }
    .modal-content{
       border:6px solid #444444;
    }
    td,th{
      font-size:12px!important;  
    }
    #chat_pop{
        display:none;
    }
</style>
<section class="profile_info mt-5" >
        <div class="container">
          <div class="row">
                @if (Session::has('successmessage'))
                    <div class='alert alert-info error text-success'>{{ Session::get('successmessage') }}</div>
		@endif 
                @if (Session::has('salemessage'))
                    <div class='alert alert-info error text-success'>{{ Session::get('salemessage') }}</div>
		@endif 
		@if (Session::has('errormessage'))
                    <div class='alert alert-danger error text-danger'>{{ Session::get('errormessage') }}</div>
		@endif
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
              <div class="sidenav_profile">
        <div class="profile">
            
            <span id="photopreview">
                <img src="@if($detail->photo){{ asset('/'.$detail->photo) }}@else{{ asset('assets/frontend/img-profile/profile_dummy.jpg')  }}@endif" alt="" width="100" height="100">
            </span>
            <form method="post" id="profilePhoto">
                @csrf
                <input type="file" name="file" id="file-input" onchange="uploadFileSubmit()" style="opacity:0">
            </form>
            
            {{--<div class="job">
                Web Developer
            </div>--}}
        </div>
        <div class="name">
                {{ ucfirst($detail->name) }}
            </div>
            @if(!empty($chat_to))
   <a href="javascript:toggleChatPopup()"  class="btn btn-primary btn-sm"><i class="fa fa-comment"></i> Message</a>
   @endif
        <div class="sidenav-url">
            <div class="url">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#UpdateModal1" class="active">Edit Profile</a>
            </div>
            <div class="url">
                <a href="javascript:void(0)" onclick="document.querySelector('#file-input').click()">Edit Picture </a>
            </div>
        </div>
    </div>
              </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                          @include('alert-comp')
                         
                        @livewire('profile')

              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-12 text-center">
                 
             @livewire('bio')
              </div>
             
                   
                   
                     
            </div>
          </div>
         @if(!empty($chat_to))
         <div style="position:fixed;bottom:0;right:20px;z-index:9999999" id="chat_pop">
       @livewire('private-chat-popup',['chatting_to_id'=>base64_decode($chat_to)])
       </div>
       @endif
       </section>
<div class="col-md-6 text-center imagepreview" style="position: absolute;z-index: 99999999999999999999999999;display:none;"><img src="{{ asset('/assets/frontend/images/loader.gif') }}"></div>
@endsection

@section('script')
<script>
function toggleChatPopup(){
    $("#chat_pop").slideToggle();
}
    function uploadFileSubmit(){
        var name = document.getElementById("file-input").files[0].name;
        //var form_data = $('#profilePhoto').serialize();
        var formData = new FormData();
        formData.append("file", document.getElementById('file-input').files[0]);
        formData.append("_token", "{{ csrf_token() }}");
        console.log(formData);
        $.ajax({
            type:"POST",
            url:'{{ route('profile.photo') }}',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            enctype: 'multipart/form-data',
            beforeSend: function(){
                $(".imagepreview").show();
            },
            success: function(data){console.log(data);
               $('#photopreview').html(data);
               $(".imagepreview").hide();
            }
	});
    }
    
    
function submitupdateProfile(){
    $.ajax({
        type:"POST",
        url:'{{ route('user.profile') }}',
        data:$('#UpdateProfile').serialize(),
        success: function(data){
            if($.isNumeric(data) && data == 1){
                $('.profileerror').html('Profile updated successfully');
                $(".profileerror").removeClass("alert-danger");
                $(".profileerror").addClass("alert-success");
            }else{
                $('.profileerror').html(data);
            }
            $('.profileerror').show();
            
            setTimeout( function(){ 
                location.reload();
            }  , 2000 );
        }
    });
}
</script>
@endsection