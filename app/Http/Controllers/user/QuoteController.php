<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\QuoteRequest;
use App\Mail\QuoteMail;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function quoteRequest()
    {
        try {
            $services = Service::all();
            return view('user.quote_request',compact('services'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('custom_validation.something_wrong'));
        }
    }

    public function storeRequest(QuoteRequest $request)
    {
        try {
            $requested_data = $request->except(['token']);
            $service_request = \App\Models\QuoteRequest::create($requested_data);
            Mail::to(QUOTE_MAIL)->send(new QuoteMail($service_request));
            return redirect()->back()->with('success', trans('custom_validation.request_sent'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('custom_validation.something_wrong'));
        }
    }
}
