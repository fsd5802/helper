@extends('admin.components.index')
{{-- Preparing page properties --}}
@section('module_name') @lang('general.aside.invoices') @endsection
@section('permission', 'organization')
@section('title') @lang('general.aside.invoices') @endsection


{{-- Table Content --}}
@section('page_content')
    <table class="table table-bordered table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('invoice.name')</th>
                <th scope="col">@lang('invoice.phone')</th>
                <th scope="col">@lang('invoice.email')</th>
                <th scope="col">@lang('invoice.product')</th>
                <th scope="col">@lang('invoice.price')</th>
                <th scope="col">@lang('invoice.status')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->Product->name}}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->status }}</td>
                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{-- {{ $data->links('vendor.pagination.custom') }} --}}
    </div>
@endsection
