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