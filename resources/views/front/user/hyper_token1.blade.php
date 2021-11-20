@extends('front.layouts.userlayout')
@section('content')

     <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="bg_box_fixed mb-4">
                     <div class="xf_inside wallet_ost">
                         <a href="{{route('user.hyper_article')}}" >
                       <img width='133' src="{{asset('assets/frontend/img-profile/profile-logo.png')}}"/></a>
                     
                      <a href="{{route('user.hyper_article')}}" > <h1>  Hyper Unity</h1></a><br>
                 
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </section>
    
    
@endsection
