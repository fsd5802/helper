@extends('layouts.master')
@section('title')@if(setting()->name != null){{ setting()->name }} @else @lang("user.home") @endif @endsection
@section('content')
<!--Start of banner section-->
<section class="saas_two_banner_section relative-position" id="saas_two_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="s2-banner_area relative-position">
          <div class="s2-banner_content saas2-headline pera-content"><span
              class="s2-tilte_tag">@lang('general.hi')</span>
            <h1>@if(setting()->name != null){{ setting()->name }} @endif</h1>
            <p>@if(setting()->small_desc != null){!! setting()->small_desc !!} @endif </p>
            <div class="banner_btn">
              <a href="{{ getRoute('customers') }}"><i
                  class="fas fa-cloud-download-alt"></i>@lang("user.header.customers")</a>
              <a href="{{ getRoute("services") }}"><i
                  class="fas fa-clipboard-list"></i>@lang("user.header.services")</a>
            </div>
          </div>
          <div class="banner_mockup">
            <img @if(setting()->image != null) src="{{ asset(setting()->image) }}" @else src="{{
            asset('assets/user/img/saas-c/banner/b-laptop.png') }}"@endif alt="@if(setting()->name != null){{
            setting()->name }} @endif">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="s2-banner_shape1 position-absolute" data-parallax="{&amp;quot;y&amp;quot; : 100}"
    style="transform:translate3d(0px, 0.029px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, 0.029px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1);">
    <img src="{{ asset('assets/user/img/saas-c/banner/b-shape4.png') }}" alt="">
  </div>
  <div class="s2-banner_shape2 position-absolute"><img src="{{ asset('assets/user/img/saas-c/banner/b-shape3.png') }}"
      alt=""></div>
  <div class="s2-banner_shape3 position-absolute"><img src="{{ asset('assets/user/img/saas-c/banner/b-shape2.png') }}"
      alt=""></div>
</section>


<!--Start o f services  section-->
<section class="str-feature-section" id="str-feature">
  <div class="container">
    <div class="str-section-title text-center str-title-center str-headline"><span class="str-title-tag">{{
        pages('service')->name }}</span>
      <h2>
        {!! pages('service')->desc !!}
      </h2>
    </div>
    <div class="str-feature-content owl-carousel" id="str-slide">
      @if (count($services) > 0)
          @foreach ( $services as $key => $value )
              <div class="str-feature-box wow fadeFromUp" data-wow-delay="{{ $key*100 }}ms" data-wow-duration="1500ms">
                <a href="{{ getRoute('single_service' , $value->id) }}">
                  <div class="str-hover-icon text-center"><i class="fas fa-plus"></i></div>
                  <div class="str-feature-icon-text text-center">
                    <div class="str-feature-icon"><img src="{{ asset($value->image) }}" alt="{{ $value->name }}"></div>
                    <div class="str-feature-text str-headline">
                      <h3>{{ $value->name }}</h3>
                      <div class="str-feature-list ul-li-block">
                        <p>{!! Str::limit($value->desc, 200 ,'...') !!}</p>
                        {{-- <ul>
                          <li>Data research</li>
                          <li> Market analysis</li>
                          <li>Business strategy </li>
                        </ul> --}}
                      </div>
                    </div>
                  </div>
                </a>
              </div>
          @endforeach
      @endif
    </div>
  </div>
</section>

