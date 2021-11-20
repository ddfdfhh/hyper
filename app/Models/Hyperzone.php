<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hyperzone extends Model
{
    protected $table="hyperzone";
    protected $fillable=['user_id','category','image1','image2','image3','video','name','email','phoneno','details'];
}
