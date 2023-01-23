@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.contactus'))
@section('index_route', getRoute('contacts.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.contactus') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">
            <div class="row">
                <div class="col-3 form-group">
                    <label>@lang('admin.general.name')<span class="text-danger">*</span></label>
                    <p>{{ $contact->name }}</p>
                </div>
                <div class="col-3 form-group">
                    <label>@lang('admin.general.email')<span class="text-danger">*</span></label>
                    <p>{{ $contact->email }}</p>
                </div>
                <div class="col-3 form-group">
                    <label>@lang('admin.general.phone')<span class="text-danger">*</span></label>
                    <p dir="ltr">{{ $contact->phone }}</p>
                </div>

                <div class="col-3 form-group">
                    <label>@lang('admin.general.title')<span class="text-danger">*</span></label>
                    <p>{{ $contact->subject }}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col form-group">
                    <label>@lang('admin.general.desc')<span class="text-danger">*</span></label>
                    <p>{{ $contact->message }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection
