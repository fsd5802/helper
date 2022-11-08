@extends('layouts.master')
@section('title') @lang('user.header.services')  @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.services')  , 'link_name' => 'services'  ])

        <section class="str-feature-section str-feature-section-page str-single-service">
            <div class="container">
            <div class="str-section-title text-center str-title-center str-headline">
                <h2>{{ $service->name }}</h2>
            </div>
            <div class="str-feature-content">
                <div class="row"> 
                <div class="col-lg-12 col-md-12">
                    <div class="str-feature-box wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="str-feature-icon-text text-center">
                        <div class="str-feature-icon"><img src="{{  asset($service->image) }}" alt=""></div>
                        <div class="str-feature-text str-headline">
                        <h3>{{ $service->name }}</h3>
                        <div class="str-feature-list ul-li-block">
                            {!! $service->desc !!}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
@endsection