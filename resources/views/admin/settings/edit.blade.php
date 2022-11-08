@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.settings'))
@section('index_route', getRoute('settings.index'))
@section('store_route', getRoute('settings.update', $setting))
@section('page_type', trans('general.edit'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.settings') @endsection

{{-- Fields --}}
@section('fields_content')
@method('put')
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

            @foreach (config('translatable.locales') as $key => $locale)
            <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                <div class="col form-group">
                    <label>@lang('slider.name') (@lang('general.'.$locale))<span class="text-danger">*</span></label>
                    <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                        placeholder="@lang('slider.name')" class="form-control @error(" $locale.name") is-invalid
                        @enderror" value="{{ old($locale . '.name', $setting->translate($locale)->name) }}">
                    @error("$locale.name")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('slider.desc') (@lang('general.'.$locale))<span class="text-danger">*</span></label>
                    <textarea name="{{ $locale . '[desc]' }}" placeholder="@lang('slider.desc')" rows="5"
                        class="form-control @error(" $locale.desc") is-invalid @enderror" >
                      {{ old($locale . '.desc', strip_tags($setting->translate($locale)->desc)) }}
                    </textarea>
                    @error("$locale.desc")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.small_desc') (@lang('general.'.$locale))<span class="text-danger">*</span></label>
                    <textarea name="{{ $locale . '[small_desc]' }}" placeholder="@lang('admin.general.small_desc')" rows="5"
                        class="form-control @error(" $locale.small_desc") is-invalid @enderror" >
                      {{ old($locale . '.small_desc', strip_tags($setting->translate($locale)->small_desc)) }}
                    </textarea>
                    @error("$locale.small_desc")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.address') (@lang('general.'.$locale))<span class="text-danger">*</span></label>
                    <textarea name="{{ $locale . '[address]' }}" placeholder="@lang('admin.general.address')"
                        class="form-control @error(" $locale.address") is-invalid @enderror" >
                      {{ old($locale . '.address', strip_tags($setting->translate($locale)->address)) }}
                    </textarea>
                    @error("$locale.address")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col form-group">
                    <label>@lang('admin.general.formTo') (@lang('general.'.$locale))<span class="text-danger">*</span></label>
                    <textarea name="{{ $locale . '[formTo]' }}" placeholder="@lang('admin.general.formTo')"
                        class="form-control @error(" $locale.formTo") is-invalid @enderror" >
                      {{ old($locale . '.formTo', strip_tags($setting->translate($locale)->formTo)) }}
                    </textarea>
                    @error("$locale.formTo")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @endforeach


        </div>

        <div class="col form-group">
            <label>@lang('admin.general.email') <span class="text-danger">*</span></label>
            <input type="text" name="email" value="{{ old("email" , $setting->email) }}" placeholder="@lang('admin.general.email')" class="form-control">
            @error("email")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.phone') <span class="text-danger">*</span></label>
            <input type="text" name="phone" value="{{ old("phone" , $setting->phone) }}" 
             placeholder="@lang('admin.general.phone')" class="form-control">
            @error("phone")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.gpsLink') <span class="text-danger">*</span></label>
            <input type="text" name="gpsLink" value="{{ old("gpsLink" , $setting->gpsLink) }}" 
             placeholder="@lang('admin.general.gpsLink')" class="form-control">
            @error("gpsLink")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div> 


        <div class="col form-group">
            @if (isset($setting->image))
            <label>@lang('slider.image') <span class="text-danger">*</span></label>
            <br>
            <img src="{{ asset($setting->image) }}" class="w-25">
            @endif
        </div>
        <div class="col form-group">
            <label>@lang('slider.image') <span class="text-danger">*</span></label>
            <input type="file" name="image" placeholder="@lang('slider.image')" class="form-control" value="">
            @error("image")
            <div class="alert my-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            @if (isset($setting->logo))
            <label>@lang('slider.image') <span class="text-danger">*</span></label>
            <br>
            <img src="{{ asset($setting->logo) }}" class="w-25">
            @endif
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.logo') <span class="text-danger">*</span></label>
            <input type="file" name="logo" placeholder="@lang('admin.general.logo')" class="form-control" value="">
            @error("logo")
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
                value="{{ old("sales", $setting->sales) }}"
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
                value="{{ old("rate", $setting->rate) }}"
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
                value="{{ old("ventures", $setting->ventures) }}"
                class="form-control"
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