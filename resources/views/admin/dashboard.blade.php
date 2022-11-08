@extends('admin.layouts.app')
@section('title') @lang('general.dashboard') @endsection
@section('subheader')
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@yield('module_name')</h5>
    <!--end::Page Title-->
</div>
<div class="d-flex align-items-center">
    <!--begin::Actions-->

    <a href="{{ url('/'.app()->getLocale().'/admin') }}"
        class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">@lang('general.dashboard')
    </a>
    <span> / </span>
    <span class="btn-clean btn-sm font-weight-bold font-size-base mr-1">@yield('module_name')</span>
    <span> / </span>
    <!--end::Actions-->
</div>
@endsection
@section('content')
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="row">
                  {{-- section1 for mangers --}}
                    <div class="col-md-6 mb-5">
                        <div class="" style="margin-top: 0;">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="text-center">@lang('admin.sidenav.mangers') </h1>
                                    <div class="table-responsive">
                                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                            <thead>
                                                <tr class="text-left text-uppercase">
                                                    <th style="min-width: 100px">@lang('admin.general.name')</th>
                                                    <th style="min-width: 100px">@lang('admin.general.role')</th>
                                                    <th style="min-width: 100px">@lang('admin.general.created_at')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($admins)>0)
                                                    @foreach($admins as $key => $value)
                                                        <tr>
                                                            <td>{{ $value->name }}</td>
                                                            <td>{{ trans("admin.roles.".$value->type."") }}</td>
                                                            <td>{{ date("d-m-Y", strtotime($value->created_at)) }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>

                  {{-- section2 for services --}}
                  <div class="col-md-6 mb-5">
                    <div class="" style="margin-top: 0;">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">@lang('admin.sidenav.services') </h1>
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                            <tr class="text-left text-uppercase">
                                                <th style="min-width: 100px">@lang('admin.general.name')</th>
                                                <th style="min-width: 100px">@lang('admin.general.image')</th>
                                                <th style="min-width: 100px">@lang('admin.general.created_at')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($services)>0)
                                                @foreach($services as $key => $value)
                                                    <tr>
                                                        <td>{{ $value->name }}</td>
                                                        <td><img src="{{asset($value->image)}}" style="width:70px;" alt="{{ $value->name }}"></td>
                                                        <td>{{ date("d-m-Y", strtotime($value->created_at)) }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>

                {{-- section3 for contact us messages --}}
                <div class="col-md-6 mb-5">
                    <div class="" style="margin-top: 0;">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">@lang('admin.sidenav.services') </h1>
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                            <tr class="text-left text-uppercase">
                                                <th style="min-width: 100px">@lang('admin.general.name')</th>
                                                <th style="min-width: 100px">@lang('admin.general.phone')</th>
                                                <th style="min-width: 100px">@lang('admin.general.email')</th>
                                                <th style="min-width: 100px">@lang('admin.general.subject')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($contacts)>0)
                                                @foreach($contacts as $key => $value)
                                                    <tr>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{$value->phone }}</td>
                                                        <td>{{$value->email }}</td>
                                                        <td>{{$value->subject }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>

                </div>
            </div>
        </div>
@endsection