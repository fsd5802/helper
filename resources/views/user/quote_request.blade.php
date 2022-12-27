@extends('layouts.master')
@section('title')
    {{__('user.header.quote_request')}}
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.quote_request') , 'link_name' => 'quote_request.index' ])


    <section class="str-feature-section str-feature-section-page">
        <div class="container">
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
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">
                        <!--alerts-->
                        <!--form-->
                        <div class="checkout-form">
                            <div class="title">
                                <h4>{{__('custom_validation.quote_request_title')}} <span class="text-danger">*</span>
                                </h4>
                            </div>
                            <form action="{{getRoute('quote_request.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('post')
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

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">@lang('application.email')</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                                   name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">{{__('custom_validation.services')}}</label>
                                            <select name="service_id" class="form-control @error('service_id') is-invalid @enderror" aria-label="Default select example">
                                                <option>{{__('custom_validation.choose')}}</option>
                                                @foreach($services as $service)
                                                    <option value="{{$service->id}}" {{old('service_id') == $service->id ? 'selected' : ''}}>{{$service->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">{{__('custom_validation.message')}}</label>
                                            <textarea id="message" name="message"
                                                      class="form-control @error('message') is-invalid @enderror"
                                                      placeholder="@lang("admin.general.body")" rows="5"></textarea>
                                            @error('message')
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

