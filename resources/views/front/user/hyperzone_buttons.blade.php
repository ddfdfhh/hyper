@extends('front.layouts.userlayout')
@section('content')

     <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="bg_box_fixed mb-4">
                     <div class="xf_inside wallet_ost">
                       
                        <h3>HYPERZONE</h3>
                     </div>
                  </div>
                  <div class="bg_box_fixed mb-4">
                     <div class="row ">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="xf_inside wallet_ost wallet_nst">
                               <h1><a href="{{route('user.hyperzone')}}" class="follow_btn">CONTENT SUBMISSION</a></h1>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="xf_inside wallet_ost wallet_nst">
                             
                              <h1><a href="{{route('user.collaborations')}}" class="follow_btn">COLLABORATIONS</a></h1>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </section>
    
    
@endsection
