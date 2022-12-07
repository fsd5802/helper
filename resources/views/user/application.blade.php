@extends('layouts.master')
@section('title')
    Application
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.application') , 'link_name' => 'jobs' ])

    @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-success text-center">
            {{ session()->get('error') }}
        </div>
    @endif
    <section class="str-feature-section str-feature-section-page">
        <div class="container">
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">
                    <!--alerts-->
                        <!--form-->
                        <div class="checkout-form">
                            <div class="title">
                                <h4>@lang('application.applicant_info')</h4>
                            </div>
                            <form action="{{getRoute('jobs.apply',['job_id'=>$job_id])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">@lang('application.name')</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                   name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">@lang('application.phone')</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                                   name="phone" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">@lang('application.email')</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                                   name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for=""> @lang('application.cv')</label>
                                            <input class="form-control @error('cv') is-invalid @enderror" type="file"
                                                   name="cv" accept="application/pdf" value="{{ old('cv') }}">
                                            @error('cv')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center">

                                        <button class="btn btn-primary" type="submit">@lang('application.send')</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
{{-- @section('js') --}}

{{-- <script>
    $(document).ready(function(){
        $("#product_select").on("change",function(){
            let value = $(this).find(":selected").attr("product-price");
            $("#price").val(value);
        });
});
</script> --}}
{{-- @endsection --}}

