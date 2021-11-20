<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
class Follower extends Model
{
   
    protected $fillable = [
        'user_id',
        'following_id',
        'status'
    ];
    public function info(){
        return $this->belongsTo(User::class,'user_id');
    }
   
}
