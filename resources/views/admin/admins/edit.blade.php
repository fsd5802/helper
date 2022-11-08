@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.mangers'))
@section('index_route', getRoute('admins.index'))
@section('store_route', getRoute('admins.update', $user))
@section('page_type', trans('general.edit'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.mangers') @endsection

{{-- Fields --}}
@section('fields_content')
@method('put')
<div class="card card-custom">
    <div class="card-body">

        <div class="col form-group">
            <label>@lang('slider.name')<span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" placeholder="@lang('slider.name')" class="form-control @error("
                name") is-invalid @enderror" value="{{ old('name', $user->name) }}">
            @error("name")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.email')<span class="text-danger">*</span></label>
            <input type="email" name="email" id="name" placeholder="@lang('admin.general.email')"
                class="form-control @error(" name") is-invalid @enderror" value="{{ old('email', $user->email) }}">
            @error("email")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.password') <span class="text-danger">*</span></label>
            <input type="password" name="password" placeholder="@lang('admin.general.password')" class="form-control">
            @error("password")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.role') <span class="text-danger">*</span></label>
            <select id="admin_role" class="form-control" name="type">
                <option value="">@lang('admin.general.choose')</option>
                <option value="superadmin" {{ old('type', $user->type )== 'superadmin'? 'selected':''
                    }}>@lang("admin.roles.superadmin")</option>
                <option value="admin" {{ old('type', $user->type )=='admin' ? 'selected':'' }}>@lang("admin.roles.admin")</option>
            </select>
            @error("type")
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
@section('script')
<script type="text/javascript">
    $('#admin_role').select2({
            width: '100%',
            placeholder: "@lang('admin.general.choose')",
            allowClear: true
        });
</script>

@endsection