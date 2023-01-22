@extends('layouts.master')
@section('title') @lang('user.header.blogs') @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.blogs') , 'link_name' => 'blogs' ])

@if($blog != null)

<section class="news-feed-section" id="news-feed">
    <div class="container">
        <div class="blog-feed-content">
            <div class="row">
                <div class="col-md-8">
                    <div class="saasio-blog-details-content">
                        <div class="blog-details-img"><img src="{{ asset($blog->image) }}" style="width: 100%;height: 400px;object-fit: cover;object-position: top;" alt="{{ $blog->name }}">
                        </div>
                        <div class="blog-details-text dia-headline">
                            <h2>{{ $blog->name }}</h2>
                            <div class="saasio-post-meta">
                                <a href="#">  <i class="fas fa-calendar-alt"></i>
                                    {{ $blog->created_at->format('M') }} {{ $blog->created_at->format('d') }}, {{ $blog->created_at->format('Y') }}</a>
                            </div>

                            <div class="mb-5 mt-2 text-justify">
                                {!! $blog->desc !!}
                            </div>
                        </div>
                        <div class="blog-details-tag clearfix">
                            <div class="blog-feed-tag float-left">
                                <span>@lang('user.helper.tags') </span>
                                <a href="#"> {{ \App\Models\Work::findorfail($blog->work_id)->name }}</a>
                            </div>
                            <div class="blog-feed-share float-right"><span>@lang('user.helper.share')</span>
                                @if (count(icons()) >0 )
                                    @foreach (icons() as $icon )
                                    <a href="{{ $icon->link }}" title="{{ $icon->name }}" target="_blank"><i class="{{ $icon->tag }}"></i></a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- <div class="saasio-comment-field dia-headline">
                            <h3>Comments (03)</h3>
                            <div class="comment-list-item">
                                <div class="comment-inner-box">
                                    <div class="comment-author-img float-left"><img src="assets/img/blog/ca1.jpg"
                                            alt=""></div>
                                    <div class="comment-author-text">
                                        <h4><a href="#">Rolax Fellan</a></h4><span>November 25, 2020 at 09:00 am</span>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout. The point of using.
                                        </p><a class="comment-reply" href="#">Reply</a>
                                    </div>
                                </div>
                                <div class="comment-inner-box">
                                    <div class="comment-author-img float-left"><img src="assets/img/blog/ca2.jpg"
                                            alt=""></div>
                                    <div class="comment-author-text">
                                        <h4><a href="#">Daile Cane</a></h4><span>November 25, 2020 at 09:00 am</span>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout. The point of using.
                                        </p><a class="comment-reply" href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <h3>Post a comment</h3>
                            <div class="comment-form">
                                <form action="#">
                                    <input type="text" name="name" placeholder="Enter Your Full Name">
                                    <input type="email" name="email" placeholder="Enter Your  Email Address">
                                    <input type="tetx" name="website" placeholder="Enter Your Website">
                                    <textarea name="message" placeholder="Your Comment here..."></textarea>
                                    <button type="submit">Comment</button>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @include('user.includes.side_blog')
            </div>
        </div>
    </div>
</section>
@endif







@endsection
