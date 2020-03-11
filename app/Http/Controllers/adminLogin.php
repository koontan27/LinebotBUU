<?php

namespace App\Http\Controllers;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;
use \App\Admin;
use SebastianBergmann\Environment\Console;

class adminLogin extends Controller
{

    public function checkUser(Request $req)
    {

        $idStu = $req->input('userN');
        $passStu = $req->input('passW');


        $url = 'http://10.80.6.79:27018/';
        $data_array =  array(
            'username' => $idStu,
            'password' => $passStu
        );

        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/json",
                'content' => json_encode($data_array)
            )
        ));

        $a2 = Admin::where('username', $idStu)
            ->where('password', $passStu)
            ->get();

        if (sizeof($a2)==0) {
            echo "Failed";
            die('Error');
        }else{
            session(['username' => $idStu]);
            return redirect('/main');
        }

        $responseData = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($a2, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST
        );

    //     foreach ($responseData as $key => $val) {
    //         if (is_array($val)) {
    //         } else {
    //             printf($val);
    //             if ($key == 'status') {
    //                 if ($val == 'fail') {
    //                     // return redirect()->back()->with('message', 'กรุณาพิมพ์ไอดีหรือรหัสให้ถูกต้อง');
    //                     // return redirect('/');

    //                 } else {
    //                     $docs = Admin::where('username', $idStu)
    //                         ->where('status', 1)
    //                         ->get();
    //                     if (count($docs) > 0) {
    //                         session(['username' => $idStu]);
    //                         return redirect('/main');
    //                     } else {
    //                         // return redirect()->back()->with('message', 'กรุณาพิมพ์ไอดีหรือรหัสให้ถูกต้อง');
    //                         // return redirect('/');
    //                     }
    //                 }
    //             }
    //         }
    //     }
    }
    public function checkLogin()
    {
        $usname = session("username");
        if ($usname) {
            return  redirect('main');
        } else {
            return redirect('/');
        }
    }
}
