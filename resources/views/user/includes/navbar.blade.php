{{-- <script src="https://apis.google.com/js/platform.js" async defer></script> --}}
<header class="saas_two_main_header" id="header_main">
    <div class="container">
        <div class="s_main_menu">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="brand_logo">
                        <a href="{{ url("/".app()->getLocale()) }}">
                            <img src="{{ asset(setting()->logo) }}" alt="{{ setting()->name }}">
                        </a>
                        {{-- <a href="https://www.google.com/partners/agency?id=1925366997" target="_blank" class="d-md-none">
                            <img src="https://www.gstatic.com/partners/badge/images/2022/PartnerBadgeClickable.svg"/>
                        </a> --}}
                    </div>
                </div>
                <div class="col-md-2">
                    {{-- <div class="g-partnersbadge" data-agency-id="1925366997"></div> --}}
                    {{-- <div class="brand_logo d-none d-md-block">
                          <a href="https://www.google.com/partners/agency?id=1925366997" target="_blank">
                            <img src="https://www.gstatic.com/partners/badge/images/2022/PartnerBadgeClickable.svg"/>
                        </a>
                    </div>--}}
                </div>
                <div class="col-md-8">
                    <div class="main_menu_list clearfix float-right">
                        <nav class="s2-main-navigation  clearfix ul-li">
                            <ul class="navbar-nav text-capitalize clearfix" id="main-nav">
                                <li class="{{Route::is('home') ? 'active' : '' }}"><a href="{{ url("/".app()->getLocale()) }}">@lang("user.navbar.home")</a></li>
                                <li class="{{Route::is('aboutus') ? 'active' : '' }}"><a href="{{ getRoute("aboutus") }}">@lang("user.navbar.aboutus")</a></li>
                                <li class="{{Route::is('works') ? 'active' : '' }}"><a href="{{ getRoute('works') }}">@lang("user.navbar.ourwork")</a></li>
                                <li class="{{Route::is('services') ? 'active' : '' }}"><a href="{{ getRoute('services') }}">@lang("user.navbar.services")</a></li>
                                <li class="{{Route::is('jobs') ? 'active' : '' }}"><a href="{{ getRoute('jobs') }}">@lang("user.navbar.jobs")</a></li>
                                <li class="{{Route::is('customers') ? 'active' : '' }}"><a href="{{ getRoute("customers") }}">@lang("user.navbar.customers")</a></li>
                                <li class="{{Route::is('blogs') ? 'active' : '' }}"><a href="{{ getRoute("blogs") }}">@lang("user.navbar.blogs")</a></li>
                                <li class="{{Route::is('plans') ? 'active' : '' }}"><a href="{{ getRoute("plans") }}">@lang("user.navbar.ticketsupport") </a></li>
                                <li class="{{Route::is('service_request') ? 'active' : '' }}">
                                    <a href="{{ getRoute("service_request.index") }}">{{__('user.header.service_request')}} </a>
                                </li>
                                <li class="{{Route::is('quote_request') ? 'active' : '' }}">
                                    <a href="{{ getRoute("quote_request.index") }}">{{__('user.header.quote_request')}} </a>
                                </li>
                                <li class="{{Route::is('getContactUs') ? 'active' : '' }}"><a href="{{ getRoute("getContactUs") }}"> @lang("user.navbar.contactus")</a></li>
                                {{-- <li class="dropdown user"><a href="#"> <i class="fa fa-user"></i></a>
                                  <ul class="dropdown-menu clearfix">
                                    <li><a href="login.html">login</a></li>
                                    <li><a href="register.html">sign up</a></li>
                                  </ul>
                                </li> --}}
                            </ul>
                        </nav>
                        {{-- @foreach (config('app.supportedLocales') as $locale)
                           @if(app()->getLocale() != $locale)
                               @php
                               $text  = "$_SERVER[REQUEST_URI]";
                               $text  = substr($text, 29);
                               @endphp

                             <div class="saas_sign_up_btn text-center">
                                 <a href="{{url('/'.$locale. $text)}}">
                                   @lang('general.'.$locale)
                                 </a>
                             </div>
                           @endif
                         @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- //desktop menu-->
        <div class="s2-mobile_menu relative-position">
            <div class="s2-mobile_menu_button s2-open_mobile_menu"><i class="fas fa-bars"></i></div>
            <div class="s2-mobile_menu_wrap">
                <div class="mobile_menu_overlay s2-open_mobile_menu"></div>
                <div class="s2-mobile_menu_content">
                    <div class="s2-mobile_menu_close s2-open_mobile_menu"><i class="far fa-times-circle"></i></div>
                    <div class="m-brand-logo text-center"><a href="{{ url('/'.app()->getLocale()) }}"><img
                                src="{{ asset(setting()->logo) }}" alt="{{ setting()->name }}"></a></div>
                    <nav class="s2-mobile-main-navigation  clearfix ul-li">
                        <ul class="navbar-nav text-capitalize clearfix" id="m-main-nav">
                            <li class="{{Route::is('home') ? 'active' : '' }}"><a href="{{ url("/".app()->getLocale()) }}">@lang("user.navbar.home")</a></li>
                            <li class="{{Route::is('aboutus') ? 'active' : '' }}"><a href="{{ getRoute("aboutus") }}">@lang("user.navbar.aboutus")</a></li>
                            <li class="{{Route::is('works') ? 'active' : '' }}"><a href="{{ getRoute('works') }}">@lang("user.navbar.ourwork")</a></li>
                            <li class="{{Route::is('services') ? 'active' : '' }}"><a href="{{ getRoute('services') }}">@lang("user.navbar.services")</a></li>
                            <li class="{{Route::is('jobs') ? 'active' : '' }}"><a href="{{ getRoute('jobs') }}">@lang("user.navbar.jobs")</a></li>
                            <li class="{{Route::is('customers') ? 'active' : '' }}"><a href="{{ getRoute("customers") }}">@lang("user.navbar.customers")</a></li>
                            <li class="{{Route::is('blogs') ? 'active' : '' }}"><a href="{{ getRoute("blogs") }}">@lang("user.navbar.blogs")</a></li>
                            <li class="{{Route::is('plans') ? 'active' : '' }}"><a href="{{ getRoute("plans") }}">@lang("user.navbar.ticketsupport") </a></li>
                            <li class="{{Route::is('service_request') ? 'active' : '' }}">
                                <a href="{{ getRoute("service_request.index") }}">{{__('user.header.service_request')}} </a>
                            </li>
                            <li class="{{Route::is('quote_request') ? 'active' : '' }}">
                                <a href="{{ getRoute("quote_request.index") }}">{{__('user.header.quote_request')}} </a>
                            </li>
                            <li class="{{Route::is('getContactUs') ? 'active' : '' }}"><a href="{{ getRoute("getContactUs") }}"> @lang("user.navbar.contactus")</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
