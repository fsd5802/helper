@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.settings'))
@section('index_route', getRoute('settings.index'))
@section('store_route', getRoute('settings.store'))
@section('page_type', trans('general.add_new'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.settings') @endsection

{{-- Fields --}}
@section('fields_content')
<div class="card card-custom">
    <div class="card-header card-header-tabs-line">
        <div class="card-title">
            <h3 class="card-label">@lang('general.locales')</h3>
        </div>
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                @foreach (config('translatable.locales') as $key => $locale)
                <li class="nav-item">
                    <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                        href="{{ '#' . $locale }}">@lang('general.'.$locale)</a>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
        </div>
        <div class="tab-content">
            @foreach (config('translatable.locales') as $key => $locale)
            <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                <div class="col form-group">
                    <label>@lang('admin.general.name') (@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                        placeholder="@lang('slider.name')"
                        class="form-control @error($locale . '.name') is-invalid @enderror"
                        value="{{ old($locale . '.name') }}">
                    @error("$locale.name")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.desc')(@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error($locale . '.desc') is-invalid @enderror " type="text"
                        name="{{ $locale . '[desc]' }}" rows="4">{{ old($locale . '.desc') }}</textarea>

                    @error("$locale.desc")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.small_desc')(@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error($locale . '.small_desc') is-invalid @enderror " type="text"
                        name="{{ $locale . '[small_desc]' }}" rows="4">{{ old($locale . '.small_desc') }}</textarea>
                    @error("$locale.small_desc")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.address')(@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error($locale . '.address') is-invalid @enderror " type="text"
                        name="{{ $locale . '[address]' }}" rows="4">{{ old($locale . '.address') }}</textarea>
                    @error("$locale.address")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.formTo')(@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error($locale . '.formTo') is-invalid @enderror " type="text"
                        name="{{ $locale . '[formTo]' }}" rows="4">{{ old($locale . '.formTo') }}</textarea>
                    @error("$locale.formTo")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @endforeach
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.email') <span class="text-danger">*</span></label>
            <input type="text" name="email" placeholder="@lang('admin.general.email')"
            value="{{ old('email') }}" 
            class="form-control @error('email') is-invalid @enderror">
            @error("email")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.phone') <span class="text-danger">*</span></label>
            <input type="text" name="phone" placeholder="@lang('admin.general.phone')"
              value="{{ old('phone') }}"
              class="form-control @error('phone') is-invalid @enderror">
            @error("phone")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.gpsLink') <span class="text-danger">*</span></label>
            <input type="text" name="gpsLink" placeholder="@lang('admin.general.gpsLink')" 
              value="{{ old('gpsLink') }}"
              class="form-control @error('gpsLink') is-invalid @enderror">
            @error("gpsLink")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div> 
        <div class="col form-group">
            <label>@lang('admin.general.logo') <span class="text-danger">*</span></label>
            <input
                type="file"
                name="logo"
                placeholder="@lang('admin.general.logo')"
                class="form-control"
                 >
                 @error("logo")
                  <div class="alert my-2 alert-danger">{{ $message }}</div>
                 @enderror
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
        <div class="col form-group">
            <label>@lang('admin.general.sales') <span class="text-danger">*</span></label>
            <input
                type="text"
                name="sales"
                placeholder="@lang('admin.general.sales')"
                class="form-control"
                value="{{ old("sales") }}"
                 >
                 @error("sales")
                  <div class="alert my-2 alert-danger">{{ $message }}</div>
                 @enderror
        </div>   
        <div class="col form-group">
            <label>@lang('admin.general.rate') <span class="text-danger">*</span></label>
            <input
                type="text"
                name="rate"
                placeholder="@lang('admin.general.rate')"
                class="form-control"
                value="{{ old("rate") }}"
                 >
                 @error("rate")
                  <div class="alert my-2 alert-danger">{{ $message }}</div>
                 @enderror
        </div>  
        <div class="col form-group">
            <label>@lang('admin.general.ventures') <span class="text-danger">*</span></label>
            <input
                type="text"
                name="ventures"
                placeholder="@lang('admin.general.ventures')"
                class="form-control"
                value="{{ old("ventures") }}"
                 >
                 @error("ventures")
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
