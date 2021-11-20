@extends('front.layouts.userlayout')
@section('content')

     <section class="main_section mt-4">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="bg_box_fixed mb-4">
                     <div class="xf_inside wallet_ost">
                       <img width='133' src="{{asset('assets/frontend/img-profile/profile-logo.png')}}"/>
                     
                        <h1>  Hyper Unity</h1><br>
                 <h4>The Community Platform Token</h4><br>
                 <ul  style="text-align:left;margin-left:20px;">
                     <li>&#9830; Ethereum ERC 20 Token</li>
                      <li>&#9830; 10 Billion Token Supply</li>
                      <li>&#9830; Contract – <a style="text-decoration:underline" href="https://etherscan.io/token/0xeD5212d7587E897655A216B093a27E98B8
                        Aa42f5">Click here</a>
                         </li>
                     <li>&#9830; Use Case – Community Platform Features
                        The Hyper Unity token is currently in Public Sale. You can purchase Hyper
                        Unity tokens via our homepage. Once the allotted 780 million tokens have
                        been sold, the token will be launched onto UniSwap.
                        </li>
                 </ul>
                      <a class="btn btn-primary follow_btn" href="{{URL::to('/')}}">
                       BUY NOW</a>

                      </pre>
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </section>
    
    
@endsection
