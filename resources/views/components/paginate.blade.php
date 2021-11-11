@if ($paginator->hasPages())
<div class="d-flex justify-content-end">
    <nav>
        <ul class="pagination">
            <li class="page-item">
                @if($paginator->onFirstPage())
                <a class="page-link disabled" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                @else
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
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
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li class="page-item">
                @if ($paginator->hasMorePages())
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                @else
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                @endif
            </li>
                
        </ul>
    </nav>
</div>
@endif
