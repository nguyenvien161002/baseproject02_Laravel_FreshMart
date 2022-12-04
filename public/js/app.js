const $j = jQuery.noConflict();
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
// Dropdown Mobile Platform
var btnDropdowns = $$('.icon__dots');
var menuAbouts = $$('.menu-about');
btnDropdowns.forEach((btn, index) => {
    btn.addEventListener('click', function () {
        menuAbouts[index].classList.toggle('active');
    });
});
// Close and open the cart: Đóng và mở giỏ hàng
var modal = $('.js-modal');
var modalCart = $('.js-modal__cartshopping');
var modalSidebar = $('.js-modal__sidebar');
var modalOverlay = $('.modal__overlay');
// Buttons
var btnCartClose = $('.js-cartClose');
var btnCartShopping = $('.js-cart-shopping');
var btnSidebar = $('.js-sidebar');

btnCartClose.addEventListener('click', () => {
    modal.classList.remove('active');
});

btnCartShopping.addEventListener('click', () => {
    if (modalSidebar.classList.contains('active')) {
        modalSidebar.classList.remove('active');
    }
    modal.classList.add('active');
    modalCart.classList.add('active');
});

btnSidebar.addEventListener('click', () => {
    if (modalCart.classList.contains('active')) {
        modalCart.classList.remove('active');
    }
    modal.classList.add('active');
    modalSidebar.classList.add('active');
});

modalOverlay.addEventListener('click', () => {
    modal.classList.remove('active');
});

// Transfer photos of product details: chuyển ảnh của trang chi tiết sản phẩm
var images = $$('.js--imagegallery');
var imgproduct = $('.js--imgproduct img');
var currentIndex = 0;

if (images.length != 0) {
    images[currentIndex].classList.add('active');
    images.forEach(function (item, index) {
        item.addEventListener('click', function () {
            currentIndex = index;
            images.forEach(function (item, index) {
                item.classList.remove('active');
            })
            imgproduct.src = images[currentIndex].src;
            images[currentIndex].classList.add('active');
        })
    });
}
//RETURNPOLICY
var btnInfoItem = $$('.section-info-item');
var infoDescriptions = $('.js--infodes');

