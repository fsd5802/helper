@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.aside.product'))
@section('index_route', getRoute('product.index'))
@section('store_route', getRoute('product.store'))
@section('page_type', trans('general.add_new'))
@section('form_type', 'POST')
@section('title') @lang('general.aside.product') @endsection

{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.add_new')</h3>
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
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}"
                        role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('product.name') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                                placeholder="@lang('product.name')"
                                class="form-control @error($locale . '.name') is-invalid @enderror"
                                value="{{ old($locale . '.name') }}">
                            @error("$locale.name")
                                <div class="alert my-2 alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col form-group">
                            <label>@lang('product.desc')(@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error($locale . '.description') is-invalid @enderror "
                                type="text" name="{{ $locale . '[description]' }}" rows="4"
                                id="{{ $locale }}.editor1">{{ old($locale . '.description') }}</textarea>
                            @error("$locale.description")
                                <div class="alert my-2 alert-danger">{{ $message }}</div>
                            @enderror
                            <script>
                                CKEDITOR.replace('{{ $locale }}.editor1', {

                                    // Setting default language direction to right-to-left.
                                    contentsLangDirection: 'rtl',
                                    height: 270,
                                    scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
                                    scayt_sLang: 'auto',
                                    removeButtons: 'PasteFromWord'
                                });
                            </script>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col form-group">
                <label>@lang('product.price') <span class="text-danger">*</span></label>
                <input type="text" name="price" id="price" placeholder="@lang('product.price')" class="form-control"
                    value="{{ old('price') }}">
                @error('price')
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col form-group">
                <label>@lang('product.count') <span class="text-danger">*</span></label>
                <input type="text" name="count" id="count" placeholder="@lang('product.count')" class="form-control"
                    value="{{ old('count') }}">
                @error('count')
                    <div class="alert my-2 alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col form-group">
                <label>@lang('product.image')</label>
                <input type="file" name="image" placeholder="@lang('product.image')" class="form-control">
                @error('image')
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
