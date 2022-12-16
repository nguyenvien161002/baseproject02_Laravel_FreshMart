@if ($paginator -> hasPages())
<div class="">Hiển thị 1 đến {{$paginator -> perPage()}} của {{$paginator -> total()}} mục</div>
<div class="paging_simple_numbers">

    @if ($paginator -> onFirstPage())
    <a href="#" class="paginate_button previous btn">Trước</a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="paginate_button previous btn">Trước</a>
    @endif

    <span class="number_paging">
        @foreach ($elements as $element)
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <a href="" class="paginate_button active">{{ $page }}</a>
                @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->lastPage())
                <a href="{{ $url }}" class="paginate_button">{{ $page }}</a>
                @elseif ($page == $paginator->lastPage() - 1)
                <i class="fa fa-ellipsis-h mt-2"></i>
                @endif
            @endforeach
        @endforeach
    </span>

    @if ($paginator -> hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="paginate_button next btn">Sau</a>
    @else
    <a href="#" class="paginate_button next btn">Sau</a>
    @endif
</div>
@endif