<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index()
    {
        try {
            $data = QuoteRequest::paginate(paginationNumber());
            return view('admin.quotation_requests.index', compact('data'));
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

    public function show($locale, $id)
    {
        $quoteRequest = QuoteRequest::find($id);
        try {
            return view('admin.quotation_requests.show', compact('quoteRequest'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('custom_validation.something_wrong'));
        }
    }

    public function edit(QuoteRequest $quoteRequest)
    {
        //
    }

    public function update(Request $request, QuoteRequest $quoteRequest)
    {
        //
    }

    public function destroy(QuoteRequest $quoteRequest)
    {
        //
    }
}
