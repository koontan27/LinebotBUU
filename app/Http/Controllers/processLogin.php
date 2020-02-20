<?php

namespace App\Http\Controllers;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;
use \App\User;

class processLogin extends Controller
{

    public function checkUser(Request $req) {
        $idStu = $req->input('userN');
        $passStu = $req->input('passW');

        // if(is_numeric($idStu)) { echo "Yes";} else {echo "No";}

    $url = 'http://10.80.6.79:27018/';
    $data_array =  array(
        'username' => $idStu,
        'password' => $passStu);

        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/json",
                'content' => json_encode($data_array))
        ));

        $response = file_get_contents('https://buu-api.buu.ac.th/api/version1/authBuu', FALSE, $context);

        if($response === FALSE){
            echo "Failed";
            die('Error');
        }

         $responseData = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($response, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

            foreach ($responseData as $key => $val) {
                if(is_array($val)) {
                }
                else {
                    if($key == 'status' ){
                        if($val == 'fail'){
                            return redirect('/Login');
                            break;
                        } if($val == 'success'){ 

                            return redirect('/Login/Userdata');                         
                        }
                    }
                }
            }
    }
}