<!--Start of About Us section-->
<section class="str-about-section position-relative" id="str-about">
  <div class="str-aboutbg1 position-absolute"><img src="{{ asset('assets/user/img/startup/shape/vs1.png') }}" alt="">
  </div>
  <div class="str-aboutbg2 position-absolute"><img src="{{ asset('assets/user/img/startup/shape/vs2.png') }}" alt="">
  </div>
  <div class="str-aboutbg3 position-absolute"><img src="{{ asset('assets/user/img/startup/shape/vs3.png') }}" alt="">
  </div>
  <div class="container">
    <div class="str-about-content">
      <div class="row">
        <div class="col-lg-5">
       
          <div class="str-about-text wow fadeFromRight" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="str-section-title text-left str-title-left str-headline"><span
                class="str-title-tag">@lang("user.navbar.aboutus")</span>
              <h2>
                {{ pages('aboutus')->name }}
              </h2>
            </div>
            <div class="str-about-textarea str-about-details"> {!! pages('aboutus')->desc !!}</div>
            {{-- <div class="str-about-list ul-li-block">
              <ul>
                <li>Qhen an unknown printer took a galley of type.</li>
                <li>It was popularised in the 1960s with the release.</li>
                <li>Aldus PageMaker including versions.</li>
              </ul>
            </div> --}}
            <a class="str-btn d-inline-block" href="{{ getRoute("customers") }}">@lang("user.header.customers")<i
                class="fas fa-arrow-alt-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-7">
              @php
                $images = json_decode(pages('aboutus')->image);
                $img1 = $images[1];
                $img2 = $images[2];
                $img3 = $images[3];
                $logo = $images[0];
              @endphp
           <div class="str-about-img position-relative wow fadeFromLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
            <div class="str-about-shape">
              <img src="{{ asset("assets/user/img/startup/shape/abs.png") }}" alt="">
            </div>
            <div class="str-about-logo">
              <img src="{{ asset($logo) }}" class="w-25">
            </div>
            <div class="str-about-img-field">
              <div class="str-about-pic"><img src="{{ asset($img1) }}" alt=""></div>
              <div class="str-progress-area str-headline">
                <h3>@lang("user.about.sales")</h3>
                <div class="barfiller" id="progress1">
                  <div class="tipWrap"><span class="tip"></span></div><span class="fill"
                    data-percentage="{{ setting()->sales }}"></span>
                </div>
                <h3>@lang("user.about.rate")</h3>
                <div class="barfiller" id="progress2">
                  <div class="tipWrap"><span class="tip"></span></div><span class="fill"
                    data-percentage="{{ setting()->rate }}"></span>
                </div>
                <h3>@lang("user.about.ventures")</h3>
                <div class="barfiller" id="progress3">
                  <div class="tipWrap"><span class="tip"></span></div><span class="fill"
                    data-percentage="{{ setting()->ventures }}"></span>
                </div>
              </div>
            </div>
            <div class="str-about-img-field">
              <div class="str-about-pic"><img src="{{ asset($img2) }}" alt=""></div>
              <div class="str-about-pic"><img src="{{ asset($img3) }}" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--Start of portfolios  section-->
<section class="smm-case-study-section" id="smm-case-study">
  <div class="container">
    <div class="str-section-title text-center str-title-center str-headline"><span class="str-title-tag">
      {{ pages('portfolio')->name }}</span>
      <h3>{!! pages('portfolio')->desc !!}</h3>
    </div>
    <div class="smm-case-study-wrapper">
      <div class="smm-case-tab text-center clearfix ul-li">
        <ul class="nav text-uppercase nav-tabs" id="tabs">
          <li class="nav-item"><a class="nav-link text-capitalize active show " href="#" data-target="#all"
              data-toggle="tab">@lang("user.homepage.all")</a></li>

          @if(count($works) > 0)
              @foreach ( $works as $key => $work )
                <li class="nav-item"><a class="nav-link text-capitalize" href="#" data-target="#{{$key+1}}" data-toggle="tab">{{ $work->name }}</a></li>
              @endforeach
          @endif

        </ul>
      </div>
      <!-- /tab_button-->
      <div class="smm-case-tab-content">
        <div class="tab-content" id="tabsContent">
          <div class="tab-pane fade active show" id="all">
            <div class="smm-case-content">
              <div class="row">
                @if(count($portfolios_all) > 0)
                    @foreach ( $portfolios_all as $portfolio)
                    <div class="col-md-4 mb-2">
                      <div class="smm-case-innerbox position-relative">
                        <div class="smm-case-img"><img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}">
                        </div>
                        <div class="smm-case-text smm-headline pera-content">
                          <h3><a href="#">{{ $portfolio->name }}</a></h3>
                          <p>{!! $portfolio->desc !!}</p>
                        </div>
                        <div class="smm-case-popup">
                          <a class="smm-video-box" data-fancybox="gallery" href="{{ asset($portfolio->image) }}" aria-label="{{ $portfolio->name . ' Image' }}">
                           <i class="fas fa-plus"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                @endif
              </div>
            </div>
          </div>

          {{-- sections --}}
          @if(count($works) > 0)
              @foreach ( $works as $key => $work )
                  <div class="tab-pane fade " id="{{ $key+1 }}">
                    <div class="smm-case-content">
                      <div class="row">
                        @if(count($portfolios) > 0)
                        @foreach ( $portfolios as $portfolio)
                        @if ( $portfolio->work_id == $key+1 )
                        <div class="col-md-4">
                          <div class="smm-case-innerbox position-relative ">
                            <div class="smm-case-img"><img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}">
                            </div>
                            <div class="smm-case-text smm-headline pera-content">
                              <h3><a href="#">{{ $portfolio->name }}</a></h3>
                              <div>{!! $portfolio->desc !!}</div>
                            </div>
                            <div class="smm-case-popup"><a class="smm-video-box" data-fancybox="gallery"
                                href="{{ asset($portfolio->image) }}"><i class="fas fa-plus"></i></a></div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                      </div>
                    </div>
                  </div>
              @endforeach
          @endif

        </div>
      </div>
    </div>
  </div>
