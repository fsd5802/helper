@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.sliders'))
@section('index_route', getRoute('sliders.index'))
@section('store_route', getRoute('sliders.store'))
@section('page_type', trans('general.add_new'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.sliders') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">
            <div class="tab-content">
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.image') <span class="text-danger">*</span></label>
                <input
                    type="file"
                    name="image"
                    placeholder="@lang('admin.general.image')"
                    class="form-control"
                     >
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
