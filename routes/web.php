<?php
use Illuminate\Support\Facades\Auth;
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

/**
 * Routes for the driver application
 */
Route::get('/apply', function(){
    return view('partials.forms.apply');
});
Route::post('/submit-driver-form', 'ApplicationSubmitController@driverSubmit');
Route::post('/create/driver','ApplicationSubmitController@register');
Route::get('/fetch/drivers',function (){
    if($user = Auth::user()){
        return $user->getAllDrivers();
    }
    return [];
});
/**
 * Routes for customers
 */
Route::post('/customer/make-request', 'ApplicationSubmitController@customerSubmit');
Route::get('/customer/fetch-request', function () {
    if($user = Auth::user()){
        return $user->getRequests();
    }
    return [];
});
/**
 * Routes for RideShare
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
