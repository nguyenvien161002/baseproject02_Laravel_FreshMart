var search = $('.search_main');
var boxResult = $('.result_search');
function limit(c) {
    return this.filter((x, i) => {
        if (i <= (c - 1)) {
            return true
        }
    })
}
Array.prototype.limit = limit;
$j.ajax({
    type: "GET",
    url: 'http://localhost:8989/api/all_product',
    success: function (response) {
        search.addEventListener('input', () => {
            boxResult.classList.add('active');
            var searchValue = search.value;
            var result = response.filter((product) => {
                var nameProduct = product.name;
                return nameProduct.toUpperCase().includes(searchValue.toUpperCase());
            });
            boxResult.innerHTML = "";
            if (result.length == 0) {
                Notiflix.Block.standard('.result_search', 'Loading...');
                Notiflix.Block.standard('.result_search', 'Loading...', {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                });
            }
            result = result.limit(5);
            result.forEach((product) => {
                var rprice = 0;
                if (product.discount != 0) {
                    rprice = (product.price / 1000) * (1 - parseInt(product.discount) / 100);
                    rprice = Math.floor(rprice);
                    rprice = `
                        <p class="rprice-product price-product">${rprice}.000<span>đ</span></p>
                        <p class="price-product">${(product.price / 1000)}.000<span>đ</span></p>
                    `
                } else {
                    rprice = (product.price / 1000) ;
                    rprice = `
                        <p class="rprice-product price-product">${rprice}.000<span>đ</span></p>
                    `
                }
                boxResult.innerHTML += `
                    <a href="http://localhost:8989/product/details/${product.id}" class="product_searched">
                        <img src="http://localhost:8989/images/${product.image_main}" alt="">
                        <div class="box-name-price">
                            <p class="nameproduct">${product.name}</p>
                            <div>
                                ${rprice}
                            </div>
                        </div>
                    </a>
                `;
                if (searchValue == "") {
                    boxResult.classList.remove('active');
                }
            });
        });
    }
});
