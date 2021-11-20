@extends('front.layouts.userlayout')
@section('content')
<style>
    .box_comp_ctn{
        margin-top:20px;
    }
    .prof-name{
    margin-left:0;
}
</style>
    <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mb-3">
                  <div class="bg_box_fixed">
                     <div class="xf_inside">
                        <h4 class="padd-sec">Notification</h4>
                        <div class="notif">
                           <form class="form_search">
                              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                           </form>
                           <div class="box_text mt-3">
                              <div class="clan_ttx_htm mb-3">
                                 <div class="clan-name">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                                    <p class="hours">1 hour ago</p>
                                 </div>
                                 <div class="info_click">
                                    <a href="#"><img src="dashbord_img/3doute.svg"></a>
                                 </div>
                              </div>
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-3">
                  <div class="bg_box_fixed">
                     <div class="xf_inside">
                        <h4 class="padd-sec"> Hyper Announcements</h4>
                        <div class="box_text padd-sec">
                            <div class="row">
                               @if(!empty($news))
                               @foreach($news as $r)
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                 <div class="box_comp">
                                      @if($r->featured_image)
                                    <div class="box_comp_img">
                                       
                                       <img src="{{ asset('storage/news/'.$r->featured_image) }}">
                                    </div>
                                    @endif
                                    <div class="box_comp_ctn">
                                       <div class="d-flex prof_ttx">
                                       
                                          <div class="prof-name">
                                             <h5 class="text-center">{{ucwords($r->title)}}</h5>
                                             <p class="mb-0" style="font-size:12px;">{!!ucwords($r->details)!!}</p>
                                          </div>
                                       </div>
                                      
                                    </div>
                                 </div>
                              </div>
                             @endforeach
                             @endif
                           </div>
                           <div class="view_more">
                              <a href="#">View More</a>
                           </div>
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
  
   
    
@endsection
