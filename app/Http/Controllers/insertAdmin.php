<?php

namespace App\Http\Controllers;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;
use \App\Admin;
use SebastianBergmann\Environment\Console;

class insertAdmin extends Controller
{
    public function insertform(){
        return view('admin');
    }

    public function insert(Request $request){
        $admin = new Admin;
        $admin->type = $request->input('role');
        $admin->save();
        // $role = $request->input('role');
        // $first_name = $request->input('first_name');
        // $last_name = $request->input('last_name');
        // $tel = $request->input('tel');
        // $email = $request->input('email');
        // $ad_user = $request->input('ad_user');
        // $ad_pass = $request->input('ad_pass');
        // $data=array('role'=>$role,'first_name'=>$first_name,"last_name"=>$last_name,"tel"=>$tel,"email"=>$email,
        // "ad_user"=>$ad_user,"ad_pass"=>$ad_pass,);
        // Admin::collection('admin')->insert($data);
        // echo "Record inserted successfully.<br/>";
        // echo '<a href = "/insert">Click Here</a> to go back.';
     }

}