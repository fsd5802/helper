@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.icons'))
@section('index_route', getRoute('icons.index'))
@section('store_route', getRoute('icons.update', $icon))
@section('page_type', trans('general.edit'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.icons') @endsection

{{-- Fields --}}
@section('fields_content')
    @method('put')
    <div class="card card-custom">
        <div class="card-body">
            <div class="col form-group">
                <label>@lang('admin.general.name') <span class="text-danger">*</span></label>
                <input type="text" name="name" placeholder="@lang('admin.general.name')" class="form-control" value="{{ old('name',$icon->name) }}">
                @error("name")
                 <div class="alert my-2 alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.gpsLink') <span class="text-danger">*</span></label>
                <input type="text" name="link" placeholder="@lang('admin.general.gpsLink')" class="form-control" value="{{ old('link',$icon->link) }}">
                @error("link")
                 <div class="alert my-2 alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.tag') <span class="text-danger">*</span></label>
                <input type="text" name="tag" placeholder="@lang('admin.general.tag')" class="form-control" value="{{ old('tag',$icon->tag) }}">
                @error("tag")
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

