@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.sliders'))
@section('index_route', getRoute('sliders.index'))
@section('store_route', getRoute('sliders.update', $slider))
@section('page_type', trans('general.edit'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.sliders') @endsection

{{-- Fields --}}
@section('fields_content')
    @method('put')
    <div class="card card-custom">
        <div class="card-body">
                <div class="col form-group">
                    @if (isset($slider->image))
                        <label>@lang('slider.image') <span class="text-danger">*</span></label>
                        <br>
                        <img src="{{ asset($slider->image) }}" class="w-25">
                    @endif
                </div>
                <div class="col form-group">
                        <label>@lang('slider.image') <span class="text-danger">*</span></label>
                        <input type="file" name="image" placeholder="@lang('slider.image')" class="form-control" value="">
                        @error("image")
                        <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <div class="card card-custom">
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-light-success active">
                    <i class="far fa-save fa-sm"></i>
                    @lang('general.save')
                </button>
            </div>
    </div>
@endsection
