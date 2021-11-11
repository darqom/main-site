@if ($paginator->hasPages())
<div class="d-flex justify-content-end">
    <nav>
        <ul class="pagination">
            <li class="page-item">
                @if(!$paginator->onFirstPage())
                <button class="page-link" wire:click="previousPage" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </button>
                @endif
            </li>

            @foreach ($elements as $element)
                @if(is_string($element))
                    <li class="page-item">
                        <a class="page-link" href="#">{{ $element }}</a>
                    </li>            
                @endif

                @if(is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="#">{{ $page }}</a>
                        </li>
                        @else
                        <li class="page-item">
                            <button class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                        </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li class="page-item">
                @if ($paginator->hasMorePages())
                <button class="page-link" wire:click="nextPage" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </button>
                @endif
            </li>
                
        </ul>
    </nav>
</div>
@endif
