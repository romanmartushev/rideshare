<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PickUpRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'                       => 'required',
            'name'                          => 'required',
            'age'                           => 'nullable',
            'gender'                        => 'nullable',
            'phone_number'                  => 'required',
            'pick_up_address'               => 'required',
            'destination_address'           => 'required',
            'bringing_items'                => 'nullable',
            'time'                          => 'required' ,
            'date'                          => 'required',
            'number_of_passengers'          => 'nullable',
            'duration_of_service'           => 'nullable',
            'driver_gender'                 => 'nullable',
            'special_services'              => 'nullable',
            'special_services_information'  => 'nullable',
            'additional_information'        => 'nullable',
        ];
    }
}
