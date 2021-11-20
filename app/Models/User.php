<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use App\Models\Point;
use App\Models\Follower;
use App\Models\MemberSelectModel;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password','bio','hyper_code','dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //relation with order values
    public function presales(){
        return $this->hasMany('App\Models\Presale');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function select()
    {
        return $this->hasOne(MemberSelectModel::class,'chat_to');
        // note: we can also inlcude Mobile model like: 'App\Mobile'
    }
    public function scopeUnMuted($query)
    {
        return $query->where('status', '!=', 'Muted');
    }
    public function followers(){
        return $this->hasMany(Follower::class,'following_id')->where('following_id',auth()->id());
    }
    public function following(){
        return $this->hasMany(Follower::class,'user_id')->where('user_id',auth()->id());
    }
    public function points(){
        return $this->hasMany(Point::class,'user_id');
    }
     public function total_point(){
        return $this->hasMany(Point::class,'user_id')->selectRaw('SUM(`points`) as point')->where('user_id',auth()->id())->groupBy('user_id');
    }
}
