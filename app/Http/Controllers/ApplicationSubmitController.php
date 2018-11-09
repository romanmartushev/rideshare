<?php

namespace App\Http\Controllers;

use App\User;
use App\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApplicationSubmitController extends Controller
{
    public function driverSubmit(Request $request){
        $info = [
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'first_name' => $request->first_name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'phone_number' => $request->phone_number,
            'referred' => $request->referred,
            'email' => $request->email,
            'township' => $request->township,
            'day_phone' => $request->day_phone,
            'eight_teen' => $request->eight_teen,
            'prevent' => $request->prevent,
            'prevent_txt' => $request->prevent_txt,
            'legal' => $request->legal,
            'record_education' => json_decode(str_replace("\\","",$request->record_education)),
            'work_history' => json_decode(str_replace("\\","",$request->work_history)),
            'skills' => $request->skills,
            'references' =>  json_decode(str_replace("\\","",$request->references))
        ];
        try{
            \Mail::send('/email/job_application',$info, function ($message) use ($request) {
                $files = $request->allFiles();
                $message->from(env("MAIL_FROM","donotreply@rideshare.net"));
                $message->to(env("JOB_APPLICATION_MAIL_TO","admin@rideshare.net"));
                $message->subject("Volunteer Driver Application");
                foreach($files as $file){
                    $message->attach($file->getPathName(),['as' => $file->getClientOriginalName()]);
                }
            });
        }catch (\ErrorException $e){
            return ["error" => $e->getMessage()];
        }
        return ["success" => "Successfully Submitted"];
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->createDriver($request->all());
        return $user;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function createDriver(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        UserMeta::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'role' => 'driver'
        ]);
        return $user;
    }
}
