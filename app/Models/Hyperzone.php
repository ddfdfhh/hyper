<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hyperzone extends Model
{
    protected $table="hyperzone";
    protected $fillable=['user_id','category','image1','like_count','image2','image3','video','name','email','phoneno','details'];
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id')->whereParentId(0)->where('comment_for','Post')->latest()->limit(1);
    }
    public function all_comments(){
        return $this->hasMany(Comment::class,'post_id')->whereParentId(0)->where('comment_for','Post');
    }
}
