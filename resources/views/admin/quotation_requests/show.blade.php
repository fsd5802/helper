@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.quotation_requests'))
@section('index_route', getRoute('quotations.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.quotation_requests') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">

            <div class="col form-group">
                <label>{{__('custom_validation.name')}}<span class="text-danger">*</span></label>

                <p>{{$quoteRequest->name }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.email')}}<span class="text-danger">*</span></label>

                <p>{{ $quoteRequest->email }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.phone')}}<span class="text-danger">*</span></label>

                <p dir="ltr">{{ $quoteRequest->phone }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.service_name')}}<span class="text-danger">*</span></label>

                <p>{{ $quoteRequest->service_id }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.message')}}<span class="text-danger">*</span></label>

                <p>{!! $quoteRequest->message !!}</p>
            </div>

        </div>

    </div>
@endsection
