<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isAdmin()){
            return view('admin.home');
        }elseif($user->isDriver()){
            return view('driver.home')->with(['user_info' => $user->getUserMeta()]);
        }elseif($user->isCustomer()){
            return view('customer.home')->with(['user_info' => $user->getUserMeta()]);
        }
        return view('home');
    }
}
