@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.service_requests'))
@section('index_route', getRoute('service-requests.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.service_requests') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">

            <div class="col form-group">
                <label>{{__('custom_validation.name')}}<span class="text-danger">*</span></label>

                <p>{{$serviceRequest->name }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.email')}}<span class="text-danger">*</span></label>

                <p>{{ $serviceRequest->email }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.phone')}}<span class="text-danger">*</span></label>

                <p dir="ltr">{{ $serviceRequest->phone }}</p>
            </div>

            <div class="col form-group">
                <label>{{__('custom_validation.message')}}<span class="text-danger">*</span></label>

                <p>{!! $serviceRequest->message !!}</p>
            </div>

        </div>

    </div>
@endsection
