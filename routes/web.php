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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', 'FitbitController@auth');
Route::get('/success', 'FitbitController@success');

Route::get('/getDevices', function (){
    echo \Illuminate\Support\Facades\Cache::get('userId');
});

Route::get('/activity', 'FitbitController@activity');

Route::get('/auth2','Fitbit2Controller@auth2');
Route::get('/success2','Fitbit2Controller@success2');