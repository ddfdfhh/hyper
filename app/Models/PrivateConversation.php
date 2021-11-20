<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class PrivateConversation extends Model
{
    protected $fillable=['from_id','to_id','message','status','file','room'];
    public $timestamps = ["created_at"]; //only want to used created_at column
const UPDATED_AT = null; //and updated by default null set
    public function user(){
        return $this->belongsTo(User::class,'from_id');
    }
    public function to_user(){
        return $this->belongsTo(User::class,'to_id');
    }
}