</section>
<!--End of str-portfolios section-->


<!--Start of pricing  plan section-->
@if(count($plans) >0)
<section class="s2-pricing_section" id="s2-pricing">
  <div class="container-fluid">
    <div class="saas_two_section_title saas2-headline text-center"><span class="title_tag">{{ pages('plan')->name }}</span>
      <h3>{!! pages('plan')->desc !!}</h3>
    </div>
    <!-- /section title-->

    <div class="s2-pricing_content">
      <div class="row justify-content-md-center">
        @foreach($plans as $plan)
            <div class="col-lg-3 col-md-6 wow fadeFromLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms"
              style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeFromLeft;">
              <div class="s2-pricing_item">
                <div class="s2-pricing_price relative-position clearfix">
                  {{-- <div class="pricing_icon  float-left text-center">
                   <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="m509.472656 259.800781c1.632813-2.449219 2.527344-5.417969 2.527344-8.363281v-236.367188c.003906-8.199218-6.859375-15.070312-15.035156-15.070312h-235.902344c-6.914062 0-13.113281 4.949219-14.65625 11.703125l-69.167969 302.890625c-7.230469 6.433594-13.390625 8.175781-21.199219 10.378906-11.878906 3.347656-26.660156 7.515625-43.347656 27.667969-16.375 19.78125-18.917968 36.898437-21.160156 52.007813-1.980469 13.351562-3.546875 23.898437-14.558594 37.199218-10.640625 12.847656-18.375 14.925782-29.078125 17.800782-12.332031 3.316406-27.683593 7.4375-44.429687 27.667968-5.300782 6.402344-4.417969 15.902344 1.96875 21.214844 2.808594 2.332031 6.210937 3.46875 9.59375 3.46875 4.320312 0 8.605468-1.855469 11.578125-5.445312 10.640625-12.847657 18.371093-14.925782 29.074219-17.800782 12.335937-3.3125 27.6875-7.4375 44.433593-27.667968 16.375-19.777344 18.917969-36.898438 21.160157-52.003907 1.984374-13.355469 3.550781-23.902343 14.5625-37.203125 10.703124-12.929687 18.101562-15.015625 28.347656-17.902344 9.886718-2.789062 21.789062-6.15625 35.121094-18.824218l301.011718-69.023438c3.710938-.851562 7.046875-3.15625 9.15625-6.328125zm-239.816406-214.820312 88.097656 88.273437-140.382812 140.664063zm27.703125-14.847657h163.308594l-81.65625 81.816407zm81.65625 124.425782 88.097656 88.277344-228.476562 52.386718zm21.261719-21.304688 81.652344-81.816406v163.636719zm0 0">
                      </path>
                    </svg> 
                  </div> --}}
                  <div class="s2-pricing_text"><span>{{ $plan->name }}</span><strong dir="ltr">{{ $plan->price }} L.E</strong></div>
                  <div class="s2-icon_bg">
                    <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="m509.472656 259.800781c1.632813-2.449219 2.527344-5.417969 2.527344-8.363281v-236.367188c.003906-8.199218-6.859375-15.070312-15.035156-15.070312h-235.902344c-6.914062 0-13.113281 4.949219-14.65625 11.703125l-69.167969 302.890625c-7.230469 6.433594-13.390625 8.175781-21.199219 10.378906-11.878906 3.347656-26.660156 7.515625-43.347656 27.667969-16.375 19.78125-18.917968 36.898437-21.160156 52.007813-1.980469 13.351562-3.546875 23.898437-14.558594 37.199218-10.640625 12.847656-18.375 14.925782-29.078125 17.800782-12.332031 3.316406-27.683593 7.4375-44.429687 27.667968-5.300782 6.402344-4.417969 15.902344 1.96875 21.214844 2.808594 2.332031 6.210937 3.46875 9.59375 3.46875 4.320312 0 8.605468-1.855469 11.578125-5.445312 10.640625-12.847657 18.371093-14.925782 29.074219-17.800782 12.335937-3.3125 27.6875-7.4375 44.433593-27.667968 16.375-19.777344 18.917969-36.898438 21.160157-52.003907 1.984374-13.355469 3.550781-23.902343 14.5625-37.203125 10.703124-12.929687 18.101562-15.015625 28.347656-17.902344 9.886718-2.789062 21.789062-6.15625 35.121094-18.824218l301.011718-69.023438c3.710938-.851562 7.046875-3.15625 9.15625-6.328125zm-239.816406-214.820312 88.097656 88.273437-140.382812 140.664063zm27.703125-14.847657h163.308594l-81.65625 81.816407zm81.65625 124.425782 88.097656 88.277344-228.476562 52.386718zm21.261719-21.304688 81.652344-81.816406v163.636719zm0 0">
                      </path>
                    </svg>
                  </div>
                </div>
                <div class="plans_checked s2-pricing_list ul-li-block">
                   {!! $plan->checkeddec !!} 
                </div>
                <div class="plans_unchecked s2-pricing_list ul-li-block">
                   {!! $plan->uncheckeddec !!}      
                </div>
                <div class="s2-pricing_btn"><a href="{{ getRoute("getContactUs") }}"><i class="fas fa-cloud-download-alt"></i>@lang('user.helper.try_now')</a></div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif
