@extends('front.layouts.userlayout')
@section('content')

    <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mb-3">
                  <div class="bg_box_fixed fixed-bar">
                     <div class="xf_inside">
                        <h4 class="padd-sec">Settings</h4>
                        <div class="box_tex">
                           <ul class="nav btn_left_sidebar nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link active" id="ACCOUNT-tab" data-bs-toggle="tab" data-bs-target="#ACCOUNT" type="button" role="tab" aria-controls="ACCOUNT" aria-selected="true">ACCOUNT & SECURITY</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="PREFERENCES-tab" data-bs-toggle="tab" data-bs-target="#PREFERENCES" type="button" role="tab" aria-controls="PREFERENCES" aria-selected="false">PREFERENCES</button>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                  <div class="bg_box_fixed">
                     <div class="xf_inside">
                        <h4 class="padd-sec">Manage Your Account and Security</h4>
                        <div class="tab-content padd-sec" id="myTabContent">
                           <div class="tab-pane fade show active" id="ACCOUNT" role="tabpanel" aria-labelledby="ACCOUNT-tab">
                              <div class="setting_secc pt-3">
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Password</h5>
                                       <p>Not convinced enough to protect your account?</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       CHANGE
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Email Address</h5>
                                       <p>tsushil700@gmail.com</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       CHANGE
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Mobile Number</h5>
                                       <p>1234567890</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       CHANGE
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Blocked Users and Companies</h5>
                                       <p>List of users and companies that have been blocked by you.</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       VIEW
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Display Information</h5>
                                       <p>Your display name, tagline, bio, etc.</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       EDIT PROFILE
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="PREFERENCES" role="tabpanel" aria-labelledby="PREFERENCES-tab">
                              <div class="setting_secc pt-3">
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Password</h5>
                                       <p>Not convinced enough to protect your account?</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       CHANGE
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Email Address</h5>
                                       <p>tsushil700@gmail.com</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       CHANGE
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Mobile Number</h5>
                                       <p>1234567890</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       CHANGE
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Blocked Users and Companies</h5>
                                       <p>List of users and companies that have been blocked by you.</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       VIEW
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center mb-2">
                                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12">
                                       <h5>Display Information</h5>
                                       <p>Your display name, tagline, bio, etc.</p>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 text-end">
                                       <a href="#" class="btn_box_common border_btn">
                                       EDIT PROFILE
                                       </a>
                                    </div>
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
     
@endsection
