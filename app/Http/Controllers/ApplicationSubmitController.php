<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
