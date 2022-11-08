@extends('layouts.master')
@section('header')
@include('user.includes.header' , ['header_name' => __('user.header.login')  , 'link_name' => 'login'  ])

@endsection
@section("content")
<section class="str-login-register-section relative-position">
    <div class="str-aboutbg1 position-absolute"><img src="{{ asset("assets/user/img/startup/shape/vs1.png") }}" alt=""></div>
    <div class="str-aboutbg2 position-absolute"><img src="{{ asset("assets/user/img/startup/shape/vs2.png") }}"  alt=""></div>
    <div class="str-aboutbg3 position-absolute"><img src="{{ asset("assets/user/img/startup/shape/vs3.png") }}" alt=""></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-sm-10">
          <div class="login_register_form">
            <form method="POST" action="{{ getRoute('handleLogin') }}">
                @csrf
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="">@lang("user.form.email")</label>
                    <input class="form-control" type="email" placeholder="@lang("user.form.email")" name="email" >
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="">@lang("user.form.password")</label>
                    <input class="form-control" type="password" placeholder="@lang("user.form.password")" name="password" >
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" id="remember" type="checkbox" name="remember">
                      <label class="form-check-label" for="remember">@lang("user.form.remember_me")</label><a class="forget-pass" href="">@lang("user.form.forget_pass")</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <button class="btn" type="submit">@lang("user.form.login")</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
      
@endsection