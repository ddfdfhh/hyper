<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class MemberSelectModel extends Model
{
    protected $table="free_members_to_chat";
    protected $timestamp=false;
    protected $fillable=['user_id','chat_to'];
    public function user1(){
       return $this->belongsTo(User::class,'chat_to');
   }
}
