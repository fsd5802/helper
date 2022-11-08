@extends('layouts.master')
@section('title') @lang('user.header.works')  @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.works') , 'link_name' => 'works' ])

<!--Start of case study section-->
<section class="smm-case-study-section" id="smm-case-study">
  <div class="container">
    <div class="str-section-title text-center str-title-center str-headline">
      <h2>@if(pages('portfolio')->name != null) {{ pages('portfolio')->name }} @endif</h2>
      <div>
        @if(pages('portfolio')->desc != null) {!!pages('portfolio')->desc !!} @endif
      </div>
    </div>
    <div class="smm-case-study-wrapper">
      <div class="smm-case-tab text-center clearfix ul-li">
        <ul class="nav text-uppercase nav-tabs" id="tabs">
          <li class="nav-item"><a class="nav-link text-capitalize active show" href="#" data-target="#all"
              data-toggle="tab">@lang("user.homepage.all")</a></li>
          @if(count($works) > 0)
          @foreach ( $works as $key => $work )
          <li class="nav-item"><a class="nav-link text-capitalize" href="#" data-target="#{{$key+1}}"
              data-toggle="tab">{{ $work->name }}</a></li>
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
                @if(count($portfolios) > 0)
                @foreach ( $portfolios as $portfolio)
                <div class="col-md-4 mb-2">
                  <div class="smm-case-innerbox position-relative">
                    <div class="smm-case-img"><img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}">
                    </div>
                    <div class="smm-case-text smm-headline pera-content">
                      <h3><a href="#">{{ $portfolio->name }}</a></h3>
                      <p>{!! $portfolio->desc !!}</p>
                    </div>
                    <div class="smm-case-popup"><a class="smm-video-box" data-fancybox="gallery"
                        href="{{ asset($portfolio->image) }}"><i class="fas fa-plus"></i></a></div>
                  </div>
                </div>
                @endforeach
                @endif

              </div>
            </div>
             <div class="row mt-5 text-center">
                 <!--pagination-->
                {{ $portfolios->links('user.pagination.default') }}
            </div>
          </div>
          <!-- 1st tab content-->
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
                  <div class="smm-case-innerbox position-relative">
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


@endsection