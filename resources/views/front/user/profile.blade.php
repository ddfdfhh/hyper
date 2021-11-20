@extends('front.layouts.userlayout')
@section('content')
<style>
   .modal-content h5,.modal-content label{
        color:white!important;
    }
</style>
<section class="profile_info mt-5">
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
                <input type="file" name="file" id="file-input" onchange="uploadFileSubmit()">
            </form>
            
            {{--<div class="job">
                Web Developer
            </div>--}}
        </div>
        <div class="name">
                {{ $detail->name }}
            </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="javascript:void(0)" class="active">Profile</a>
            </div>
            <div class="url">
                <a href="javascript:void(0)">Settings</a>
            </div>
        </div>
    </div>
              </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                         <div class="profile_right_info">
                         <a href="javascript:void(0)"  class="edit_profile"><i class="fa fa-pencil-square-o" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i></a>
                         
                         <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true" style="color:#000;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>Update Profile</h5>
                                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class='alert alert-danger col-md-12 profileerror' style="display:none;text-align: left;"></div>
                                   <form class="ewf-us-form" action="" method="post" id='UpdateProfile'>
                                       @csrf
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>Enter E-mail</label>
                                                    <input type="email" class="form-control" id="emailtokenregistration" name="email" value="{{ $detail->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hymeteor Wallet Address</label>
                                                    <input type="text" class="form-control" id="passwordtokenregistration" name="hyper_code" value="{{ $detail->hyper_code }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6  mt-3">
                                                <div class="form-group">
                                                    <label>Watsapp Number</label>
                                                    <input type="text" class="form-control" id="cpasswordtokenregistration" name="watsapp" value="{{ $detail->watsapp }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6  mt-3">
                                                <div class="form-group">
                                                    <label>Twitter Link: </label>
                                                    <input type="text" class="form-control" id="walletaddresstokenregistration" name="twitter_link" value="{{ $detail->twitter_link }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-end mt-4"><input type="button" onclick="submitupdateProfile()" name="submitcontact" class="common_btn common_blue" value="Update" id="submitcontactusform"></div>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
              <table>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>{{ $detail->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $detail->email }}</td>
                        </tr>
                        <tr>
                            <td>Hyper Address</td>
                            <td>:</td>
                            <td>@if($detail->hyper_code){{ $detail->hyper_code }}@else{{'NA'}}@endif</td>
                        </tr>
                        <tr>
                            <td>Date of birth </td>
                            <td>:</td>
                            <td>@if($detail->dob){{ Helper::instance()->dateFormat($detail->dob) }}@else{{'NA'}}@endif</td>
                        </tr>
                        <tr>
                            <td>WhatsApp Number </td>
                            <td>:</td>
                            <td>@if($detail->watsapp){{ $detail->watsapp }}@else{{'NA'}}@endif</td>
                        </tr>
                        <tr>
                            <td>Twitter Handler Link </td>
                            <td>:</td>
                            <td>@if($detail->twitter_link){{ $detail->twitter_link }}@else{{'NA'}}@endif</td>
                        </tr>
                    </tbody>
                </table>
                                                      </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-12">
              <div class="abt_profile">
                  Hyper Meteor Ltd strives to encourage as many people as possible to look up at the stars and start dreaming of what is possible in the future. An international communications and education network, providing the very best, brightest and courageous people working tirelessly toward making space a place not just of distant wonder but a place we live, work and play.
              </div>
              </div>
             
                   
                   
                     
            </div>
          </div>
       
       </section>
<div class="col-md-6 text-center imagepreview" style="position: absolute;z-index: 99999999999999999999999999;display:none;"><img src="{{ asset('/assets/frontend/images/loader.gif') }}"></div>
@endsection

@section('script')
<script>
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