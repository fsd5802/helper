@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('admin.header.contactus') @endsection
@section('title') @lang('admin.header.contactus') @endsection
@push('css')
<style>
    .disableBtnCreate , .custimizeEditBtn
    {
        display: none  !important;
    }

</style>
@endpush
{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.general.name')</th>
                <th scope="col">@lang('admin.general.email')</th>
                <th scope="col">@lang('admin.general.phone')</th>
                <th scope="col">@lang('admin.general.title')</th>
                <th scope="col">@lang('admin.general.desc')</th>
                <th scope="col">@lang('admin.general.created_at')</th>
                <th scope="col">@lang('admin.general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{  $value->email }}</td>
                    <td>{{ $value->phone  }}</td>
                    <td>{{ $value->subject  }}</td>
                    <td>{{ substr($value->message  , 0 , 20) }}</td>
                    <td>{{date("d/m/Y", strtotime($value->created_at)) }}</td>
                    <td>
                        @include('admin.components.table-control', [ 'name'=>'contacts', 'value'=>$value])
                    </td>

                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{ $data->links('vendor.pagination.custom') }}
    </div>
@endsection
