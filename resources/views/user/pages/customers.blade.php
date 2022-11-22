@extends('layouts.master')
@section('title') @lang('user.header.customers')  @endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.customers')  , 'link_name' => 'customers'  ])

    <!--Start of str-partner  section-->
    <section class="str-partner-section str-partner-section-page">
        <div class="container">
            <div class="str-section-title text-center str-title-center str-headline">
                <h2>@if(pages('customer')->name != null ) {{  pages('customer')->name  }}@endif</h2>
                <div>
                    @if(pages('customer')->desc != null ){!!  pages('customer')->desc !!} @endif
                </div>

            </div>
            <div class="smm-case-study-wrapper">
                <div class="smm-case-tab text-center clearfix ul-li">
                    {{-- <ul class="nav text-uppercase nav-tabs" id="tabs">
                      <li class="nav-item"><a class="nav-link text-capitalize active show" href="#" data-target="#customers-tab1" data-toggle="tab">customers tab</a></li>
                      <li class="nav-item"><a class="nav-link text-capitalize" href="#" data-target="#customers-tab2" data-toggle="tab">customers tab</a></li>
                      <li class="nav-item"><a class="nav-link text-capitalize" href="#" data-target="#customers-tab3" data-toggle="tab">customers tab</a></li>
                      <li class="nav-item"><a class="nav-link text-capitalize" href="#" data-target="#customers-tab4" data-toggle="tab">customers tab</a></li>
                      <li class="nav-item"><a class="nav-link text-capitalize" href="#" data-target="#customers-tab5" data-toggle="tab">customers tab</a></li>
                    </ul> --}}
                </div>
                <!-- /tab_button-->
                <div class="smm-case-tab-content">
                    <div class="tab-content" id="tabsContent">
                    {{-- <div class="tab-pane fade active show" id="customers-tab1">
                      <div class="str-partner-area">
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p1.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p2.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p3.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p4.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p5.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p6.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p7.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p8.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p9.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p10.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p11.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p12.png" alt=""></div>
                        <div class="str-partner-img"><img src="assets/img/startup/partner/p13.png" alt=""></div>
                      </div>
                      <div class="saasio-pagination text-center ul-li">
                        <ul>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a class="active" href="#">3</a></li>
                          <li><a href="#">...</a></li>
                          <li><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div> --}}
                    <!-- 1st tab content-->
                        <div class="tab-pane fade  active show" id="customers-tab2">
                            <div class="str-partner-area">
                                @if(count($sliders) >0)
                                    @foreach ( $sliders as  $slider)
                                        <div class="str-partner-img"><img src="{{ asset($slider->image) }}"
                                                                          alt="parteners"></div>
                                    @endforeach
                                @endif
                            </div>
                            {{-- for pagination --}}
                            {{--                   {{$sliders->links('vendor.pagination.custom_user') }}--}}

                        </div>

                        <!-- 2nd tab content-->
                    {{-- <div class="tab-pane fade" id="customers-tab3"></div>
                    <!-- 3ed tab content-->
                    <div class="tab-pane fade" id="customers-tab4"></div>
                    <!-- 4th tab content-->
                    <div class="tab-pane fade" id="customers-tab5"></div> --}}
                    <!-- 5th tab content-->
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 h-100 d-flex align-items-center justify-content-center">
                    {{$sliders->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
