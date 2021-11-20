<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'details',
        'featured_image','video'
    ];
    public function comments(){
        return $this->hasMany(Comment::class,'post_id')->whereParentId(0)->where('comment_for','Post')->latest()->limit(1);
    }
    public function all_comments(){
        return $this->hasMany(Comment::class,'post_id')->whereParentId(0)->where('comment_for','Post');
    }
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
}
