@if ($paginator->hasPages())
    <nav class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="pagination__page pagination__page--current" class="page-link" aria-hidden="true">&lsaquo;</span>
        @else
            <a class="pagination__page" class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="pagination__page pagination__page--current" class="page-link">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pagination__page pagination__page--current" class="page-link">{{ $page }}</span>
                    @else
                        <a class="pagination__page" class="page-link" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination__page" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        @else
            <span class="pagination__page pagination__page--current" class="page-link" aria-hidden="true">&rsaquo;</span>
        @endif
    </nav>
@endif
