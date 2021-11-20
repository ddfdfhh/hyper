<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presale extends Model
{
    use HasFactory;
    
    //relation with order values
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
