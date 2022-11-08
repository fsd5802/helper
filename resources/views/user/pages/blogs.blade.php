@extends('layouts.master')
@section('title') @lang('user.header.blogs') @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.blogs') , 'link_name' => 'blogs' ])

    <section class="news-feed-section" id="news-feed">
        <div class="container">
          <div class="blog-feed-content">
            <div class="row">
              <div class="col-md-8">
                @if (count($blogs)>0)
                 @foreach ( $blogs as $blog )
                    <div class="blog-feed-post">
                        <div class="blog-feed-img-txt">
                            <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="saasio-blog-img"><img src="{{ asset($blog->image) }}" alt="{{ $blog->name }}"></div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="saasio-blog-text">
                                <h3><a href="{{ getRoute('single_blog',$blog->id) }}">{{ $blog->name }}</a></h3>
                                <div class="saasio-post-meta"><a href="#"><i class="fas fa-calendar-alt"></i>September 12, 2020</a></div>
                                <div>
                                    {!! substr($blog->desc,0,50) !!}
                                </div>
                                <a class="blog-read-more" href="{{ getRoute('single_blog',$blog->id) }}">@lang('user.read_more')</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                 @endforeach    
                @endif
                {{-- for pagination --}}
                {{ $blogs->links('vendor.pagination.custom_user') }}
              </div>
              @include('user.includes.side_blog')
            </div>
          </div>
        </div>
    </section>

@endsection