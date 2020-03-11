<?php

namespace App\Http\Controllers;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use \App\User;

class mainController extends Controller
{
    //
    public function showUser(Request $req)
    {
        $username = "test";
        $usname = session("username");
        if ($usname) {
            return view('main', compact('username'));
        } else {
            return redirect('/');
        }
    }
    public function logout()
    {
        session()->pull('username', 'default');
        return redirect('/');
    }
}
