@extends('layouts.master')
@section('title') @lang('user.header.contactus')  @endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.contactus')  , 'link_name' => 'getContactUs'  ])

    <section class="str-contact-section relative-position">
        <div class="container">
            <div class="str-section-title text-center str-title-center str-headline">
                <h2>@lang('user.header.contactus')</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 order-sm-2">
                    <div class="contact-info px-2">
                        <div class="heading-title">
                            <h3>@lang('user.footer.info')</h3>
                            <p>
                                <i class="fas fa-map-marker-alt"></i>@if(setting()->address != null) {!! setting()->address !!} @endif
                            </p>
                            <p><i class="fas fa-phone"></i><a
                                    href="tel:01000291432">@if(setting()->phone != null) {{ setting()->phone  }} @endif </a>
                            </p>
                            <p><i class="fas fa-envelope"></i><a
                                    href="mailto:info@deltaitech.com">@if(setting()->email != null) {{ setting()->email  }} @endif</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="success   text-light my-3 p-2 text-center d-none"
                         style="background-color:rgb(38,129,219)"></div>
                    <div class="getin_form">
                        <form method="POST" id="ContactUs">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12" id="result"></div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="d-none"></label>
                                        <input class="form-control" type="text"
                                               placeholder="@lang('admin.general.name')" name="name">
                                        <div id="name" class="err"></div>

                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="d-none" for=""></label>
                                        <input class="form-control" type="email"
                                               placeholder="@lang('admin.general.email')" name="email">
                                        <div id="email" class="err"></div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="d-none" for=""></label>
                                        <input class="form-control" type="text"
                                               placeholder="@lang('admin.general.phone')" name="phone">
                                        <div id="phone" class="err"></div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="d-none" for=""></label>
                                        <input class="form-control" type="text"
                                               placeholder="@lang("admin.general.title")" name="subject">
                                        <div id="subject" class="err"></div>

                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="d-none" for=""></label>
                                        <textarea class="form-control" placeholder="@lang("admin.general.body")"
                                                  rows="5" id="message" name="message"></textarea>
                                        <div id="Mmessage" class="err"></div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group @error('g-recaptcha-response') is-invalid @enderror">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <button class="contact_btn gradient-btn w-100"
                                            type="submit">@lang("admin.general.send")</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- ajax call --}}
@section("js")
    <script>
        $('#ContactUs').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            $(".err").empty();
            $(".err").addClass("d-none");
            $.ajax({
                type: 'POST',
                url: "{{ getRoute('handleContactUs') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'name': $("input[name=name]").val(),
                    'email': $("input[name=email]").val(),
                    'phone': $("input[name=phone]").val(),
                    'subject': $("input[name=subject]").val(),
                    'message': $("#message").val(),
                },
                success: (response) => {
                    if (response) {
                        this.reset();
                        console.log(response.success);
                        $('.success').removeClass('d-none').text(response.success);
                    }
                },
                error: function (response) {
                    $(".err").addClass("d-block");
                    if (response.responseJSON.errors.name) {
                        $("#name").append(`<div class="alert alert-danger my-1">${response.responseJSON.errors.name}</div>`);
                    }
                    if (response.responseJSON.errors.email) {
                        $("#email").append(`<div class="alert alert-danger my-1">${response.responseJSON.errors.email}</div>`);
                    }
                    if (response.responseJSON.errors.phone) {
                        $("#phone").append(`<div class="alert alert-danger my-1">${response.responseJSON.errors.phone}</div>`);
                    }
                    if (response.responseJSON.errors.subject) {
                        $("#subject").append(`<div class="alert alert-danger my-1">${response.responseJSON.errors.subject}</div>`);
                    }
                    if (response.responseJSON.errors.message) {
                        $("#Mmessage").append(`<div class="alert alert-danger my-1">${response.responseJSON.errors.message}</div>`);
                    }
                }
            });
        });

    </script>
@endsection

