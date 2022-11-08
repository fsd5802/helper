@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('general.aside.product') @endsection
@section('permission', 'organization')
@section('title') @lang('general.aside.product') @endsection
@section('create_route') {{ getRoute('product.create') }} @endsection

{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('product.name')</th>
                <th scope="col">@lang('product.desc')</th>
                <th scope="col">@lang('product.created_at')</th>
                <th scope="col">@lang('product.control')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{!! $value->description !!}</td>
                    <td>{{ $value->created_at }}</td>

                    <td>
                        @include('admin.components.table-control', ['name'=>'product',
                        'value'=>$value])
                    </td>

                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{-- {{ $data->links('vendor.pagination.custom') }} --}}
    </div>
@endsection
