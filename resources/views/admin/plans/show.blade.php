@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.plans'))
@section('index_route', getRoute('plans.index'))
@section('page_type', trans('general.show'))
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
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('admin.general.title')<span class="text-danger">*</span></label>
                            <p>{{ $plan->translate($locale)->name }}</p>
                        </div>
                        <div class="col form-group">
                            <label>@lang('admin.general.supportedplans')<span class="text-danger">*</span></label>
                            <p>{!! $plan->translate($locale)->checkeddec !!}</p>
                        </div> 
                        <div class="col form-group">
                            <label>@lang('admin.general.unsupportedplans')<span class="text-danger">*</span></label>
                            <p>{!! $plan->translate($locale)->uncheckeddec !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col form-group">
                    <label>@lang('admin.general.price') <span class="text-danger">*</span></label>  
                    <p>{{ $plan->price }}</p>
            </div>

        </div>
    </div>
@endsection
