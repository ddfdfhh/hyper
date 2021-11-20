<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
class Reply extends Model
{
    protected $fillable = [
        'comment_id',
        'text',
        'user_id','like_count'
    ];
    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
