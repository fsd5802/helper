<?php

namespace App\Http\Controllers\user;

use App\Http\Requests\user\ApplicationRequest;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function applying_form(Request $request){
        $job_id=$request->input('job_id');
        return view('user.application',compact('job_id'));
     }


    public function apply(ApplicationRequest $request)
    {
        try {
            $data=$request->all();
            $job=Job::findorfail($data['job_id']);
            $data['job_title']=$job->name;

            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $data['cv']=$request->cv->store('Documents');
                $file->move('Documents',$data['cv']);
            }



            $application=Application::create($data);
            $user_email='nessimboula@gmail.com';
            $user_name='Delta Tch';
            $subject=$application->job_title.'Application';
            $files = $request->file('cv');

            Mail::send('mail.application_request', [
                'user_email'   =>  $user_email,
                'user_name'    =>  $user_name,
                'application' =>  $application

            ], function ($message) use ($user_email, $user_name, $subject,$files) {
                $message->from(env('MAIL_USERNAME'));
                $message->to($user_email, $user_name)->subject($subject);

                if($files) {
                    foreach($files as $file) {
                        $message->attach($file);
                    }
                }
            });

            return redirect()->back()->with('success', __('custom_validation.application_sent'));
        }
        catch (\Exception $e){
            return redirect()->back()->with('error', __('custom_validation.something_wrong'));
        }
    }
}
