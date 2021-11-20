<?php

 use App\Models\User;
function user_pic($uid){
    $t=User::where('id',$uid)->first();
    $url=asset('assets/frontend/img-profile/profile_dummy.jpg');
    if($t && $t->photo)
    {
        //if(file_exists(public_path(asset('/'.$t->photo)))){
             $url=asset('/'.$t->photo);
       // }
    }
    return $url;
}