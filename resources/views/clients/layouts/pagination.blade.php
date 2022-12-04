<ul class="pagination">
    @if ($paginator -> onFirstPage())
    <li class="page-item">
        <a href="#">
            <i class="fa-solid fa-angles-left"></i>
        </a>
    </li>
    @else
    <li class="page-item">
        <a href="{{ $paginator->previousPageUrl() }}">
            <i class="fa-solid fa-angles-left"></i>
        </a>
    </li>
    @endif

    @foreach ($elements as $element)
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active"><a href="">{{ $page }}</a></li>
            @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->lastPage())
            <li class="page-item"><a href="{{ $url }}">{{ $page }}</a></li>
            @elseif ($page == $paginator->lastPage() - 1)
            <i class="fa fa-ellipsis-h mt-2"></i>
            @endif
        @endforeach
    @endforeach

    @if ($paginator -> hasMorePages())
    <li class="page-item">
        <a href="{{ $paginator->nextPageUrl() }}">
            <i class="fa-solid fa-angles-right"></i>
        </a>
    </li>
    @else
    <li class="page-item">
        <a href="#">
            <i class="fa-solid fa-angles-right"></i>
        </a>
    </li>
    @endif
</ul>