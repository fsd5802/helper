
@if ($paginator->hasPages())
<div class="saasio-pagination text-center ul-li">
<ul>
    @foreach ($elements as $element)
        @if (is_string($element))
            <li><span>{{ $element }}</span></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

</ul>

</div>
@endif 