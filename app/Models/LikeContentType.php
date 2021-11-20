<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeContentType extends Model
{
    protected $table="liked_content_type";
    protected $fillable = [
        'content_id',
        'user_id',
        'content_type'
    ];
}