btnInfoItem.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        btnInfoItem.forEach(btn => {
            btn.classList.remove('active');
        });
        btn.classList.add('active');
        if (index == 0) {
            location.reload();
        }
        if (index == 1) {
            infoDescriptions.innerHTML = `
                <div class="des-returngoods-maintain">
                    <p><b>ND Fresh </b> là hệ thống cửa hàng thực phẩm sạch uy tín nhất ở Việt Nam, chuyên cung cấp thực phẩm sạch tới từng bếp ăn của gia đình bạn.</p>
                    <p><b>Tầm nhìn:</b> Được nuôi trồng, chế biến theo phương Bio (sinh học), Organic (hữu cơ), Eco (sinh thái); cam kết không bán hàng giả, hàng nhái và hàng kém chất lượng. Sản phẩm được giao đến tay khách hàng luôn đúng cam kết, đúng chất lượng niệm yết, luôn được bảo quản trong môi trường lý tưởng, đảm bảo vệ sinh an toàn thực phẩm.</p>
                    <p><b>Mục tiêu:</b> Sản phẩm được giao đến tay khách hàng luôn đúng cam kết, đúng chất lượng niệm yết, luôn được bảo quản trong môi trường lý tưởng, đảm bảo vệ sinh an toàn thực phẩm.</p>
                </div>
            `;
        }
        if (index == 2) {
            infoDescriptions.innerHTML = `
            <h6>1. Chọn mua quả chất lượng tươi ngon</h6>
            <p>Việc đi mua chọn quả là yếu tố tiên quyết nếu bạn muốn bảo quản trái cây được lâu.
            Bởi ngay từ khâu ban đầu đã không đảm bảo chất lượng, thì dù kỹ thuật bảo quản có chuẩn đến đâu cũng không giữ trái cây tươi lâu được. 
            trái cây</p>
            <p>Cách bảo quản trái cây</p>
            <p>Một vài lưu ý trong cách chọn quả ngon như sau:</p>
            <p>- Một vài loại quả khi chín tự nhiên thường có mùi thơm dịu nhẹ, bạn có thể dựa vào đặc điểm này. Trong khi với quả chín ép lại không có mùi. 
            <p>- Hình dạng bên ngoài của trái cây còn nguyên vẹn, không có vết xước, đốm lạ, màu sắc tươi, không héo. 
            <p>- Quả cầm chắc tay, ấn vào không quá mềm (đối với quả vốn tươi là cứng), hoặc bấm nhẹ vào đầu cuống quả, ngửi vào có mùi thơm thì chọn mua.
            <p>Sau khi đã tự tay chọn được trái cây tươi, ngon, tiếp theo là mang về nhà và thực hiện cách giữ trái cây tươi lâu!
            <h6>2. Cách bảo quản khi cho trái cây vào tủ lạnh</h6>
            <p>a. Làm sạch
            <p>Nhiều người có thói quen rửa sạch trái cây trước khi cho vào tủ lạnh. Vì cho rằng rửa là cách để làm sạch bụi, vi khuẩn bên ngoài vỏ.
            <p>luu khi bao quan
            <p>Cách bảo quản hoa quả tươi lâu
            <p>Nhưng nhiều chuyên gia khuyên rằng không nên mang trái cây đi rửa vì thực tế bên ngoài trái cây có tồn tại một lớp kháng thể tự nhiên giúp bảo vệ quả trước sự lây lan của vi khuẩn gây hại.  Đặc biệt lưu ý với những quả có lớp vỏ mỏng như táo, xoài, nho, dâu tây,...Khi nào cần ăn ngay thì mới đem đi rửa. 
            <p>Tóm lại, cách làm sạch an toàn mà hiệu quả để bảo quản trái cây trong tủ lạnh là bạn dùng khăn giấy lau sạch lớp vỏ. Khi lau cần nhẹ nhàng, tránh gây trầy xước. 
            <p>b. Lựa chọn dụng cụ bảo quản trong tủ lạnh
            <p>Bạn có thể để nguyên trái rồi cho vào ngăn mát của tủ lạnh. Nhưng tốt hơn hết hãy bỏ chúng vào dụng cụ bảo quản để trông gọn gàng hơn và không ảnh hưởng từ đồ ăn khác. 
            <p>- Dùng hộp nhựa: những chiếc hộp nhựa với hình dạng và dung tích đa dạng đủ để đựng mọi loại trái cây. Nhưng cũng đảm bảo phù hợp với diện tích của tủ lạnh. hop nhua tron
            <p>Hộp nhựa đựng trái cây ngày nay được làm bằng chất liệu nhựa nguyên sinh PET hoặc PP, được chứng nhận an toàn sức khỏe người dùng. Có phải bạn đang nghĩ nhựa sẽ ảnh hưởng đến môi trường, phải không?
            <p>Trước những độc hại của nhựa, hộp nhựa nguyên sinh đã cải tiến rất nhiều. Có thể tái sử dụng, rửa rồi dùng lại rất tiện lợi. 
            <p>Ngoài ra, cũng có nhiều màu sắc để bạn lựa chọn. Góp phần tăng tính thẩm mỹ, nhìn vào rất bắt mắt, tươi ngon, không còn là hộp nhựa đơn thuần. 
            <p>Đừng bỏ qua: Chọn hộp đựng thực phẩm bằng chất liệu nào: Nhựa, Thủy tinh hay Inox
            <p>- Giấy báo: dùng giấy báo có sẵn, bạn hãy cẩn thận bọc kín từng loại trái cây riêng biệt. Lớp giấy này vừa bảo vệ lớp vỏ tránh bị dập, hạn chế tình trạng hút nước, giúp trái cây lâu hư hơn.
            <p>- Túi lưới:  đây cũng là một dụng cụ lưu trữ và bảo quản hoa quả thuận tiện. Bạn có thấy ở siêu thị, người ta hay dùng túi lưới để đựng cà chua không? Chính là nó.
            <p>tui luoi
            <p>Vì cà chua dễ héo, nhanh hỏng nên nhờ vào tác dụng của túi lưới là duy trì được độ thông thoáng, giúp bề mặt trái cây tiếp xúc với không khí lạnh mà không bị bí bách. Do đó, hiện nay bên cạnh hộp nhựa, túi nhựa cũng rất phổ biến trong từng gia đình.
            <p>- Hộp thủy tinh: một vật liệu gia dụng quen thuộc nữa là thủy tinh. Hộp thủy tinh bảo quản trái cây tươi lâu trong tủ lạnh, rất sạch sẽ. Tuy cầm nặng tay và dễ vỡ. Nhưng bảo quản tốt trái cây, không những thế còn có thể là cách bảo quản trái cây lâu chín.
            <p>- Dùng túi nilong: nilong thì nhà nào cũng có, và bạn có thể dùng nó để bảo quản trái cây khi cho vào tủ lạnh. Nhưng cần tạo các lỗ thủng thoáng khí trên bao (khoảng 15 - 20 lỗ tùy vào kích thước), tạo điều kiện thích hợp giúp bảo quản tốt hơn trong môi trường lạnh. Tái chế túi nilong đựng trái cây cũng là cách bảo vệ môi trường.
            <p>tui nilong
            <p>Không chỉ có thể áp dụng tại nhà, mà những cách thức như trên cũng có thể trở thành cách bảo quản trái cây kinh doanh để trái cây lâu hư, buôn bán thuận lợi.  
            <p>c. Cách bảo quản trái cây đã cắt
            <p>Một vài bạn lại muốn bảo quản trái cây gọt vỏ rồi cắt bỏ vào tủ lạnh. Với cách này thì bạn có thể rửa sạch trước với nước. Loại bỏ phần hư nếu có, sau đó đem toàn bộ trái cây đã cắt cho vào hộp nhựa hoặc hộp thủy tinh. 
            <p>Tuy nhiên vì đã cắt, không còn lớp vỏ bảo vệ, nên để lâu trong tủ lạnh, nhiệt độ thấp sẽ hút nước, khiến hoa quả, trái cây mất ngon và hỏng nhanh. 
            <p>Trên đây là những cách bảo quản trái cây trong tủ lạnh, nhưng trường hợp bạn không có tủ lạnh, phải làm sao? Hãy đọc tiếp để vẫn giữ trái cây tươi ngon ngay cả khi bạn không có tủ lạnh nhé!
            `;
        }
    });
})

