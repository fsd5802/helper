@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('admin.header.sliders') @endsection
@section('title') @lang('admin.header.sliders') @endsection
@section('create_route') {{ getRoute('sliders.create') }} @endsection

{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.general.image')</th>
                <th scope="col">@lang('admin.general.created_at')</th>
                <th scope="col">@lang('admin.general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><img src="{{ asset($value->image) }}" style="width:140px;"></td>
                    <td>{{date("d/m/Y", strtotime($value->created_at)) }}</td>
                    <td>
                        @include('admin.components.table-control', [ 'name'=>'sliders', 'value'=>$value])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $data->links('vendor.pagination.custom') }}
    </div>
@endsection
