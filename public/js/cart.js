q
const btnsAdd = $$('.btn_addtocart');
const insideCart = $('.cart__content');
const noCartItem = $('.cart-noproduct');
const payment = $('.payment');
const notiCart = $('.cart-notification');
const totalMoney = $('.totalmoney');
const btnAdd = $('.detailsproBtnAdd');
const btnMinus = $('.minus.js--minus');
const btnPlus = $('.plus.js--plus');

var quantity = $('.enterquantity')
var quantityInteger = 0;
if (quantity) {
    quantityInteger = parseInt(quantity.value);
    btnMinus.addEventListener('click', () => { 
        if (quantityInteger == 1) {
            return;
        } else {
            quantityInteger--;
            quantity.value = quantityInteger;
        }
    });
    
    btnPlus.addEventListener('click', () => { 
        if (quantityInteger == 10) {
            showWarningQuantity();
            return;
        } else {
            quantityInteger++;
            quantity.value = quantityInteger;
        }
    });
}

function getParent(element, selector) {
    while (element.parentElement) {
        if(element.parentElement.matches(selector)) {
            return element.parentElement;
        }
        element = element.parentElement;
    }
}

let cart = JSON.parse(localStorage.getItem('CART')) || [];
notiCart.innerText = cart.length; 
$j.ajax({
    type: "GET",
    url: 'http://127.0.0.1:8000/api/all_product',
    success: function (response) {

        var products = response;
        updateCart();

        if (btnAdd != null) { 
            btnAdd.addEventListener('click', function(){
                var idProduct = parseInt(btnAdd.getAttribute('data-id'));
                addToCart(idProduct);
            }); 
        }

        btnsAdd.forEach((btn) => {
            btn.addEventListener('click', function(){
                var product = getParent(btn, ".sectiontwo-item");
                var idProduct = parseInt(product.getAttribute('data-id'));
                addToCart(idProduct);
            }); 
        });
        // AFTER SORT, FILTE
        $j(document).on('click', '.btn_addtocart', (event) => {
            var product = getParent(event.target, ".sectiontwo-item");
            var idProduct = parseInt(product.getAttribute('data-id'));
            var checkAfterSF = JSON.parse(localStorage.getItem("FILTER_MERGE_SORT"));
            if(checkAfterSF) {
                if(checkAfterSF.length !== 0) { 
                    addToCart(idProduct);
                }
            }
        })
        // LOGIC ADD PRODUCT TO CART
        function addToCart(id) {
            if(cart.some(function(item){return item.id === id})) {
                cart.forEach(function(item) {
                    if(item.id === id){
                        if(quantityInteger > 1 ) {
                            item.quantity += quantityInteger;
                            showAddProToCartToast(item.name, quantityInteger);
                        } else {
                            showAddProToCartToast(item.name, 1);
                            return item.quantity++;
                        }
                    }
                })
            } else {
                const item = products.find(function(product) {
                    return product.id === id;
                });
                if(quantityInteger > 1 ) {
                    item.quantity = quantityInteger;
                }
                cart.push({
                    ...item,
                    quantity: 1, 
                });
                showAddProToCartToast(item.name, 1);
            }
            updateCart();
        }
        
        var price;
        function updateCart() {
            renderCartItem();
            localStorage.setItem('CART', JSON.stringify(cart));
            notiCart.innerText = cart.length; 
            if(cart.length == 0) {
                noCartItem.classList.remove('hidden');
                insideCart.classList.add('hidden');
                payment.classList.remove('active');
            }
            totalMoneyToCart();
            changeNumberOfUnits();
        }

        function totalMoneyToCart() {
            var sum = 0;
            cart.forEach(function(item){
                if (item.discount != 0) {
                    price = (item.price / 1000) * (1 - item.discount / 100);
                    price = Math.floor(price);
                } else {
                    price = item.price / 1000;
                }
                sum = sum + price * item.quantity;
                totalMoney.innerText = sum;
            });
        };
        
        function renderCartItem(){
            insideCart.innerHTML = "";
            noCartItem.classList.add('hidden');
            insideCart.classList.remove('hidden');
            cart.forEach(function(item){
                if (item.discount != 0) {
                    price = (item.price / 1000) * (1 - item.discount / 100);
                    price = Math.floor(price);
                } else {
                    price = item.price / 1000;
                }
                insideCart.innerHTML += `
                    <div class="cart__item">
                        <div class="imgproduct">
                            <img src="http://localhost/baseproject02/assets/images/${item.image_main}" alt="" class="imgproduct--img">
                        </div>
                        <div class="infoproduct">
                            <div class="name_product">
                                <span class="infoproduct--name">${item.name}</span>
                                <span class="infoproduct--separate">-</span>
                                <p class="name_product--weight">1Kg</p>
                            </div>
                            <div class="box_quantity">
                                <label for="">Số lượng: </label>
                                <button class="__button-item btn-decrease" data-id="${item.id}">-</button>
                                <input class="__button-item quantity" value="${parseInt(item.quantity)}">
                                <button class="__button-item btn-increase" data-id="${item.id}">+</button>
                            </div>
                            <div class="box_price">
                                <p class="labelprice">Giá: </p>
                                <span class="price">${price}.000đ</span>
                            </div>
                            <button class="btn-romove">Bỏ sản phẩm</button>
                        </div>
                    </div>
                `
            })
            payment.classList.add('active'); 
            var btnsRemove = $$('.btn-romove');
            btnsRemove.forEach((btn, index) => {
                btn.addEventListener('click', function(){
                    cart.splice(index, 1);
                    updateCart();
                })
            })
        };

        function changeNumberOfUnits(){
            cart.forEach(function(item){
                var btnDecrease = $$('.btn-decrease');
                var btnIncrease = $$('.btn-increase');

                btnDecrease.forEach(function(btn) {
                    if(item.id == btn.getAttribute("data-id")){
                        btn.addEventListener('click',function(){
                            item.quantity--;
                            if(item.quantity < 1){
                                item.quantity = 1;
                            }
                            updateCart();
                        })
                    }
                });

                btnIncrease.forEach(function(btn) {
                    if(item.id == btn.getAttribute("data-id")){
                        btn.addEventListener('click',function(){
                            item.quantity++;
                            updateCart();
                        })
                    }
                });
            })
        }
        
    }
});
