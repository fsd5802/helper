<div class="col-md-4">
    <div class="saasio-blog-sidebar">
         {{-- search --}}
        <div class="side-bar-widget">
            <div class="search-widget dia-headline">
                <h3 class="widget-title-2">@lang("user.helper.search")</h3>
                <form class="relative-position" action="">
                    <input type="text" name="search" placeholder="@lang('user.helper.search_here')">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        {{-- categories --}}
        <div class="side-bar-widget">
            <div class="category-widget dia-headline ul-li-block">
                <h3 class="widget-title-2">@lang('user.helper.category')</h3>
                <ul>
                    @if(count($works)>0)
                        @foreach ($works as $work )
                        <li><a href="#">{{ $work->name }}  <span> ({{count($work->blogs )}})</span> </a></li>
                        @endforeach
                   @endif
                </ul>
            </div>
        </div>
        {{-- recnet blogs done--}}
        <div class="side-bar-widget">
            <div class="category-widget dia-headline ul-li-block">
                <h3 class="widget-title-2">@lang('user.helper.recent_blogs')</h3>
                <div class="recent-post-area">
                    @if(count($blogs) >0)
                            @foreach ( $blogs as $blog )
                            <div class="recent-post-img-text">
                                <div class="recent-post-img float-left">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->name }}">
                                </div>
                                <div class="recent-post-text dia-headline">
                                    <h3> <a href="{{ getRoute("single_blog",$blog->id) }}">{{ $blog->name }}</a></h3>
                                    <span class="rec-post-meta"><a href="#"> {{ $blog->created_at->format('M') }} {{ $blog->created_at->format('d') }}, {{ $blog->created_at->format('Y') }}</a></span>
                                </div>
                            </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{-- pupolar tags done--}}
        <div class="side-bar-widget">
            <div class="popular-widget dia-headline ul-li">
                <h3 class="widget-title-2">@lang("user.helper.pupolar_tags")</h3>
                <ul>
                    @if(count($works)>0)
                        @foreach ($works as $work )
                          <li><a href="#">{{ $work->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>