<ul class="pagination">
    @if ($paginator -> onFirstPage())
    <li class="page-item">
        <a href="">
            <i class="fa-solid fa-backward"></i>
        </a>
    </li>
    @else
    <li class="page-item">
        <a href="{{ $paginator->previousPageUrl() }}">
            <i class="fa-solid fa-backward"></i>
        </a>
    </li>
    @endif

    @foreach ($elements as $element)
        @foreach ($element as $page => $url)
            @php
                $urlde = urldecode($url);
                $url_components = explode("url=", $urlde);
            @endphp
            @if ($page == $paginator->currentPage())
                <li class="page-item active"><a href="">{{ $page }}</a></li>
            @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->lastPage())
                <li class="page-item"><a href="{{ isset($url_components[1]) ? $url_components[1] : $url }}">{{ $page }}</a></li>
            @elseif ($page == $paginator->lastPage() - 1)
                <i class="fa fa-ellipsis-h mt-2"></i>
            @endif
        @endforeach
    @endforeach

    @if ($paginator -> hasMorePages())
    <li class="page-item">
        @php
            $nextPageUrl = urldecode($paginator->nextPageUrl());
            $url_ComNextPage = explode("url=", $nextPageUrl);
        @endphp
        <a href="{{ isset($url_ComNextPage[1]) ? $url_ComNextPage[1] : $paginator->nextPageUrl() }}">
            <i class="fa-solid fa-forward"></i>
        </a>
    </li>
    @else
    <li class="page-item">
        <a href="">
            <i class="fa-solid fa-forward"></i>
        </a>
    </li>
    @endif
</ul>

