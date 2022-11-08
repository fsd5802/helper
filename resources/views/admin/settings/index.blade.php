@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('admin.header.settings') @endsection

@section('title') @lang('admin.header.settings') @endsection
@section('create_route') {{ getRoute('settings.create') }} @endsection

{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.general.name')</th>
                <th scope="col">@lang('admin.general.address')</th>
                <th scope="col">@lang('admin.general.desc')</th>
                <th scope="col">@lang('admin.general.small_desc')</th>
                <th scope="col">@lang('admin.general.image')</th>
                <th scope="col">@lang('admin.general.logo')</th>
                <th scope="col">@lang('admin.general.email')</th>
                <th scope="col">@lang('admin.general.phone')</th>
                <th scope="col">@lang('admin.general.created_at')</th>
                <th scope="col">@lang('admin.general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ substr($value->address , 0 , 20) }}</td>
                    <td>{!!  substr($value->desc, 0, 20) !!}</td>
                    <td>{!!  substr($value->small_desc, 0, 20) !!}</td>
                    <td><img src="{{ asset($value->image) }}"  style="width:140px;"></td>
                    <td><img src="{{ asset($value->logo) }}"  style="width:140px;"></td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{date("d/m/Y", strtotime($value->created_at)) }}</td>
                    <td>
                        @include('admin.components.table-control', [ 'name'=>'settings', 'value'=>$value])
                    </td>

                </tr>
            @endforeach



        </tbody>

    </table>
    <div>
        {{ $data->links('vendor.pagination.custom') }}
     
    </div>
@endsection

@push('css')
<style>
    .custimizeDelBtn , .disableBtnCreate
    {
       display: none !important;
    }
</style>
@endpush