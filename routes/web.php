<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('loginUser');
// });

Route::get('/', function () {
    return view('loginUser');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/main/Userdata', 'UserController@showUser');

Route::get('/main/Admindata', 'UserController@showAdmin');

Route::post('/login', 'processLogin@checkUser');

Route::get('/checkLogin','processLogin@checkLogin');

Route::get('/main', 'mainController@showUser');

Route::get('/logout', 'mainController@logout');

Route::get('/main/logout', 'mainController@logout');

Route::get('/main/Userdata/message', 'Usercontroller@push');

Route::get('/main/Admindata/change', 'Usercontroller@changeStatus');

