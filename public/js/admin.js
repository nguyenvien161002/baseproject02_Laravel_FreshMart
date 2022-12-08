const $j = jQuery.noConflict();
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const btnNotify = $('.jsbtnbell');
const boxNotify = $('.box-notifications');
const btnMessages = $('.jsbtnemail');
const boxMessages = $('.box-messages');
const btnProfile = $('.jsbtnprofile');
const boxProfile = $('.box-profile');
const main = $('.main');
const wrapper = $('.wrapper');
const overlay = $('.overlay');

btnNotify.addEventListener('click', () => {
    toggleOverlay();
    boxNotify.classList.toggle('active');
    hideBox(boxMessages);
    hideBox(boxProfile);
});

btnMessages.addEventListener('click', () => {
    toggleOverlay();
    boxMessages.classList.toggle('active');
    hideBox(boxNotify);
    hideBox(boxProfile);
});

btnProfile.addEventListener('click', () => {
    toggleOverlay();
    boxProfile.classList.toggle('active');
    hideBox(boxMessages);
    hideBox(boxNotify);
});

boxMessages.addEventListener('click', (e) => {
    e.stopPropagation();
});
boxNotify.addEventListener('click', (e) => {
    e.stopPropagation();
});
boxProfile.addEventListener('click', (e) => {
    e.stopPropagation();
});

function hideBox(box) {
    if (box.classList.contains("active")) { 
        box.classList.remove("active");
    }
}

function toggleOverlay() {
    overlay.classList.toggle('active');
}

overlay.addEventListener('click', () => {
    overlay.classList.remove('active');
    hideBox(boxMessages);
    hideBox(boxProfile);
    hideBox(boxNotify);
    dropdownToggle.classList.remove('show');
    dropdownMenu.classList.remove('show');
    boxAutocomplete.fadeOut();
})

const menuAccount = $('.menu-item-account')
const subMenuAccount = $('.sub-menu-item')
const iconDropDown = $('.icon-dropdown')
menuAccount.addEventListener('click', () => {
    subMenuAccount.classList.toggle('active');
    iconDropDown.innerHTML = "";
    iconDropDown.innerHTML = `<i class="mdi mdi-chevron-down"></i>`;
    if(!subMenuAccount.classList.contains('active')) {
        iconDropDown.innerHTML = "";
        iconDropDown.innerHTML = `<i class="mdi mdi-chevron-left"></i>`;
    }
})

const dropdownToggle = $('.dropdown-toggle');
const dropdownMenu = $('.dropdown-menu');
if(dropdownToggle) {
    dropdownToggle.addEventListener('click', () =>{
        dropdownToggle.classList.toggle('show');
        dropdownMenu.classList.toggle('show');
        overlay.classList.toggle('active');
    })
}

// Duyệt đơn hàng
var btnOrderBrowsing = $j(".btn-order-browsing");
btnOrderBrowsing.click(function () {
    var approved = {
        "approved": "Đã duyệt",
        "order_code": btnOrderBrowsing.attr('data-order_code')
    }
    $j.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
        }
    });

    $j.ajax({
        type: "POST",
        url: 'http://127.0.0.1:8000/admin/order/update',
        data: JSON.stringify(approved),
        dataType: 'JSON',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
        },
        success: function (response) {
            window.location.assign(`${response}`)
        }
    });
});

// Tìm kiếm sản phẩm 
var searchInput = $j(".form-search .search-input-general");
var boxAutocomplete = $j('.box-autocomplete');
var URLS = ['products', 'category_product', 'news', 'orders', 'accounts/staffs', 'accounts/users', 'banner'];
var pageUrl = "";
URLS.forEach((url) => {
    var pageCategoryProduct = window.location.pathname.includes(url) ? url : "";
    if(!!pageCategoryProduct) {
        pageUrl = pageCategoryProduct;
    }
})
searchInput.keyup(function () {
    var query = $j(this).val();
    if(query != "") {
        $j.ajax({
            type: "GET",
            url: `http://127.0.0.1:8000/admin/${pageUrl}`,
            data: {queryAutocomplete: query},
            success: function (response) {
                boxAutocomplete.fadeIn();
                boxAutocomplete.html(response);
                if(!!boxAutocomplete.fadeIn()) {
                    overlay.classList.add('active');
                }
                if(response == "") {
                    boxAutocomplete.html("Không có kết quả tìm kiếm ...");
                }
            }
        });
    } else {
        overlay.classList.remove('active');
        boxAutocomplete.fadeOut();
    }
});

var formSearch = $j('.form-search');
$j(document).on('click', ".result-search", (index, value) => {
    var dataQuery = index.target.getAttribute('title');
    searchInput.val(dataQuery);
    boxAutocomplete.fadeOut();
    formSearch.submit();
})
// SEARCH IN DETAILS PAGE
// var searchInputDetails = $j(".form-search .search-input-details");
// searchInputDetails.keyup(function () {
//     var keyWordsSearch = $j(this).val();
//     if(keyWordsSearch != "") {
//         var query = {
//             'query': keyWordsSearch
//         }
//         $j.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
//             }
//         });
    
//         $j.ajax({
//             type: "POST",
//             url: `http://127.0.0.1:8000/admin/product/details/13`,
//             data: JSON.stringify(query),
//             dataType: 'JSON',
//             headers: {
//                 'Accept': 'application/json',
//                 'Content-Type': 'application/json;charset=UTF-8',
//             },
//             success: function (response) {
//                 boxAutocomplete.fadeIn();
//                 boxAutocomplete.html(response);
//                 if(!!boxAutocomplete.fadeIn()) {
//                     overlay.classList.add('active');
//                 }
//                 if(response == "") {
//                     boxAutocomplete.html("Không có kết quả tìm kiếm ...");
//                 }
//             }
//         });
//     } 
// });

