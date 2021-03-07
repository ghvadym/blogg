@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('paginate Navigation') }}" class="paginate">

        {{-- Previous Page Link --}}
        <div class="paginate-link">
            @if ($paginator->onFirstPage())
                <div class="link-arrow arrow-prev">
                    <div aria-disabled="true" aria-label="{{ __('paginate.previous') }}" class="prev-link page-first">
                        <div aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            @else
                <div class="link-arrow arrow-prev">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prev-link" aria-label="{{ __('paginate.previous') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>

        {{-- paginate Elements --}}
        <div class="paginate-pages">
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div aria-disabled="true">
                    <div class="">{{ $element }}</div>111
                </div>
            @endif

            {{-- Array Of Links --}}
            <ul class="paginate-pages-list">
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page" class="current-page paginate-page">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="paginate-page" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        @endforeach
        </div>

        {{-- Next Page Link --}}
        <div class="paginate-link">
            @if ($paginator->hasMorePages())
                <div class="link-arrow arrow-next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="link-next" aria-label="{{ __('paginate.next') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @else
                <div class="link-arrow arrow-next">
                    <div aria-disabled="true" aria-label="{{ __('paginate.next') }}">
                        <div aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </nav>
@endif
