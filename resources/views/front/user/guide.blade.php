@extends('front.layouts.userlayout')
@section('content')

     <section class="main_section mt-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                
                
                <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-12">
                <div class="bg_box_fixed">
                    <div class="xf_inside">
                        <h4 class="padd-sec text-center">Quick Guide</h4>
                    <div class="slider_gider">
                     <div class="owl-carousel quic_gide owl-theme">
                        <div class="item">
                           <div class="box_slider_ctn style-3" >
                              <img src="dashbord_img/quickguide.jpg">
                              <h5>Lorem ipsum <a href="#">@Loremipsum</a></h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="box_slider_ctn style-3" >
                              <img src="dashbord_img/quickguide.jpg">
                              <h5>Lorem ipsum <a href="#">@Loremipsum</a></h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="box_slider_ctn style-3" >
                              <img src="dashbord_img/quickguide.jpg">
                              <h5>Lorem ipsum <a href="#">@Loremipsum</a></h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="box_slider_ctn style-3" >
                              <img src="dashbord_img/quickguide.jpg">
                              <h5>Lorem ipsum <a href="#">@Loremipsum</a></h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                      
                    </div>
                    
                    </div>
                </div>
            </div>
           </div>
       </section>
       
  @push('scripts')
   <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}" ></script>
      <script>
         $('.quic_gide').owlCarousel({
         loop:false,
         margin:10,
         nav:true,
         autoplay: false,
         responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
         }
         })
      </script>
  
@endpush   
    
@endsection
