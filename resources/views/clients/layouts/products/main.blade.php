<div class="category-product">
    @foreach($products as $key => $product)
    <div class="sectiontwo-item product" data-id="{{ $product['id'] }}">
        @if($product['discount'] != 0)
        <div class="product--lbrprice">- {{ $product['discount'] }}%</div>
        @endif
        <div class="product--group">
            <a href="{{URL::to('product/details/' . $product['id'])}}">
                <img src="{{asset('images/' . $product['image_main'])}}" alt="{{ $product['name'] }}">
            </a>
            <div class="product-action">
                <div class="btn_action btn_favorite">
                    <img class="img-pro-action" src="{{asset('images/svg/heart.svg')}}" alt="">
                </div>
                <div class="btn_action btn_addtocart">
                    <img class="img-pro-action" src="{{asset('images/svg/shopping-carts.svg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="product--group">
            <a class="product--name" href="{{URL::to('product/details/' . $product['id'])}}">{{ $product['name'] }}</a>
            <div class="product--price">
                @if($product['discount'] != 0)
                <p class="item-sp--cost">{{ floor(((int)$product['price'] / 1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                <p class="item-sp--price">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                @else
                <p class="item-sp--cost">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="next-sheet {{count($products) == 0 ? 'd-none' : ''}}">
    {{ $products -> appends(Request::all()) -> links('clients.layouts.pagination') }}
</div>
<div class="justify-content-center {{count($products) == 0 ? 'd-flex' : 'd-none'}} flex-column align-items-center mt-4 w-100">
    <img src="{{asset('images/explore/no-ordered.png')}}" alt="">
    <p class="mt-4 p-4 rounded-2 fw-bold bg-warning w-100 text-center">Không có sản phẩm nào trong danh mục này.</p>
</div>