@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.plans'))
@section('index_route', getRoute('plans.index'))
@section('store_route', getRoute('plans.store'))
@section('page_type', trans('general.add_new'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.plans') @endsection

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
                    <label>@lang('admin.general.supportedplans')(@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error($locale . '.checkeddec') is-invalid @enderror " type="text"
                        name="{{ $locale . '[checkeddec]' }}" rows="4"
                        id="{{ $locale }}.editor1">{{ old($locale . '.checkeddec') }}</textarea>
                    <script>
                        CKEDITOR.replace('{{ $locale }}.editor1', {
                                    extraPlugins: 'bidi',
                                    // Setting default language direction to right-to-left.
                                    contentsLangDirection: 'rtl',
                                    height: 270,
                                    scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
                                    scayt_sLang: 'auto',
                                    removeButtons: 'PasteFromWord'
                                });
                    </script>
                    @error("$locale.checkeddec")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.unsupportedplans')(@lang('general.'.$locale))<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control @error($locale . '.uncheckeddec') is-invalid @enderror " type="text"
                        name="{{ $locale . '[uncheckeddec]' }}" rows="4"
                        id="{{ $locale }}.editor2">{{ old($locale . '.uncheckeddec') }}</textarea>
                    <script>
                        CKEDITOR.replace('{{ $locale }}.editor2', {
                                    extraPlugins: 'bidi',
                                    // Setting default language direction to right-to-left.
                                    contentsLangDirection: 'rtl',
                                    height: 270,
                                    scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
                                    scayt_sLang: 'auto',
                                    removeButtons: 'PasteFromWord'
                                });
                    </script>
                    @error("$locale.uncheckeddec")
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @endforeach
        </div>
        <div class="col form-group">
            <label>@lang('admin.general.price') <span class="text-danger">*</span></label>
            <input type="text" value="{{ old("price") }}" name="price" placeholder="@lang('admin.general.price')" class="form-control @error('price') is-invalid @enderror">
            @error("price")
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