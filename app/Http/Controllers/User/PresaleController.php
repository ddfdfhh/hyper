<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Helper;
use Auth;

use App\Models\Presale;
use App\Models\User;

class PresaleController extends Controller{
    //index
    public function index(Request $request){
        $list = Presale::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->simplePaginate(50);
        return view('front.user.presale', compact('list'));
    }
}
