@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('general.aside.orders') @endsection
@section('permission', 'organization')
@section('title') @lang('general.aside.orders') @endsection


{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('product.name')</th>
                <th scope="col">@lang('product.phone')</th>
                <th scope="col">@lang('product.address')</th>
                <th scope="col">@lang('product.status')</th>
                <th scope="col">@lang('product.total_price')</th>
                <th scope="col">@lang('product.created_at')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->total_price }}</td>
                    <td>{{ $value->created_at }}</td>
                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{-- {{ $data->links('vendor.pagination.custom') }} --}}
    </div>
@endsection
