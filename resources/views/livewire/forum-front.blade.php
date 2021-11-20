<div class="xf_inside p">
<style>
.input_post,.form_sec_post{
   padding:0!important;margin:0px!important;border:0!important; 
}


   </style>
   <h4 class="padd-sec">Forums</h4>
   <div class="padd-sec">
      <div class="forums_sec">
         <div class="row">
            <div class="col-md-12">
               <ul class="forum_inside_isc">
                  @if($forums)
                  @foreach($forums as $r)
                  <li>
                     <div class="forums_sec_pg">
                        <div class="cfld_box">
                           <div class="cftat_div">
                              <div class="craft_f">
                                 <div class="img_forums">
                                    <a href="{{route('user.forum',['id'=>$r->id])}}">
                                    <img   src="{{asset('storage/forum/'.$r->featured_image)}}">
                                    </a>
                
          
                                 </div>
                              </div>
                              <div class="craft_p" style="width:100%">
                                 <div  class="text_forums" x-data="{share_open:false, open: false }">
                                    <h5><a href="{{route('user.forum',['id'=>$r->id])}}">{{ucfirst($r->title)}}</a></h5>
                                    <div  class="time_days" style="dispaly:flex;position:relative">
                                       <span>{{ $r->created_at->diffForHumans() }}</span>
                                     
                                       
                                    </div>
                                    
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  @endforeach 
                  @endif
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>