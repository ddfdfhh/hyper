 <div class="xf_inside">
    <style>
 
.lagder::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: transparent;
}

.lagder::-webkit-scrollbar
{
	width:5px;
	background-color: transparent;
}

.lagder::-webkit-scrollbar-thumb
{
	background-color: orange;
}
.success_btn{
    background:#a8e30c;
  
    font-weight: 500;
    color: #fff;
    font-size: 10px!important;
    padding: 5px 17px!important;
    border-radius: 55px;
    text-decoration: none;
}
.lagder{
    padding-right: 5px!important;
}
a.follow_btn1 {
    background-color: #e2b441;
   
    font-weight: 500;
    color: #fff;
    font-size: 10px!important;
    padding: 5px 9px!important;
    border-radius: 55px;
    text-decoration: none;
}
a.follow_btn2 {
    background-color: #e2b441;
   
    font-weight: 500;
    color: #fff;
    font-size: 10px!important;
    padding: 5px 17px!important;
    border-radius: 55px;
    text-decoration: none;
}
.success_btn_fl{
    background:#a8e30c;
  
    font-weight: 500;
    color: #fff;
    font-size: 10px!important;
    padding: 5px 9px!important;
    border-radius: 55px;
    text-decoration: none;
}
    </style>
     
  <h4 class="padd-sec">Following ({{$following_count}})</h4>
<div class="box_text padd-sec">
                       <ul class="Active_Landers lagder"  style="height:300px;overflow-y:auto;position:relative">
                           @if($users)
                           @foreach($users as $r)
                          <li>
                             <div class="active_lander_flex">
                                <a href=" {{route('user.profileView',['base64id'=>base64_encode($r->id)])}}"><img src="{{user_pic($r->id)}}"></a>
                                <div class="active_flex">
                                   <h5>{{ucfirst($r->name)}}</h5>
                                   <div class="userDescription" ><span>{{$r->followers_count}} Followers</span></div>
                                </div>
                                @if(in_array($r->id,$following))
                                <a href="javascript:void(0)" wire:click="unfollow({{$r->id}})" class="success_btn_fl">UNFOLLOW</a>
                                @else
                                <a href="javascript:void(0)" wire:click="follow({{$r->id}})" class="follow_btn2">FOLLOW</a>
                                @endif
                             </div>
                          </li>
                        @endforeach
                        @endif
                         <div style="position: absolute; height: 100%; left: 0;top:0;width:100%;background:#000000ba;" wire:loading wire:target="loadMoreFollowing">
            <p style="position: absolute; top: 50%; left: 50%;transform:translate(-50%,-50%);font-size: 13px;" > <i class="fa fa-spinner fa-spin"  style="font-size: 18px;" ></i></p>
        </div>
                       </ul>
       
             
    <div class="view_more">
                  <a href="javascript:void(0)" wire:click="loadMoreFollowing">View More</a>
    </div>
 </div>
  <h4 class="padd-sec"> Followers ({{$followers_count}})</h4>
<div class="box_text padd-sec" >
                       <ul class="Active_Landers lagder" @if($followers_count>5) style="height:300px;overflow-y:auto;position:relative" @endif >
                           @if($followers)
                           @foreach($followers as $r)
                          <li>
                             <div class="active_lander_flex">
                                  <a href=" {{route('user.profileView',['base64id'=>base64_encode($r->user_id)])}}"><img src="{{user_pic($r->user_id)}}"></a>
                             
                                <div class="active_flex">
                                   <h5>{{ucfirst($r->info->name)}}</h5>
                                   <!--<div class="userDescription" ><span>{{$r}} Followers</span></div>-->
                                </div>
                              @if($r->status=='Active')
                                <a href="javascript:void(0)" wire:click="block({{$r->user_id}})" class="success_btn">BLOCK</a>
                              @else
                                <a href="javascript:void(0)" wire:click="unblock({{$r->user_id}})" class="follow_btn1">UNBLOCK</a>
                            
                              @endif
                             </div>
                          </li>
                        @endforeach
                        @endif
                         <div style="position: absolute; height: 100%; left: 0;top:0;width:100%;background:#000000ba;" wire:loading wire:target="loadMoreFollowers">
            <p style="position: absolute; top: 50%; left: 50%;transform:translate(-50%,-50%);font-size: 13px;" > <i class="fa fa-spinner fa-spin"  style="font-size: 18px;" ></i></p>
        </div>
                       </ul>
                        @if($followers_count>=4)
                    
                           <div class="view_more">
                             <a href="javascript:void(0)" wire:click="loadMoreFollowers">View More</a>
                           </div> @endif
 </div>
 
 
 </div>
 