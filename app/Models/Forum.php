<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
class Forum extends Model
{
   
    protected $fillable = [
        'title',
        'details',
        'featured_image','status'
    ];
    public function comments(){
        return $this->hasMany(Comment::class,'forum_id')->whereParentId(0)->where('comment_for','Forum')->latest()->limit(1);
    }
    public function all_comments(){
        return $this->hasMany(Comment::class,'forum_id')->whereParentId(0)->where('comment_for','Post');
    }
   
}
