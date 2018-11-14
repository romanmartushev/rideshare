<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        $user = UserMeta::where('user_id', $this->id)->first();
        return $user->role === 'admin';
    }

    public function isDriver(){
        $user = UserMeta::where('user_id', $this->id)->first();
        return $user->role === 'driver';
    }

    public function isCustomer(){
        $user = UserMeta::where('user_id', $this->id)->first();
        return $user->role === 'customer';
    }

    public function getUserMeta(){
        return UserMeta::where('user_id', $this->id)->first();
    }
    public function getAllDrivers(){
        if($this->isAdmin()){
            return UserMeta::where('role', 'driver')->get();
        }
        return [];
    }
    public function getAllCustomers(){
        if($this->isAdmin()){
            return UserMeta::where('role', 'customer')->get();
        }
        return [];
    }
    public function getRequests(){
        return PickUpRequest::where('user_id', $this->id)->get();
    }
}
