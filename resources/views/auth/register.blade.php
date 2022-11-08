  {{-- @extends('layouts.master')
  @section('header')
  @include('user.includes.header' , ['header_name' => __('user.header.register')  , 'link_name' => 'aboutus'  ])

  @endsection
  @section("content")

          <form method="POST" action="{{ getRoute('handleRegister') }}">
              @csrf
              <section class="str-login-register-section relative-position">
                  <div class="str-aboutbg1 position-absolute"><img src="assets/img/startup/shape/vs1.png" alt=""></div>
                  <div class="str-aboutbg2 position-absolute"><img src="assets/img/startup/shape/vs2.png" alt=""></div>
                  <div class="str-aboutbg3 position-absolute"><img src="assets/img/startup/shape/vs3.png" alt=""></div>
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-8 col-sm-10">
                        <div class="login_register_form">
                          <form action="">
                              <div class="row">
                                  <div class="col-md-12 col-sm-12">
                                      <div class="form-group">
                                        <label >@lang("user.form.name")</label>
                                        <input class="form-control" type="text" placeholder="@lang("user.form.name")" name="name" >
                                      </div>
                                  </div>
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
                                <button class="btn" type="submit">@lang("user.form.signup")</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
          </form>
  @endsection
 --}}
