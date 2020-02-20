<?php

namespace App\Http\Controllers;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use \App\User;

class Usercontroller extends Controller
{
    //
    public function showUser(Request $req){
        // $a1 = User::all();

        $a2 = User::where('status',1)->get();
        return view('user',compact('a2'));
    }

}
