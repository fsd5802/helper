<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="{{ url('/'.app()->getLocale()) }}" class="brand-logo" target="_blank">
            <img alt="{{setting()->name}}" @if(setting()->logo != null) src="{{ asset(setting()->logo) }}" @endif class="w-50" />
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                {{-- Home DashBoard --}}
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{url('/' . app()->getLocale() . "/admin")}}" class="menu-link">
                       @include('admin.includes.aside')
                        <span class="menu-text">{{ trans('admin.sidenav.home') }}</span>
                    </a>
                </li>
                {{-- mangers of system --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.mangers")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.mangers")</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("admins.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addManger")</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
               {{--
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.works")</span>
                        <i class="menu-arrow"></i>
                    </a>

                </li>
               --}}
                {{-- Blogs  --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.blogs")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.blogs")</span>
                                </span>
                            </li>
                            {{-- blog --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createBlog') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.blog")</span>
                                            </a>
                                        </li>
                             {{-- add blogs --}}
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("blogs.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addBlog")</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- portfolios  --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.portfolios")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.portfolios")</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createPortfolio') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.portfolio")</span>
                                            </a>
                                        </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("portfolios.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addPortfolio")</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    {{-- Types of works  --}}
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.blogs")</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("works.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addWork")</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- services of system --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.services")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.services")</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createService') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.service")</span>
                                            </a>
                                        </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("services.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addService")</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- plans of system --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.plans")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.plans")</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("plans.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addPlan")</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Parteners  --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.sliders")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.sliders")</span>
                                </span>
                            </li>
                            {{-- customer --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createCustomer') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.customer")</span>
                                            </a>
                                        </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("sliders.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addSlider")</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- testimonials  --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">@lang("admin.sidenav.testimonials")</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">@lang("admin.sidenav.testimonials")</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ getRoute("testmonials.index") }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.addTestimonial")</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- Settingss --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        @include('admin.includes.aside')
                        <span class="menu-text">{{ trans('admin.sidenav.general_setting') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">{{ trans('general.sidenav.general_setting') }}</span>
                                </span>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.web_setting")</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                            {{-- main settings --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute("settings.index") }}" class="menu-link">
                                                @include('admin.includes.aside')
                                                <span class="menu-text">@lang("admin.sidenav.main_setting")</span>
                                            </a>
                                        </li>
                                            {{--socail media --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute("icons.index") }}" class="menu-link">
                                                @include('admin.includes.aside')
                                                <span class="menu-text">@lang("admin.sidenav.socialMedia")</span>
                                            </a>
                                        </li>
                                        {{-- Contact us--}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{getRoute("contacts.index")}}" class="menu-link">
                                            @include('admin.includes.aside')
                                                <span class="menu-text">{{ trans('admin.sidenav.contactus') }}</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">@lang("admin.sidenav.other_pages")</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createAbout') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.aboutus")</span>
                                            </a>
                                        </li>
                                        {{-- vision --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createVision') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.vision")</span>
                                            </a>
                                        </li>
                                        {{-- mission --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createMission') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.mission")</span>
                                            </a>
                                        </li>
                                        {{-- Quality Policy --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createQuality') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.quality")</span>
                                            </a>
                                        </li>
                                        {{-- Partener --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createPartner') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.partner")</span>
                                            </a>
                                        </li>
                                        {{-- Company Team --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createTeam') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.team")</span>
                                            </a>
                                        </li>



                                        {{-- plan --}}
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{ getRoute('pages.createPlan') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">@lang("admin.sidenav.plan")</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>




                        </ul>
                    </div>
                </li>

                {{-- start product  section --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
                                    <path
                                        d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{ trans('general.aside.product') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">

                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">{{ trans('general.aside.product') }}</span>
                                </span>
                            </li>
                            <li class="menu-item menu-item-submenu"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="{{ getRoute('product.index') }}" class="menu-link menu-toggle">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">{{ trans('general.aside.create_product') }}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- end product  section --}}


                {{-- start orders  section --}}
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
                                    <path
                                        d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>

                        <span class="menu-text">{{ trans('general.aside.orders') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">

                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">{{ trans('general.aside.product') }}</span>
                                </span>
                            </li>
                            <li class="menu-item menu-item-submenu"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="{{ getRoute('orders') }}" class="menu-link menu-toggle">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">{{ trans('general.aside.orders') }}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- end orders  section --}}


                                {{-- start invoices  section --}}
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
                                                    <path
                                                        d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        
                                        <span class="menu-text">{{ trans('general.aside.invoices') }}</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">{{ trans('general.aside.product') }}</span>
                                                </span>
                                            </li>
                                            <li class="menu-item menu-item-submenu"
                                                aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="{{ getRoute('invoice.index') }}" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">{{ trans('general.aside.invoices') }}</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                {{-- end invoices  section --}}


                {{-- Logout Button --}}
                <li class="menu-section">
                    <a href="{{ getRoute("logout") }}">
                    <h4 class="menu-text text-danger">{{ trans("admin.sidenav.logout") }}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
