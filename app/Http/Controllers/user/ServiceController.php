<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\RequestServiceRequest;
use App\Mail\ServiceRequestMail;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    public function serviceRequest(){
        return view('user.service_request');
    }

    public function storeRequest(RequestServiceRequest $request){
        try {
            $requested_data = $request->except(['token']);
            $service_request = ServiceRequest::create($requested_data);
            Mail::to(REQUEST_SERVICE_MAIL)->send(new ServiceRequestMail($service_request));
            return redirect()->back()->with('success', trans('custom_validation.request_sent'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('custom_validation.something_wrong'));
        }
    }
}
