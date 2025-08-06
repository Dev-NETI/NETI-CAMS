@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <button wire:click="previousPage" wire:loading.attr="disabled" class="page-link">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button wire:click="gotoPage({{ $page }})"
                                    class="page-link">{{ $page }}</button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button wire:click="nextPage" wire:loading.attr="disabled" class="page-link">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>

        {{-- Results Info --}}
        <div class="text-center text-muted small mt-2">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
        </div>
    </nav>
@endif
