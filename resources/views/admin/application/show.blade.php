@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.applications'))
@section('index_route', getRoute('applications.index'))
@section('page_type', trans('general.show'))
@section('title') @lang('admin.header.applications') @endsection

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
                <div class="col form-group">
                    <label>@lang('admin.general.name')<span class="text-danger">*</span></label>
                    <p>{{ $application->name }}</p>
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.phone')<span class="text-danger">*</span></label>
                    <p>{{ $application->phone }}</p>
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.email')<span class="text-danger">*</span></label>
                    <p>{{ $application->email }}</p>
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.job')<span class="text-danger">*</span></label>
                    <p>{{ isset($application->job->name)?$application->job->name:$value->job_title }}</p>
                </div>
                <div class="col form-group">
                    <label>@lang('admin.general.cv')<span class="text-danger">*</span></label>
                    <p>                    <a class="text-decoration-none text-dark" href="{{ route('cv.download',['id'=>$application->id,'locale'=>app()->getLocale()]) }}"><i class="fas fa-download px-2" style="font-size: 20px"></i>{{ $application->cv }}</a></p>

                </div>
            </div>

        </div>
    </div>
@endsection
