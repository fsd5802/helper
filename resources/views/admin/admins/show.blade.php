@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.mangers'))
@section('index_route', getRoute('admins.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.mangers') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-body">
            <div class="col form-group">
                <label>@lang('admin.general.name')<span class="text-danger">*</span></label>
                <p>{{ $user->name }}</p>
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.email')<span class="text-danger">*</span></label>
                <p>{{ $user->email }}</p>
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.role')<span class="text-danger">*</span></label>
                <p>{{ trans("admin.roles.".$user->type ."")}}</p>
            </div>
        </div>
    </div>
@endsection
