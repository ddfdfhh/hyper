<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table="points";
    protected $fillable = [
        'user_id',
        'points','post_id'
        
    ];
    const UPDATED_AT = null;
   
}
