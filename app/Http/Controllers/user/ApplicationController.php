<?php

namespace App\Http\Controllers\user;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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


    public function apply(Request $request)
    {
        $request->validate(
            [
                'name' => "required",
                'email' => "required|email",
                'phone' => "required|numeric",
                'cv' => "required",
            ],
            [
                'name.required' => trans("custom_validation.name_req"),
                'phone.required' => trans("custom_validation.phone_req"),
                'email.required' => trans("custom_validation.email_req"),
                'cv.required' => trans("custom_validation.cv_req"),
            ]
        );

        $data=$request->all();

        if ($request->hasFile('cv')) {
            $file = $request->file('cv'); 
            $data['cv']=$request->cv->store('Documents');
            $file->move('Documents',$data['cv']);    
        } 
        Application::create($data);

        return redirect()->back()->with('success', trans('messages.success'));
    }
}
