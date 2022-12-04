var checkoutCart = $('.checkout__content-cart');
var totalProduct = $('.total-product');
var checkoutMoney = $(".totalMoney .money");
var costCheckout = 0;
var sumCheckout = 0;
var eleSubColuPrice = "";

// Render data from shopping cart to order page
cart.forEach(item => {
    if (item.discount != 0) {
        costCheckout = (item.price / 1000) * (1 - parseInt(item.discount) / 100);
        costCheckout = Math.floor(costCheckout);
        eleSubColuPrice = `
            <div class="product--price">
                <p class="item-sp--cost fs-16">${costCheckout}.000<a>đ</a></p>
                <p class="item-sp--price ">${item.price}<a>đ</a></p>
            </div>`
    } else {
        costCheckout = item.price / 1000;
        eleSubColuPrice = `
            <div class="product--price">
                <p class="item-sp--cost fs-16">${costCheckout}.000<a>đ</a></p>
            </div>`
    }

    if (checkoutCart) {
        checkoutCart.innerHTML += `
            <div class="product-in-checkout" data-id="${item.id}">
                <div class="column-info">
                    <div class="imgproduct">
                        <img src="http://127.0.0.1:8000/images/${item.image_main}" alt="" class="imgproduct--img">
                    </div>
                    <div class="box_nameproduct">
                        <div class="name_product">
                            <span class="infoproduct--name">${item.name}</span>
                            <span class="infoproduct--separate">-</span>
                            <p class="name_product--weight">1kg</p>
                        </div>
                        <button class="btn btn-danger btn-sm btn-removeProductOP">Xóa sản phẩm</button>
                    </div>
                    <div class="desc_product">${item.description}</div>
                </div>
                <div class="column-price">
                    ${eleSubColuPrice}
                </div>
                <div class="column-quantity">
                    <div class="box_quantity">
                        <button class="__button-item btn-decrOderPage">-</button>
                        <input class="__button-item quantityOrderPage input-quantity--modifi text-center" value="${parseInt(item.quantity)}">
                        <button class="__button-item btn-incrOderPage">+</button>
                    </div>
                </div>
                <div class="column-intomoney into_money-OP fw-bold fs-16">${parseInt(costCheckout) * parseInt(item.quantity)}.000đ</div>
            </div>
        `;
        totalProduct.innerText = cart.length;
        sumCheckout += costCheckout * parseInt(item.quantity);
        checkoutMoney.innerText = sumCheckout + ".000đ";
    }
});

// Change quantity or product on order page (Order Page: OP)
var boxQuantity = $$('.box_quantity');
var ele_totalMoney = $(".totalMoney .money");

let inputQuantityOP = 0;
boxQuantity.forEach((box) => {
    const btnPlusOP = box.querySelector('.btn-incrOderPage');
    const btnMinusOP = box.querySelector('.btn-decrOderPage');
    const inputQuantity = box.querySelector('.quantityOrderPage');
    var valueInputQuantity = inputQuantity.value;
    var message = "";
    var data = "";
    var product = getParent(box, ".product-in-checkout");
    var id_product = product.getAttribute("data-id");
    var ele_intoMoney = product.querySelector(".into_money-OP");
    var val_totalMoney = 0;
    btnMinusOP.addEventListener('click', (e) => {
        if (valueInputQuantity == 1) {
            message = "Đừng bấm nữa, số lượng tối thiểu rồi mà :(((";
            showWarningQuantity(message);
            return;
        } else {
            valueInputQuantity--;
            inputQuantity.value = valueInputQuantity;
            data = caculateOrder(id_product, valueInputQuantity);
            updateOrderPage(ele_intoMoney, data.valueIntoMoney);
        };
    })

    btnPlusOP.addEventListener('click', (e) => {
        if (valueInputQuantity == 10) {
            message = "Số lượng đã nhiều, vui lòng chú ý!";
            showWarningQuantity(message);
            return;
        } else {
            valueInputQuantity++;
            inputQuantity.value = valueInputQuantity;
            data = caculateOrder(id_product, valueInputQuantity);
            updateOrderPage(ele_intoMoney, data.valueIntoMoney);
        };
    })
});

var btnsRemove = $$('.btn-removeProductOP');
btnsRemove.forEach((btn, index) => {
    btn.addEventListener('click', function () {
        cart.splice(index, 1);
        updateOrderPage();
        renderProductOrder();
    })
})

