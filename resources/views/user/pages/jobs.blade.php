@extends('layouts.master')
@section('title') @lang('user.header.jobs')  @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.jobs') , 'link_name' => 'jobs' ])

<section class="str-feature-section str-feature-section-page">
    <div class="container">
        <div class="str-section-title text-center str-title-center str-headline"><span class="str-title-tag"></span>
            {{-- @if(pages('job')->name != null) {{ pages('job')->name }} @endif

            <h2>
                @if(pages('job')->desc != null) {!!pages('job')->desc !!} @endif
            </h2> --}}
        </div>
        <div class="str-feature-content">
            <div class="row">
                @if (count($jobs) >0)
                    @foreach ( $jobs as $job )
                        <div class="col-lg-4 col-md-6">
                            <div class="str-feature-box wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <a href="{{ getRoute("single_job", $job->id) }}">
                                    <div class="str-hover-icon text-center"><i class="fas fa-plus"></i></div>
                                    <div class="str-feature-icon-text text-center">
                                        <div class="str-feature-text str-headline">
                                            <h3>{{ $job->name }}</h3>
                                            <div class="str-feature-list ul-li-block">
                                              <p>{{$job->skills}}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="row mt-5 text-center">
             <!--pagination-->
            {{ $jobs->links('user.pagination.default') }}
            </div>
        </div>
    </div>
</section>

@endsection
