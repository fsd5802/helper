@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.settings'))
@section('index_route', getRoute('settings.index'))
@section('page_type', trans('general.show'))
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
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('admin.general.name')<span class="text-danger">*</span></label>
                            <p>{{ $setting->translate($locale)->name }}</p>
                        </div>
                        <div class="col form-group">
                            <label>@lang('admin.general.desc')<span class="text-danger">*</span></label>

                            <p>{!! $setting->translate($locale)->desc !!}</p>
                        </div>
                        <div class="col form-group">
                            <label>@lang('admin.general.small_desc')<span class="text-danger">*</span></label>

                            <p>{!! $setting->translate($locale)->small_desc !!}</p>
                        </div>
                        <div class="col form-group">
                            <label>@lang('admin.general.formTo')<span class="text-danger">*</span></label>
                            <p>{{ $setting->translate($locale)->formTo }}</p>
                        </div>
                        <div class="col form-group">
                            <label>@lang('admin.general.address')<span class="text-danger">*</span></label>
                            <p>{{ $setting->translate($locale)->address }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.email') <span class="text-danger">*</span></label>
                <p>{{ $setting->email }}</p>           
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.phone') <span class="text-danger">*</span></label>
                <p>{{ $setting->phone }}</p>           
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.gpsLink') <span class="text-danger">*</span></label>
                <br>
      
                {!! $setting->gpsLink !!}
               
                {{-- <iframe src="{{ $setting->gpsLink }}" height="200" width="300" title="Iframe Example"></iframe> --}}
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13818.894534013876!2d31.182481300000003!3d30.016091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1635082955712!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                <p></p>           
            </div>
            <div class="col form-group">
                @if (isset($setting->image))
                    <label>@lang('slider.image') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($setting->image) }}" class="w-25">
                @endif
            </div>
            <div class="col form-group">
                @if (isset($setting->logo))
                    <label>@lang('admin.general.logo') <span class="text-danger">*</span></label>
                    <br>
                    <img src="{{ asset($setting->logo) }}" class="w-25">
                @endif
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.sales') <span class="text-danger">*</span></label>
                <p>{{ $setting->sales }}%</p>           
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.rate') <span class="text-danger">*</span></label>
                <p>{{ $setting->rate }}%</p>           
            </div>
            <div class="col form-group">
                <label>@lang('admin.general.ventures') <span class="text-danger">*</span></label>
                <p>{{ $setting->ventures }}%</p>           
            </div>
        </div>
    </div>
@endsection
@push('css')

    <style>
        iframe
        {
            width:500px !important;
        }
    </style>
@endpush
