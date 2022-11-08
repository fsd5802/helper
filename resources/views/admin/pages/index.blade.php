@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('admin.header.pages') @endsection
@section('title') @lang('admin.header.blogs') @endsection
@section('create_route') {{ getRoute('pages.'.$create.'') }} @endsection

{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.general.title')</th>
                <th scope="col">@lang('admin.general.body')</th>
                <th scope="col">@lang('admin.general.created_at')</th>
                <th scope="col">@lang('admin.general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{!!  substr($value->desc, 0, 20); !!}</td>
                    <td>{{date("d/m/Y", strtotime($value->created_at)) }}</td>
                    {{-- <td>
                        @include('admin.components.table-control', [ 'name'=>'pages.'.$identifier.'', 'value'=>$value])
                    </td> --}}

                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{ $data->links('vendor.pagination.custom') }}
    </div>
@endsection
