<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/register', 'RegisterController@index')->name('register');

Route::get('/ded', function () {
    return view('ded');
});


Route::get('/map', function () {
    return view('map/index');
});

Route::get('/usulan', function () {
    return view('usulan');
});

Route::get('/pokir', function () {
    return view('pokir');
});

Route::get('/3d', function () {
    return view('map/3d');
});

Auth::routes();