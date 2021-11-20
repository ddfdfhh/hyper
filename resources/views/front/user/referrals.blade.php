@extends('front.layouts.userlayout')
@section('content')

     <section class="main_section mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mb-3">
                <div class="bg_box_fixed fixed-bar">
                    <div class="xf_inside">
                    <h4 class="padd-sec">Recent Clans</h4>
                        <div class="box_text padd-sec">
                        <div class="d-flex clan_ttx">
                                            <div class="clan-ile">
                                                <img src="{{asset('assets/frontend/img-profile/Trending-Companies-logo.jpeg')}}">
                                            </div>
                                            <div class="clan-name">
                                                <h5 class="mb-0">Airdrop Community, Bounty and Coin / Dollar Hunters</h5>
                                            </div>
                                          </div>
                        </div>
                    </div>
                    <div class="xf_inside mt-4">
                    
                        <div class="box_text box_btn">
                        <a href="#" class="btn_box_common">
                            CREATE Clans
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="bg_box_fixed">
                    <div class="xf_inside">
                    <h4 class="padd-sec">Browse Clans</h4>
                       <div class="tab_box_sec padd-sec">
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="display:flex!important;flex-wrap: unset!important;">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="CLANS-tab" data-bs-toggle="tab" data-bs-target="#CLANS" type="button" role="tab" aria-controls="CLANS" aria-selected="true">ALL CLANS</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="JOINED-tab" data-bs-toggle="tab" data-bs-target="#JOINED" type="button" role="tab" aria-controls="JOINED" aria-selected="false">JOINED</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="YOUR-CLANS-tab" data-bs-toggle="tab" data-bs-target="#YOUR-CLANS" type="button" role="tab" aria-controls="YOUR-CLANS" aria-selected="false">YOUR CLANS</button>
                              </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="INVITED-tab" data-bs-toggle="tab" data-bs-target="#INVITED" type="button" role="tab" aria-controls="INVITED" aria-selected="false">INVITED</button>
                              </li>
                            </ul>
                            <div class="tab-content mt-4" id="myTabContent">
                              <div class="tab-pane fade show active" id="CLANS" role="tabpanel" aria-labelledby="CLANS-tab">
                                <div class="row">
                                  <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                        <form class="form_search">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                     </div>
                                  </div>
                                <div class="row justify-content-center">
                                  <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="{{asset('assets/frontend/img-profile/Suggested-Clans.jpeg')}}">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="{{asset('assets/frontend/img-profile/Trending-Companies-logo.jpeg')}}">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="{{asset('assets/frontend/imgages/svg/fire.svg')}}"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="{{asset('assets/frontend/img-profile/Suggested-Clans.jpeg')}}">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="{{asset('assets/frontend/img-profile/Trending-Companies-logo.jpeg')}}">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="{{asset('assets/frontend/images/svg/fire.svg')}}"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="{{asset('assets/frontend/img-profile/Suggested-Clans.jpeg')}}">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                   
                                   
                                  </div>
                                
                                </div>
                                <div class="tab-pane fade " id="JOINED" role="tabpanel" aria-labelledby="JOINED-tab">
                               <div class="row">
                                  <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                        <form class="form_search">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                     </div>
                                  </div>
                                <div class="row justify-content-center">
                                  <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                                </div>
                              <div class="tab-pane fade" id="YOUR-CLANS" role="tabpanel" aria-labelledby="YOUR-CLANS-tab">
                                 <div class="row">
                                  <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                        <form class="form_search">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                     </div>
                                  </div>
                                <div class="row justify-content-center">
                                  <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="tab-pane fade" id="INVITED" role="tabpanel" aria-labelledby="INVITED-tab">
                                 <div class="row">
                                  <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                        <form class="form_search">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                     </div>
                                  </div>
                                <div class="row justify-content-center">
                                  <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 mb-3">
                                    <div class="box_comp">
                                        <div class="box_comp_img">
                                        <img src="dashbord_img/Suggested-Clans.jpg">
                                        </div>
                                      <div class="box_comp_ctn">
                                        <div class="d-flex prof_ttx">
                                            <div class="prof-ile">
                                                <img src="dashbord_img/Trending-Companies-logo.jpeg">
                                            </div>
                                            <div class="prof-name">
                                                <h5 class="mb-0">Bitcoin Official</h5>
                                                <p class="mb-0">
                                                <span><img src="dashbord_img/group_k.svg"> 61k</span>
                                                    <span><img src="dashbord_img/fire.svg"> 400.6K</span>
                                                </p>
                                            </div>
                                          </div>
                                          <p class="mb-2">I have been trading crypto for a year now, still a newbie myself but constantly learning! So I thought it would be nice to gather all sorts of tips and tricks under this clan I created. All kinds of questions and remarks are welcomed. Let's have a good discussion about the risks and oppurtunities and help other along the way!</p>
                                          
                                          <div class="a_link_btn">
                                            <a href="#" class="btn_box_common">JOIN</a>
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
                </div>
            </div>
           </div>
       </section>
     
   
    
@endsection
