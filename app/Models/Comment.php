<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentLike;
class Comment extends Model
{
    
    protected $fillable = [
        'forum_id',
        'text',
        'status','user_id','parent_id','post_id','comment_for'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getParent() {
        return $this->belongsTo(self::class, 'parent_id');
    }
    
    public function replies(){
        return $this->hasMany(self::class, 'parent_id');
    }
    public function likes(){
        return $this->hasMany(CommentLike::class, 'comment_id')->where('user_id',auth()->id());
    }
    
}
