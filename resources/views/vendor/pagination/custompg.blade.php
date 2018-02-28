@if ($paginator->hasPages())
    <ul class="page-numbers">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span class="page-numbers current">&laquo;</span></li>
        @else
            <li><span class="page-numbers current"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></span></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span class="page-numbers current">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span class="page-numbers current">{{ $page }}</span></li>
                    @else
                        <li><span class="page-numbers current"><a href="{{ $url }}">{{ $page }}</a></span></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><span class="page-numbers current"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></span></li>
        @else
            <li class="disabled"><span class="page-numbers current">&raquo;</span></li>
        @endif
    </ul>
@endif
