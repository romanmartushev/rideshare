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
    $menu_items = [];
    $menu = wp_get_nav_menu_items('main-navigation');
    foreach ($menu as $item){
        array_push($menu_items, ['title' => $item->title, 'url' => $item->url]);
    }
    return view('partials.forms.request')->withMenu($menu_items);
});
