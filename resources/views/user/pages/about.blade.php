@extends('layouts.master')
@section('title') @lang('user.navbar.aboutus') @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.navbar.aboutus') , 'link_name' => 'aboutus' ])


    <section class="saas_two_about_section relative-position" id="saas_two_about">
        <div class="container">
          <div class="str-section-title text-center str-title-center str-headline">
           
            <h2>@if(pages('aboutus')->name != null){{ pages('aboutus')->name }} @endif</h2>
            <div>@if(pages('aboutus')->desc != null){!! pages('aboutus')->desc !!} @endif</div>
        </div>
          <div class="about_content_s2">
            <div class="row">
              <div class="col-lg-6 col-md-12 wow fadeFromLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_img"><img @if(pages('vision')->image != null) src="{{ asset(json_decode(pages('vision')->image)[0]) }}" @endif alt=""></div>
              </div>
              <div class="col-lg-6 col-md-12 wow fadeFromRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_text_icon">
                  <div class="s2-about_text saas2-headline pera-content">
                    <h3>@if(pages('vision')->name != null){{ pages('vision')->name }} @endif</h3>
                    <div>@if(pages('vision')->desc != null){!! pages('vision')->desc !!} @endif</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="about_content_s2">
            <div class="row">
              <div class="col-lg-6 col-md-12 wow fadeFromLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_text_icon">
                  <div class="s2-about_text saas2-headline pera-content">
                    <h3>@if(pages('mission')->name != null){{ pages('mission')->name }} @endif</h3>
                    <div>
                        @if(pages('mission')->desc != null){!! pages('mission')->desc !!} @endif
                    </div> 
                 </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 wow fadeFromRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_img"><img @if(pages('mission')->image != null) src="{{ asset(json_decode(pages('mission')->image)[0]) }}" @endif alt="{{ pages('mission')->name }}"></div>
              </div>
            </div>
          </div>
         
          <div class="about_content_s2">
            <div class="row">
              <div class="col-lg-6 col-md-12 wow fadeFromRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_img"><img @if(pages('quality')->image != null) src="{{ asset(json_decode(pages('quality')->image)[0]) }}" @endif alt="{{ pages('quality')->name }}"></div>
              </div>
              <div class="col-lg-6 col-md-12 wow fadeFromLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_text_icon">
                  <div class="s2-about_text saas2-headline pera-content">
                    <h3>@if(pages('quality')->name != null){{ pages('quality')->name }} @endif</h3>
                    <div>
                        @if(pages('quality')->desc != null){!! pages('quality')->desc !!} @endif
                    </div> 
                 </div>
                </div>
              </div>
            </div>
          </div>
     
          <div class="about_content_s2">
            <div class="row">
              <div class="col-lg-6 col-md-12 wow fadeFromLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_text_icon">
                  <div class="s2-about_text saas2-headline pera-content">
                    <h3>@if(pages('partner')->name != null){{ pages('partner')->name }} @endif</h3>
                    <div>
                        @if(pages('partner')->desc != null){!! pages('partner')->desc !!} @endif
                    </div> 
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 wow fadeFromRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_img"><img  @if(pages('partner')->image != null) src="{{ asset(json_decode(pages('partner')->image)[0]) }}" @endif alt="{{ pages('partner')->name }}"></div>
              </div>
            </div>
          </div>
        
          <div class="about_content_s2">
            <div class="row">
              <div class="col-lg-6 col-md-12 wow fadeFromRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_img"><img @if(pages('team')->image != null) src="{{ asset(json_decode(pages('team')->image)[0]) }}" @endif alt="{{ pages('team')->name }}"></div>
              </div>
              <div class="col-lg-6 col-md-12 wow fadeFromLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="s2-about_text_icon">
                  <div class="s2-about_text saas2-headline pera-content">
                    <h3>@if(pages('team')->name != null){{ pages('team')->name }} @endif</h3>
                    <div>
                        @if(pages('team')->desc != null){!! pages('team')->desc !!} @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        </div>
    </section>

@endsection