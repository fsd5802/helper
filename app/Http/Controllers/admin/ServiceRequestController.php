<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{

    public function index()
    {
        try {
            $data = ServiceRequest::paginate(paginationNumber());
            return view('admin.service_requests.index', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('custom_validation.something_wrong'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($locale, ServiceRequest $serviceRequest)
    {
        try {
            return view('admin.service_requests.show', compact('serviceRequest'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('custom_validation.something_wrong'));
        }
    }

    public function edit(ServiceRequest $serviceRequest)
    {
        //
    }

    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        //
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        //
    }
}
