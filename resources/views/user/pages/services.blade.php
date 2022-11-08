@extends('layouts.master')
@section('title') @lang('user.header.services')  @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

<section class="str-feature-section str-feature-section-page">
    <div class="container">
        <div class="str-section-title text-center str-title-center str-headline"><span class="str-title-tag">
            @if(pages('service')->name != null) {{ pages('service')->name }} @endif
            </span>
            <h2>
                @if(pages('service')->desc != null) {!!pages('service')->desc !!} @endif
            </h2>
        </div>
        <div class="str-feature-content">
            <div class="row">
                @if (count($services) >0)
                    @foreach ( $services as $service )
                        <div class="col-lg-4 col-md-6">
                            <div class="str-feature-box wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <a href="{{ getRoute("single_service", $service->id) }}">
                                    <div class="str-hover-icon text-center"><i class="fas fa-plus"></i></div>
                                    <div class="str-feature-icon-text text-center">
                                        <div class="str-feature-icon"><img src="{{ asset($service->image) }}" alt="{{ $service->name }}">
                                        </div>
                                        <div class="str-feature-text str-headline">
                                            <h3>{{ $service->name }}</h3>
                                            <div class="str-feature-list ul-li-block">
                                              <p>{!! strip_tags(Str::limit($service->desc, 150 ,'...')) !!}</p> 
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
            {{ $services->links('user.pagination.default') }}
            </div>
        </div>
    </div>
</section>

@endsection