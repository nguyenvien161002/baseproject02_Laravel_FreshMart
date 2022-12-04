import toast from "./app.js";

// NOTIFICATION REGISTER
const toastRegister = document.getElementById("toastRegister");
function showRegisterToast() {
    toast({
        title: "Thông báo!",
        message: "Mật khẩu không trùng khớp vui lòng thử lại!",
        type: "error",
        duration: 20000
    }, toastRegister);
}

var x = showRegisterToast();
console.log(1);