// TOAST MESSAGES
function toast({ title = "", message = "", type = "info", duration = 3000 }, containsToast) {
    if (containsToast) {
        const toast = document.createElement("div");
        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            containsToast.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                containsToast.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };

        const icons = {
            success: "fas fa-check-circle",
            info: "fas fa-info-circle",
            warning: "fa-solid fa-triangle-exclamation",
            error: "fas fa-exclamation-circle"
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title">${title}</h3>
                <p class="toast__msg">${message}</p>
            </div>
            <div class="toast__close">
                <i class="fas fa-times"></i>
            </div>
        `;
        containsToast.appendChild(toast);
    }
}
const toastMain = document.getElementById("toast");
// FAVORITE
function showAddProFavoToast() {
    toast({
        title: "Tuyệt vời!",
        message: `Bạn vừa thêm 1 sản phẩm vào mục yêu thích thành công bấm <a href="http://localhost/baseproject02/index/favorite">vào đây</a> để tới trang yêu thích.`,
        type: "success",
        duration: 5000
    }, toastMain);
}

function showRemoveProFavoToast() {
    toast({
        title: "Thông báo!",
        message: "Bạn vừa bỏ sản phẩm ra khỏi mục yêu thích.",
        type: "warning",
        duration: 5000
    }, toastMain);
}
// WARNING QUANTITY
function showWarningQuantity(message) {
    toast({
        title: "Thông báo!",
        message: message,
        type: "warning",
        duration: 5000
    }, toastMain);
}

// CART
function showAddProToCartToast(name, quantity) {
    toast({
        title: "Thành công!",
        message: `Bạn vừa thêm <b class="title-quatity_product">${name}-${quantity}Kg</b> vào giỏ hàng thành công, hãy vào giỏ hàng để xem nào.`,
        type: "success",
        duration: 5000
    }, toastMain);
}

// ORDER
function showWarningFillIn() {
    toast({
        title: "Thông báo!",
        message: `Vui lòng điền đầy đủ thông tin vào địa chỉ nhận hàng!`,
        type: "warning",
        duration: 5000
    }, toastMain);
}

function showSelectPaymentMethod() {
    toast({
        title: "Thông báo!",
        message: `Vui lòng chọn phương thức thanh toán!`,
        type: "warning",
        duration: 5000
    }, toastMain);
}

// INFOCATION LOGIN
const toastLogin = $("#toastLogin")
function showLoginToast() {
    toast({
        title: "Thông báo!",
        message: "Vui lòng đăng nhập trước khi đặt hàng.",
        type: "warning",
        duration: 5000
    }, toastLogin);
}

