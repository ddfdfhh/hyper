@extends('front.layouts.layout')
@section('content')
<main>
         <section class="inner_banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h1>MEET OUR TEAM</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="text_team">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 pt-4 pb-4 text-center">
                     <!--<h5>Our goal here is to provide low prices on high quality
                        products and excellent service.-->
                     </h5>
                  </div>
               </div>
            </div>
         </section>
         <section class="meet_our_team padd-row">
            <div class="container">
               <div class="row">
                 
                   <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                     <div class="teams_box_sec_t">
                        <img src="{{ url('assets/frontend/images/Clive.png') }}" class="w-100">
                        <div class="team_cnt_t">
                           <h4>Clive</h4>
                           <span><strong>CCO</strong></span>
                           <p>Clive breaths life into all things visual and digital. Growing our NFT portfolio and engaging with the community to produce fine works of art and imagery for Hyper Meteor Ltd. He will work alongside members of the executive management team also.</p>
                        </div>
                     </div>
                  </div>
                   <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                     <div class="teams_box_sec_t">
                        <img src="{{ url('assets/frontend/images/Freidrich.png') }}" class="w-100">
                        <div class="team_cnt_t">
                           <h4>Freidrich</h4>
                           <span><strong>CTO</strong></span>
                           <p>Freidrich is our smart contract and Blockchain master with years of experience in computer science, cyber security and programming. He has successfully launched and administered several innovative and complex smart contracts in the ICO, ITS and IDO field.</p>
                        </div>
                     </div>
                  </div>
                   <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                     <div class="teams_box_sec_t">
                        <img src="{{ url('assets/frontend/images/Don.png') }}" class="w-100">
                        <div class="team_cnt_t">
                           <h4>Aadon</h4>
                           <span><strong>CEO</strong></span>
                           <p>Aadon brings all the pieces of the project together. Overseeing the development of the companies business goals and objectives.</p>
                        </div>
                     </div>
                  </div>
                   <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                     <div class="teams_box_sec_t">
                        <img src="{{ url('assets/frontend/images/Miquel.png') }}" class="w-100">
                        <div class="team_cnt_t">
                           <h4>Miquel</h4>
                           <span><strong>CIO</strong></span>
                           <p>Miquel is the driving force in bringing new ideas to the Hyper Meteor Ltd table. Vast experience and knowledge of Crypto and the blockchain, he thrives to grow Hyper Meteor Ltd to be a major player in the space, science and education industries</p>
                        </div>
                     </div>
                  </div>
<!--
                   <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                     <div class="teams_box_sec_t">
                        <img src="images/Community.png" class="w-100">
                        <div class="team_cnt_t">
                           <h4>Community</h4>
                           <p>Join our Hyper community platform today! ‘Look to the stars', how to guide, community content submission, chat rooms and much more. Meet new like minded friends and have tremendous amounts of fun.</p>
                        </div>
                     </div>
                  </div>
-->
               </div>
            </div>
         </section>
         <section class="executive-members padd-row">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-md-12">
                     <h4>The executive members of Hyper Meteor Ltd would like to re-assure all of those within the community and investors that we are 100% committed to the following.</h4>
                     <ul class="list_quality mb-3 mt-3">
                        <li><i class="fa fa-check" aria-hidden="true"></i> 100% transparency</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> High quality product creation</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Real sustainable long term growth</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Maximizing 100% of Human Potential</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Innovation, Flexibility and Adaptability as a Company</li>
                     </ul>
                     <p>We know it's the wild west out there at the moment in the world of Crypto especially and that here seems to be as many rug pull projects as there are projects with the best intentions. </p>
                     <p>That is why we are committed to making sure that the community will always be aware of what work is being done in the background</p>
                     <p>We will at every stage, where information is not sensitive to I.P. Or ongoing development, keep all information freely and publicly available. We will always endeavour to respond to requests for information and clarification as soon as we are able.</p>
                  </div>
               </div>
            </div>
         </section>
      </main>
@endsection

@section('script')

@endsection