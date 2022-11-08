
@if ($paginator->hasPages())
<ul class="pagination pagination-lg justify-content-center">
   
    @if ($paginator->onFirstPage())
        <li class=" page-item disabled"><span class="page-link">@lang("admin.pagination.prev")</span></li>
    @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">@lang("admin.pagination.prev")</a></li>
    @endif


  
    @foreach ($elements as $element)
       
        @if (is_string($element))
            <li class="disabled page-item" ><span class="page-link">{{ $element }}</span></li>
        @endif


       
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active my-active page-item"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">@lang("admin.pagination.next")</a></li>
    @else
        <li class="disabled page-item"><span class="page-link">@lang("admin.pagination.next")</span></li>
    @endif
</ul>
@endif 