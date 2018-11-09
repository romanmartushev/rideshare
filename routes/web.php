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
    return redirect("/wordpress");
});

Route::get('/welcome', function(){
   return view('welcome');
});

Route::get('/make-request', function(){
    return view('partials.forms.request');
});

Route::get('/apply', function(){
    return view('partials.forms.apply');
});

Route::post('/submit-driver-form', 'ApplicationSubmitController@driverSubmit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
