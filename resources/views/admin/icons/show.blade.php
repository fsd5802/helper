@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.icons'))
@section('index_route', getRoute('icons.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.icons') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">
            <div class="col form-group">
                <label>@lang('admin.general.name') <span class="text-danger">*</span></label>
                <p>{{ $icon->name }}</p>
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.gpsLink') <span class="text-danger">*</span></label>
                <p>{{ $icon->link }}</p>
                <a href="{{ $icon->link }}" target="_blank">{{ $icon->name }}</a>
            </div>
            <div class="col form-group">
                    <label>@lang('admin.general.tag') <span class="text-danger">*</span></label>
                    <p>{{ $icon->tag }}</p>
                    <i class="{{ $icon->tag }}"></i>
            </div>
        </div>
    </div>
@endsection
