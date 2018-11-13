<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickUpRequest extends Model
{
    protected $fillable =  [
        'status',
        'user_id',
        'name',
        'age',
        'gender',
        'phone_number',
        'pick_up_address',
        'destination_address',
        'bringing_items',
        'time',
        'date',
        'number_of_passengers',
        'duration_of_service',
        'driver_gender',
        'special_services',
        'special_services_information',
        'additional_information',
    ];
}