function renderProductOrder() {
    checkoutCart.innerHTML = "";
    cart.forEach(item => {
        if (item.discount != 0) {
            costCheckout = (item.price / 1000) * (1 - parseInt(item.discount) / 100);
            costCheckout = Math.floor(costCheckout);
            eleSubColuPrice = `
                <div class="product--price">
                    <p class="item-sp--cost fs-16">${costCheckout}.000<a>đ</a></p>
                    <p class="item-sp--price ">${item.price}<a>đ</a></p>
                </div>`
        } else {
            costCheckout = item.price / 1000;
            eleSubColuPrice = `
                <div class="product--price">
                    <p class="item-sp--cost fs-16">${costCheckout}.000<a>đ</a></p>
                </div>`
        }

        if (checkoutCart) {
            checkoutCart.innerHTML += `
                <div class="product-in-checkout" data-id="${item.id}">
                    <div class="column-info">
                        <div class="imgproduct">
                            <img src="http://127.0.0.1:8000/images/${item.image_main}" alt="" class="imgproduct--img">
                        </div>
                        <div class="box_nameproduct">
                            <div class="name_product">
                                <span class="infoproduct--name">${item.name}</span>
                                <span class="infoproduct--separate">-</span>
                                <p class="name_product--weight">1kg</p>
                            </div>
                            <button class="btn btn-danger btn-sm btn-removeProductOP">Xóa sản phẩm</button>
                        </div>
                        <div class="desc_product">${item.description}</div>
                    </div>
                    <div class="column-price">
                        ${eleSubColuPrice}
                    </div>
                    <div class="column-quantity">
                        <div class="box_quantity">
                            <button class="__button-item btn-decrOderPage">-</button>
                            <input class="__button-item quantityOrderPage input-quantity--modifi text-center" value="${parseInt(item.quantity)}">
                            <button class="__button-item btn-incrOderPage">+</button>
                        </div>
                    </div>
                    <div class="column-intomoney into_money-OP fw-bold fs-16">${parseInt(costCheckout) * parseInt(item.quantity)}.000đ</div>
                </div>
            `;
            var btnsRemove = $$('.btn-removeProductOP');
            btnsRemove.forEach((btn, index) => {
                btn.addEventListener('click', function () {
                    cart.splice(index, 1);
                    updateOrderPage();
                    renderProductOrder();
                })
            })
            totalProduct.innerText = cart.length;
            renderTotalMoney();
        }
    });
    var boxQuantity = $$('.box_quantity')
    boxQuantity.forEach((box) => {
        const btnPlusOP = box.querySelector('.btn-incrOderPage');
        const btnMinusOP = box.querySelector('.btn-decrOderPage');
        const inputQuantity = box.querySelector('.quantityOrderPage');
        var valueInputQuantity = inputQuantity.value;
        var message = "";
        var data = "";
        var product = getParent(box, ".product-in-checkout");
        var id_product = product.getAttribute("data-id");
        var ele_intoMoney = product.querySelector(".into_money-OP");
        var val_totalMoney = 0;
        btnMinusOP.addEventListener('click', (e) => {
            if (valueInputQuantity == 1) {
                message = "Đừng bấm nữa, số lượng tối thiểu rồi mà :(((";
                showWarningQuantity(message);
                return;
            } else {
                valueInputQuantity--;
                inputQuantity.value = valueInputQuantity;
                data = caculateOrder(id_product, valueInputQuantity);
                updateOrderPage(ele_intoMoney, data.valueIntoMoney);
            };
        })
    
        btnPlusOP.addEventListener('click', (e) => {
            if (valueInputQuantity == 10) {
                message = "Số lượng đã nhiều, vui lòng chú ý!";
                showWarningQuantity(message);
                return;
            } else {
                valueInputQuantity++;
                inputQuantity.value = valueInputQuantity;
                data = caculateOrder(id_product, valueInputQuantity);
                updateOrderPage(ele_intoMoney, data.valueIntoMoney);
            };
        })
    });
}

function caculateOrder(id_product, valueInputQuantity) {
    var valueIntoMoney = 0;
    cart.forEach((item) => {
        if (item.id == id_product) {
            item.quantity = valueInputQuantity;
            if (item.discount != 0) {
                valueIntoMoney = (item.price / 1000) * (1 - parseInt(item.discount) / 100)
                valueIntoMoney = Math.floor(valueIntoMoney);
                valueIntoMoney = valueInputQuantity * valueIntoMoney;
            } else {
                valueIntoMoney = valueInputQuantity * (item.price / 1000);
            }
        }
    })
    return {
        cart: cart,
        valueIntoMoney: valueIntoMoney
    }
}

function renderTotalMoney() {
    var elements = $$(".into_money-OP");
    var total = 0;
    elements.forEach((ele) => {
        total += parseInt(ele.innerText);
    })
    ele_totalMoney.innerText = total + ".000đ";
    sumCheckout = total;
};

function renderIntoMoney(element, value) {
    element.innerText = "";
    element.innerText = value + ".000đ";
};

function updateOrderPage(element = null, valueIntoM = null) {
    if (element && valueIntoM) {
        renderIntoMoney(element, valueIntoM);
    }
    renderTotalMoney();
    localStorage.setItem('CART', JSON.stringify(cart));
}

// ORDER
var btnCheckout = $j(".btn-order-button");
var inputUser = $$(".form-control");
var infoUser = [];
var messageError = $('.message-error');
var btnsMethods = $$(".payment_methods");
var mainContent = $('#main');

var payment_methods = "";
btnsMethods.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        payment_methods = btn.getAttribute("payment_methods");
        btnsMethods.forEach((btn) => {
            btn.classList.remove("active");
        });
        btnsMethods[index].classList.add("active");
        messageError.innerText = "";
    });
});

btnCheckout.click(function () {
    inputUser.forEach((item, index) => {
        infoUser[index] = item.value;
    })

    if (infoUser[0] == "" || infoUser[1] == "" || infoUser[2] == "") {
        showWarningFillIn();
    } else {
        if (payment_methods) {
            cart.push({
                "username": infoUser[0],
                "number_phone": infoUser[1],
                "address": infoUser[2],
                "payment_method": payment_methods,
                "total_money": sumCheckout,
                "note": infoUser[3],
            });
        } else {
            showSelectPaymentMethod();
            return;
        }

        $j.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
            }
        });

        $j.ajax({
            type: "POST",
            url: 'http://127.0.0.1:8000/order',
            data: JSON.stringify(cart),
            dataType: 'JSON',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=UTF-8',
            },
            success: function (response) {
                window.localStorage.removeItem('CART');
                window.location.assign(`${response}`);
            }
        });
    }
});

// ORDER SUCCESSh
function orderSuccess() {
    var toastOrder = $('.box-toast');
    if (toastOrder) {
        toastOrder.classList.add('active');
        setTimeout(() => {
            toastOrder.classList.remove('active');
        }, 5000);
    }
}

