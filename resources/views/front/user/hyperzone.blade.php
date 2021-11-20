@extends('front.layouts.userlayout')
@section('content')
<style>
    .cftat_div{
        display:flex;
    }
    .cftat_div div{
        margin:5px;
    }
    </style>
 <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row justify-content-center">
            
               <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                  <div class="bg_box_fixed">
                     <div class="xf_inside">
                        <h4 class="padd-sec">Hyperzone</h4>
                       @livewire('hyperzone')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   
    
@endsection
