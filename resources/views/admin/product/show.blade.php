@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('general.aside.product'))
@section('index_route', getRoute('product.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('general.aside.product') @endsection

@push('css')
    <style>
        p {
            border: none !important;
        }

    </style>
@endpush


{{-- Fields --}}
@section('fields_content')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.show')</h3>
            </div>
            <div class="card-toolbar">
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">

                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('product.name') </label>

                            <p>{{ $data->translate($locale)->name }}</p>
                        </div>

                        <div class="col form-group">
                            <label>@lang('product.desc') </label>

                            <p>{!! $data->translate($locale)->description !!}</p>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="col form-group">
                <label>@lang('product.price') </label>
                <p>{{ $data->price }}</p>
            </div>

            <div class="col form-group">
                <label>@lang('product.count') </label>

                <p>{{ $data->count }}</p>
            </div>

            <div class="col form-group">
                @if (isset($data->image))
                    <label>@lang('product.image') </label>
                    <br>
                    <img src="{{ asset($data->image) }}" class="w-25">
                @endif
            </div>
        </div>



    </div>
    </div>
@endsection
