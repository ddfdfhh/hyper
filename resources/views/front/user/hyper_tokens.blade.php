@extends('front.layouts.userlayout')
@section('content')

     <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="bg_box_fixed mb-4">
                     <div class="xf_inside wallet_ost">
                      @livewire('help-center')
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </section>
    
    
@endsection
