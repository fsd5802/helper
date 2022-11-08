@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.sliders'))
@section('index_route', getRoute('sliders.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.sliders') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">
            <div class="col form-group">
                @if (isset($slider->image))
                    <label>@lang('slider.image') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($slider->image) }}" class="w-25">
                @endif
            </div>
        </div>
    </div>
@endsection
