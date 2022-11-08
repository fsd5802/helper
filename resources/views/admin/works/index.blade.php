@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('admin.header.works') @endsection
@section('title') @lang('admin.header.works') @endsection
@section('create_route') {{ getRoute('works.create') }} @endsection

{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.general.name')</th>
                <th scope="col">@lang('admin.general.created_at')</th>
                <th scope="col">@lang('admin.general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ date("d/m/Y", strtotime($value->created_at)) }}</td>

                    <td>
                        @include('admin.components.table-control', [ 'name'=>'works', 'value'=>$value])
                    </td>

                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{ $data->links('vendor.pagination.custom') }}
    </div>
@endsection