<!--End of pricing section-->

<!--Start of testimonial section-->
<section class="crm-testimonial-section position-relative" id="crm-testimonial"><span
    class="crm-testimonial-bg position-absolute text-center"><img src="{{ asset('assets/user/img/crm/shape/crm-map.png') }}" alt=""></span>
  <div class="container">
    <div class="crm-testimonial-wrapper">
      <div class="crm-testimonial-area owl-carousel" id="crm-testimonial-id">
        @if(count($testmonials)>0)
            @foreach ( $testmonials as $testmonial)
            <div class="crm-testimonial-content text-center">
              <div class="crm-testimonial-img"><img src="{{ asset($testmonial->image) }}" alt="{{ $testmonial->name }}">
              </div>
              <div class="crm-testimonial-text pera-content crm-headline">
                <div>
                  {!! $testmonial->desc !!}
                </div>
                <div class="crm-testi-author">
                  <h3>{{ $testmonial->name }}</h3><span>{{ $testmonial->job }}</span>
                </div>
              </div>
            </div>
            @endforeach
        @endif
      </div>
    </div>
  </div>
</section>
<!--End of testimonial section-->

<!--Start of parteners section-->
<section class="str-partner-section" id="str-partner">
  <div class="container">
    <div class="str-partner-area owl-carousel" id="str-partner-slide">
      @foreach($sliders as $slider)
        <div class="str-partner-img"><img src="{{ asset($slider->image) }}" alt="partener"></div>
      @endforeach
    </div>
  </div>
</section>
<!--End of str-partner section-->

<!--Start of blog  section-->
<section class="str-blog-section" id="str-blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="str-section-title text-left str-title-left pera-content str-headline"><span
            class="str-title-tag">@lang('user.navbar.blogs')</span>
          <h2>{{ pages('blog')->name }}</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="str-team-title-text">
          {!! pages('blog')->desc !!}
        </div>
      </div>
    </div>
    <div class="str-blog-area owl-carousel" id="str-blog-slide">
      @if(count($blogs)>0)
          @foreach ($blogs as $blog)
          <div class="str-blog-img-text position-relative">
            <div class="str-blog-thumb"><img src="{{ asset( $blog->image) }}" alt="{{ $blog->name }}"></div>
            <div class="str-blog-meta text-center text-uppercase">{{$blog->created_at->format('d') }}
              {{$blog->created_at->format('M') }}</div>
            <div class="str-blog-text str-headline">
              <h3><a href="{{ getRoute("single_blog" , $blog->id) }}">
                  {{ $blog->name }}
                </a></h3>
              <div class="str-read-more"><a href="{{ getRoute("single_blog" , $blog->id) }}">@lang("user.read_more")</a>
              </div>
            </div>
          </div>
          @endforeach
      @endif
    </div>
  </div>
</section>

{{-- @include('user.includes.location') --}}
@include('user.includes.get_in_touch')
@endsection

@section('js')
    <script>
    $('.plans_checked ul li').prepend('<div class="s2-pricing_list_icon  s2-checked  float-left text-center"></div>');
    $('.plans_unchecked ul li').prepend('<div class="s2-pricing_list_icon  s2-unchecked  float-left text-center"></div>');
    </script>
@endsection