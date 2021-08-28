@if ($paginator->hasPages())
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a href="javascript:void(0)"><span>|«</span></a></li>
            <li class="disabled"><a href="javascript:void(0)"><span>«</span></a></li>
        @else
		  		<li><a href="{{ $paginator->url(1) }}" rel="prev">|«</a></li>
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled elementpage"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="{{ $url }}"><span>{{ $page }}</span></a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
		  		<li><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">»|</a></li>
        @else
            <li class="disabled"><a href="javascript:void(0)"><span>»</span></a></li>
		  		<li class="disabled"><a href="javascript:void(0)">»|</a></li>
        @endif
    </ul>
@endif