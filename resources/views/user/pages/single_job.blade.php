@extends('layouts.master')
@section('title')
    @lang('user.header.jobs')
@endsection
@section('content')
    @include('user.includes.header', ['header_name' => __('user.header.jobs'), 'link_name' => 'jobs'])

    <section class="str-feature-section str-feature-section-page str-single-job">
        <div class="container">
            <div class="str-section-title text-center str-title-center str-headline">
                <h2>{{ $job->name }}</h2>
            </div>
            <div class="str-feature-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="str-feature-box wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="str-feature-icon-text text-center">
                                <div class="str-feature-text str-headline">
                                    <div class="str-feature-list ul-li-block">
                                        {!! $job->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                        <a href="{{ route('applying_form',['job_id'=>$job->id,'locale'=>app()->getLocale()]) }}">
                            <button class="btn btn-success ">@lang('general.go_to_application')</button>

                        </a>
                    </div>
                </div>
            </div>

    </section>
@endsection
