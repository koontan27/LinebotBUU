<?php

namespace App\Http\Controllers;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use \App\User;
use \App\Admin;

class Usercontroller extends Controller
{
    //

    public function showUser(Request $req)
    {
        $a2 = User::where('status', 1)->get();
        return view('user', compact('a2',));
    }

    public function showAdmin(Request $req)
    {
        $a3 = Admin::all();
        return view('admin', compact('a3'));
    }

    public function changeStatus($uid) {
        $gg = array('status'=>0);
        $dt = User::all();
        $dt->update($gg, ['upsert' => true]);
    }

    public function push($to, $msg)
    {
        $data = [
            'to' => $to,
            'messages' => $msg
        ];

        $strUrl = "https://api.line.me/v2/bot/message/push";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Bearer NAEP1E2z0BM725TTUZZRLWtNH8R0r0FUqvoIl7QYA1Yi5XuKyUU7XcyAMfojc0JgXELn6ok3bxFspM+91tPd/ylST/Wq/+0FB+4ieaf+Y7gid2A40Rq52CAr8HMIfTa3kvDi2QiFQwvJQe1tKcXzRlGUYhWQfeY8sLGRXgo3xvw=",
            "cache-control: no-cache"
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
