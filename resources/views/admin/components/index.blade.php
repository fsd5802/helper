@extends('admin.layouts.app')
@section('subheader')

<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@yield('module_name')</h5>
    <!--end::Page Title-->
</div>
<div class="d-flex align-items-center">
    <!--begin::Actions-->
    <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">@lang('general.dashboard')</a> <span> / </span>
    <span class="btn-clean btn-sm font-weight-bold font-size-base mr-1">@yield('module_name')</span> <span> / </span>
    <!--end::Actions-->
</div>

@endsection

@section('content')
<div class="col-12">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">@lang('general.data')
                    <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                {{-- @can('create '.View::getSection('permission')) --}}
                  @if(Auth::user()->type == "superadmin" && !request()->routeIs('applications.*'))  <a href="@yield('create_route')" class="btn btn-primary font-weight-bolder disableBtnCreate">
                    <i class="fas fa-plus-circle fa-sm"></i>@lang('general.add_new')</a> @endif
                {{-- @endcan --}}
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            @yield('filters')
            <div class="table-responsive">
                @yield('page_content')
            </div>
        </div>
    </div>
</div>
@endsection