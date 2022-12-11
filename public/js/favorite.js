// FAVORITE
let cartFavorite = JSON.parse(localStorage.getItem('FAVORITE')) || [];
const btnsFavorite = $$('.btn_favorite');
const notiFavo = $('.favorite-notification');
notiFavo.innerText = cartFavorite.length; 
$j.ajax({
    type: "GET",
    url: 'http://127.0.0.1:8000/api/all_product',
    success: function (response) {
        const products = response;
        const insideCoFavo = $('.favorite-about.sectiontwo-about');
        const iconFavo = $$('.btn_favorite .img-pro-action');
        updateFavorite();
        btnsFavorite.forEach((btn, indexBtn) => {
            const product = getParent(btn, ".sectiontwo-item");
            const idProduct = parseInt(product.getAttribute('data-id'));
            cartFavorite.forEach((item) => {
                if(idProduct == item.id) {
                    const productImg = product.querySelector('.btn_favorite .img-pro-action');
                    productImg.src = "http://127.0.0.1:8000/images/svg/thickheart.svg";
                }
            });
            btn.addEventListener('click', function(){
                addToFavorite(idProduct, indexBtn);
            }); 
        });

        function addToFavorite(id, idbtnheart) {
            if(cartFavorite.some(function(item){return item.id === id})) {
                cartFavorite.forEach(function(item, index) {
                    if(item.id === id){
                        cartFavorite.splice(index, 1);
                        iconFavo[idbtnheart].src = "http://127.0.0.1:8000/images/svg/heart.svg";
                        showRemoveProFavoToast(item.name);
                    }
                })
            } else {
                const item = products.find(function(product) {
                    return product.id === id;
                });
                iconFavo[idbtnheart].src = "http://127.0.0.1:8000/images/svg/thickheart.svg";
                cartFavorite.push({
                    ...item,
                });
                showAddProFavoToast(item.name);
            }
            updateFavorite();
        }

        function updateFavorite() {
            renderCartFavorite();
            localStorage.setItem('FAVORITE', JSON.stringify(cartFavorite));
            notiFavo.innerText = cartFavorite.length; 
        }

        function renderCartFavorite(){
            if(insideCoFavo && cartFavorite.length > 0) {
                insideCoFavo.innerHTML = "";
                cartFavorite.forEach(function(item, index){
                    var boxPrice = "";
                    var boxRprice = "";
                    if (item.discount != 0) {
                        var rprice = (item.price / 1000) * (1 - parseInt(item.discount) / 100);
                        rprice = Math.floor(rprice);
                        boxPrice = `
                            <div class="product--price">
                                <p class="item-sp--cost fs-16">${rprice}.000<a>đ</a></p>
                                <p class="item-sp--price ">${item.price/1000}.000<a>đ</a></p>
                            </div>`
                        boxRprice = `<div class="item-rprice">- ${parseInt(item.discount)}%</div>`;
                    } else {
                        boxPrice = `
                            <div class="product--price">
                                <p class="item-sp--cost fs-16">${item.price / 1000}.000<a>đ</a></p>
                            </div>`
                    }
                    insideCoFavo.innerHTML += `
                    <div class="sectiontwo-item" data-id="${item.id}">
                        <div class="item-sp item-imgpro">
                            ${boxRprice}
                            <a href="http://localhost/baseproject02/index/product/1">
                                <img class="img-product" src="http://127.0.0.1:8000/images/${item.image_main}" alt="Ổi lê ruột đỏ">
                            </a>
                            <div class="product-action">
                                <div class="btn_action remove btn_favorite">
                                    <img class="img-pro-action" src="http://127.0.0.1:8000/images/svg/closelight.svg" alt="">
                                </div>
                                <div class="btn_action btn_addtocart">
                                    <img class="img-pro-action" src="http://127.0.0.1:8000/images/svg/shopping-carts.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item-sp item-nameandprice">
                            <a href="http://localhost/baseproject02/index/product/${item.id}" class="item-sp--name">${item.name}</a>
                            <div class="item-sp-price">
                                ${boxPrice}
                            </div>
                        </div>
                    </div>
                    `
                });
                var btnsRemove = $$('.btn_action.remove');
                btnsRemove.forEach((btn, index) => {
                    btn.addEventListener('click', function(){
                        var productRemove = cartFavorite.splice(index, 1);
                        if(cartFavorite.length == 0) { 
                            insideCoFavo.innerHTML = `
                                <div class="content-item text-center content-description">
                                    <p>Bạn chưa có sản phẩm yêu thích, <a href="<?= BASE_URL ?>index/products" class="text-decoration-none">vào đây</a> để thêm thật nhiều sản phẩm yêu thích nào.</p>
                                </div>
                            `;
                        }
                        showRemoveProFavoToast(productRemove[0].name);
                        updateFavorite();
                    })
                })
            }
        };
    }
});

function showAddProFavoToast(nameProduct) {
    toast({
        title: "Tuyệt vời!",
        message: `Bạn vừa thêm <strong class="text-body">${nameProduct}</strong> vào mục yêu thích thành công bấm <a href="http://127.0.0.1:8000/favorite">vào đây</a> để tới trang yêu thích.`,
        type: "success",
        duration: 5000
    }, toastMain);
}

function showRemoveProFavoToast(nameProduct) {
    toast({
        title: "Thông báo!",
        message: `Bạn vừa bỏ <strong class="text-body">${nameProduct}</strong> ra khỏi mục yêu thích.`,
        type: "warning",
        duration: 5000
    }, toastMain);
}