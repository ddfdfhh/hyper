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
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                  <div class="bg_box_fixed fixed-bar">
                     <div class="xf_inside">
                        <!--<h4 class="padd-sec">Lorem ipsum dolor</h4>-->
                        <div class="padd_sec">
                           <div class="box_comp_img_upload">
                               @php
                               $is_vid=false;
                               $is_image=file_exists(storage_path('app/public/hyperzone/images/'.$obj));
                               if(!$is_image)
                               {
                                $is_vid=file_exists(storage_path('app/public/hyperzone/videos/'.$obj));
                               }
                               
                               @endphp
                               @if($is_image)
                                  <img src="{{asset('storage/hyperzone/images/'.$obj)}}" style="width:100%;">
                              @else
                              <video width="100%" height="100%" controls>
                                 <source src="{{asset('storage/hyperzone/videos/'.$obj)}}" type="video/mp4">
                              </video>
                                 
                                 
                             @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  <div class="bg_box_fixed">
                     <div class="xf_inside padd_sec">
                        <div class="hyper_zone_single">
                           <table>
                              <tbody>
                                 <tr>
                                    <td>Name</td>
                                    <td> {{ucfirst($row->name)}}</td>
                                 </tr>
                                 <tr>
                                    <td>Email</td>
                                    <td> {{$row->email}}</td>
                                 </tr>
                                 <tr>
                                    <td>Phone Number </td>
                                    <td> {{$row->phoneno}}</td>
                                 </tr>
                              </tbody>
                           </table>
                           <div class="desprection mt-3">
                               {{$row->details}}
                               </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
 
   
    
@endsection
