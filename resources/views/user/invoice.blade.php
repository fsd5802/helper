@extends('layouts.master')
@section('title')
    Invoice
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

    <section class="str-feature-section str-feature-section-page">
        <div class="container">
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">
                        <!--alerts-->
                        @if(Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ session()->get('error') }}
                            </div>
                    @endif
                        <!--form-->
                        <div class="checkout-form">
                            <div class="title">
                                <h4>معلومات الدفع</h4>
                            </div>
                            @if (isset($flag))
                                <form action="{{getRoute('invoice.store')}}" method="POST" id="invoice_form">
                                    @else
                                        <form action="{{getRoute('invoice_checkout')}}" method="POST" id="invoice_form">
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">الاسم *</label>
                                                        <input class="form-control @error('name') is-invalid @enderror"
                                                               type="text" name="name" value="{{ old('name') }}">
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">الهاتف *</label>
                                                        <input class="form-control @error('phone') is-invalid @enderror"
                                                               type="text" name="phone" value="{{ old('phone') }}">
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">الكود *</label>
                                                        <input class="form-control @error('code') is-invalid @enderror"
                                                               type="text" name="code" value="{{ old('code') }}">
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">البريد الالكتروني</label>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                               type="text" name="email" value="{{ old('email') }}">
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{--                                    <div class="col-lg-12">--}}
                                                {{--                                        <div class="form-group">--}}
                                                {{--                                            <label for="">الخدمة</label>--}}
                                                {{--                                            <select name="product_id" id="product_select" class="form-control">--}}
                                                {{--                                                @foreach ($products as $product)--}}
                                                {{--                                                    <option product-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->name }}</option>--}}
                                                {{--                                                @endforeach--}}
                                                {{--                                            </select>--}}
                                                {{--                                        </div>--}}
                                                {{--                                    </div>--}}
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">السعر (USD)</label>
                                                        <input class="form-control @error('price') is-invalid @enderror"
                                                               type="number" min="0" step="0.01" name="price" id="price"
                                                               value="{{ old('price') }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 text-center">
                                                    <button class="btn btn-primary" type="submit">ادفع</button>
                                                </div>

                                            </div>
                                        </form>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $("#product_select").on("change", function () {
                let value = $(this).find(":selected").attr("product-price");
                $("#price").val(value);
            });
        });
    </script>
@endsection

