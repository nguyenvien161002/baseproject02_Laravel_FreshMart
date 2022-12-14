var checkoutCart = $('.checkout__content-cart');
var totalProduct = $('.total-product');
var costProductEle = $(".costProduct .money");
var checkoutTotalMoney = $(".totalMoney .money");
var inpuToProFee = $('input[name="total_product_fee"]');
var inputTranFee = $('input[name="transport_fee"]');
var inputTotalMoney = $('input[name="total_money"]');
var inputGroupHidden = $('.input-group-hidden');
var costProduct = 0;
var sumCostProduct = 0;
var sumTotalMoney = 0;
var eleSubColuPrice = "";

// Render data from shopping cart to order page
cart.forEach((item, index) => {
    if (item.discount != 0) {
        costProduct = (item.price / 1000) * (1 - parseInt(item.discount) / 100);
        costProduct = Math.floor(costProduct);
        eleSubColuPrice = `
            <div class="product--price">
                <p class="item-sp--cost fs-16">${costProduct}.000<a>đ</a></p>
                <p class="item-sp--price ">${item.price / 1000}.000<a>đ</a></p>
            </div>`
    } else {
        costProduct = item.price / 1000;
        eleSubColuPrice = `
            <div class="product--price">
                <p class="item-sp--cost fs-16">${costProduct}.000<a>đ</a></p>
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
                <div class="column-intomoney into_money-OP fw-bold fs-16">${parseInt(costProduct) * parseInt(item.quantity)}.000đ</div>
            </div>
        `;
        totalProduct.innerText = cart.length;
        sumCostProduct += costProduct * parseInt(item.quantity);
        costProductEle.innerText = sumCostProduct + ".000đ";
        sumTotalMoney = sumCostProduct + 20;
        checkoutTotalMoney.innerText = sumTotalMoney + ".000đ";
        inpuToProFee.value = sumCostProduct * 1000;
        inputTranFee.value = 20 * 1000;
        inputTotalMoney.value = sumTotalMoney * 1000;
    }
    if (inputGroupHidden) {
    inputGroupHidden.innerHTML += `
        <div class="product-group">
            <input type="text" class="product-id" name="products[${index}][id]" value="${item.id}" hidden>
            <input type="text" class="product-name" name="products[${index}][name]" value="${item.name}" hidden>
            <input type="text" class="product-price" name="products[${index}][price]" value="${item.price}" hidden>
            <input type="text" class="product-discount" name="products[${index}][discount]" value="${item.discount}" hidden>
            <input type="text" class="product-quantity" name="products[${index}][quantity]" value="${item.quantity}" hidden>
            <input type="text" class="product-id_category" name="products[${index}][id_category]" value="${item.id_category_product}" hidden>
        </div>`
    }
});

// Change quantity or product on order page (Order Page: OP)
var boxQuantity = $$('.box_quantity');
var ele_costProduct = $(".costProduct .money");

let inputQuantityOP = 0;
boxQuantity.forEach((box) => {
    const btnPlusOP = box.querySelector('.btn-incrOderPage');
    const btnMinusOP = box.querySelector('.btn-decrOderPage');
    const inputQuantity = box.querySelector('.quantityOrderPage');
    var valueInputQuantity = inputQuantity.value;
    var message = "";
    var data = "";
    var product = getParent(box, ".product-in-checkout");
    var groupHiddenID = $$('.product-id')
    var groupHiddenQuantity = $$('.product-quantity')
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
            groupHiddenID.forEach((element,index) => {
                if(element.value === id_product) {
                    groupHiddenQuantity[index].value = valueInputQuantity;
                }
            });
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
            groupHiddenID.forEach((element,index) => {
                if(element.value === id_product) {
                    groupHiddenQuantity[index].value = valueInputQuantity;
                }
            });
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
    inputGroupHidden.innerHTML = "";
    cart.forEach((item, index) => {
        if (item.discount != 0) {
            costProduct = (item.price / 1000) * (1 - parseInt(item.discount) / 100);
            costProduct = Math.floor(costProduct);
            eleSubColuPrice = `
                <div class="product--price">
                    <p class="item-sp--cost fs-16">${costProduct}.000<a>đ</a></p>
                    <p class="item-sp--price ">${item.price / 1000}.000<a>đ</a></p>
                </div>`
        } else {
            costProduct = item.price / 1000;
            eleSubColuPrice = `
                <div class="product--price">
                    <p class="item-sp--cost fs-16">${costProduct}.000<a>đ</a></p>
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
                    <div class="column-intomoney into_money-OP fw-bold fs-16">${parseInt(costProduct) * parseInt(item.quantity)}.000đ</div>
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

        if (checkoutCart) {
            inputGroupHidden.innerHTML += `
            <div class="product-group">
                <input type="text" class="product-id" name="products[${index}][id]" value="${item.id}" hidden>
                <input type="text" class="product-name" name="products[${index}][name]" value="${item.name}" hidden>
                <input type="text" class="product-price" name="products[${index}][price]" value="${item.price}" hidden>
                <input type="text" class="product-discount" name="products[${index}][discount]" value="${item.discount}" hidden>
                <input type="text" class="product-quantity" name="products[${index}][quantity]" value="${item.quantity}" hidden>
                <input type="text" class="product-id_category" name="products[${index}][id_category]" value="${item.id_category_product}" hidden>
            </div>`;
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
    ele_costProduct.innerText = total + ".000đ";
    sumCostProduct = total;
    sumTotalMoney = total + 20;
    checkoutTotalMoney.innerText = sumTotalMoney + ".000đ";
    inpuToProFee.value = sumCostProduct * 1000;
    inputTranFee.value = 20 * 1000;
    inputTotalMoney.value = sumTotalMoney * 1000;
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
var inputMethods = $$('input[name="payment_method"]');
var mainContent = $('#main');

var payment_methods = "";

btnsMethods.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        inputMethods[index].click();
        btnsMethods.forEach((btn) => { 
            btn.classList.remove('active');
        });
        btn.classList.add('active');
    });
});

btnCheckout.click(function () {
    window.localStorage.removeItem('CART');
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
