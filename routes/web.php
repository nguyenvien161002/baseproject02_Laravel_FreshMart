<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\A_DashboardController;
use App\Http\Controllers\Admin\A_ProductsController;
use App\Http\Controllers\Admin\A_CategoryProductController;
use App\Http\Controllers\Admin\A_NewsController;
use App\Http\Controllers\Admin\A_AccountsUserController;
use App\Http\Controllers\Admin\A_AccountsStaffController;
use App\Http\Controllers\Admin\A_BannerController;
use App\Http\Controllers\Admin\A_OrdersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CLIENTS
Route::get('/', [HomeController::class, "index"]) -> name('home');
Route::get('/introduction', [IntroductionController::class, "index"]);
Route::get('/products', [ProductsController::class, "index"]);
Route::get('/news', [NewsController::class, "index"]);
Route::get('/contact', [ContactController::class, "index"]);
Route::get('/favorite', [FavoriteController::class, "index"]);
Route::get('/user/profile/{id}', [ProfileController::class, "index"]);
Route::get('/order', [OrderController::class, "index"]);
Route::post('/order', [OrderController::class, "insertOrder"]);
Route::get('/user/ordered/{id}', [OrderController::class, "viewOrdered"]) -> name('ordered');
Route::get('/product/details/{id}', [ProductsController::class, "detailsProduct"]);
Route::get('/news/details/{id}', [NewsController::class, "detailsNews"]);
// SORT PRODUCTS
Route::post('/products/sort', [ProductsController::class, "sortProducts"]);
// CONFIRM EMAIL
Route::get('/user/confirm/{id}/{token}', [AuthenticateController::class, "confirmEmail"]) -> name('user.confirm.email');
// FORGET PASSWORD
Route::get('/user/forgot/password', [AuthenticateController::class, "forgotPassword"]) -> name('user.forgot.password');
Route::post('/user/forgot/password', [AuthenticateController::class, "authForgotPassword"]);
Route::get('/user/reset/password/{id}/{token}', [AuthenticateController::class, "resetPassword"]);
Route::post('/user/reset/password/{id}/{token}', [AuthenticateController::class, "auhtResetPassword"]);
// ORDERED WITH LOGIN SOCIAL
Route::get('/user/google/profile/{id}', [ProfileController::class, "index"]);
Route::get('/user/facebook/profile/{id}', [ProfileController::class, "index"]);
Route::get('/user/google/ordered/{id}', [OrderController::class, "viewUserGgOrdered"]) -> name('user.google.ordered');
Route::get('/user/facebook/ordered/{id}', [OrderController::class, "viewUserFbOrdered"]) -> name('user.facebook.ordered');
// LOGIN
Route::prefix("/register") -> group(function() {
    Route::get("/account", [AuthenticateController::class, "registerAccount"]) -> name('register.account');
    Route::post("/account", [AuthenticateController::class, "authRegisterAccount"]);
});
Route::prefix("/login") -> group(function() {
    Route::get("/", [AuthenticateController::class, "index"]) -> name('login');
    Route::get("/admin", [AuthenticateController::class, "loginAdmin"]) -> name('login.admin');
    Route::post("/admin", [AuthenticateController::class, "authLoginAdmin"]);
    Route::get("/staff", [AuthenticateController::class, "loginStaff"]) -> name('login.staff');
    Route::post("/staff", [AuthenticateController::class, "authLoginStaff"]);
    Route::get("/account", [AuthenticateController::class, "loginAccount"]) -> name('login.account');
    Route::post("/account", [AuthenticateController::class, "authLoginAccount"]);
    // LOGIN SOCIAL
    Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
    Route::get('/callback/google', [GoogleAuthController::class, 'handleCallback']);
    Route::get('/auth/facebook', [FacebookAuthController::class, 'redirectToFacebook']);
    Route::get('/callback/facebook', [FacebookAuthController::class, 'handleCallback']);
});
Route::get("/logout", [AuthenticateController::class, "logout"]);
// ADMIN
Route::prefix("/admin") -> middleware('checklogin') -> group(function() {
    Route::get('/dashboard', [A_DashboardController::class, "index"]) -> name('admin');
    Route::get('/products', [A_ProductsController::class, "index"]) -> name('admin.products');
    Route::prefix('/product') -> group(function() {
        Route::get('/add', [A_ProductsController::class, "viewAddProduct"]);
        Route::post('/insert', [A_ProductsController::class, "insertProduct"]);
        Route::get('/edit/{id}', [A_ProductsController::class, "viewEditProduct"]);
        Route::post('/update', [A_ProductsController::class, "updateProduct"]);
        Route::get('/delete/{id}', [A_ProductsController::class, "deleteProduct"]);
        Route::get('/details/{id}', [A_ProductsController::class, "viewDetailsProduct"]);
        Route::get('/updated', [A_ProductsController::class, "updateStateProduct"]);
    });
    Route::prefix('/category_product') -> group(function() {
        Route::get('', [A_CategoryProductController::class, "index"]) -> name('admin.category_product');
        Route::get('/add', [A_CategoryProductController::class, "viewAddCategoryProduct"]);
        Route::post('/insert', [A_CategoryProductController::class, "insertCategoryProduct"]);
        Route::get('/edit/{id}', [A_CategoryProductController::class, "viewEditCategoryProduct"]);
        Route::post('/update', [A_CategoryProductController::class, "updateCategoryProduct"]);
        Route::get('/delete/{id}', [A_CategoryProductController::class, "deleteCategoryProduct"]);
        Route::get('/details/{id}', [A_CategoryProductController::class, "viewDetailsCategoryProduct"]);
        Route::get('/updated', [A_CategoryProductController::class, "updateStateCategoryProduct"]);
    });
    Route::prefix('/news') -> group(function() {
        Route::get('', [A_NewsController::class, "index"]) -> name('admin.news');
        Route::get('/add', [A_NewsController::class, "viewAddNews"]);
        Route::post('/insert', [A_NewsController::class, "insertNews"]);
        Route::get('/edit/{id}', [A_NewsController::class, "viewEditNews"]);
        Route::post('/update', [A_NewsController::class, "updateNews"]);
        Route::get('/delete/{id}', [A_NewsController::class, "deleteNews"]);
        Route::get('/details/{id}', [A_NewsController::class, "viewDetailsNews"]);
        Route::get('/updated', [A_NewsController::class, "updateStateNews"]);
    });
    Route::get('/accounts/users', [A_AccountsUserController::class, "index"]) -> name('admin.accounts.users');
    Route::prefix('/account/user') -> group(function() {
        Route::get('/add', [A_AccountsUserController::class, "viewAddAccount"]);
        Route::post('/insert', [A_AccountsUserController::class, "insertAccount"]);
        Route::get('/edit/{id}', [A_AccountsUserController::class, "viewEditAccount"]);
        Route::post('/update', [A_AccountsUserController::class, "updateAccount"]);
        Route::get('/delete/{id}', [A_AccountsUserController::class, "deleteAccount"]);
        Route::get('/details/{id}', [A_AccountsUserController::class, "viewDetailsAccount"]);
    });
    Route::get('/accounts/staffs', [A_AccountsStaffController::class, "index"]) -> name('admin.accounts.staffs');
    Route::prefix('/account/staff') -> group(function() {
        Route::get('/add', [A_AccountsStaffController::class, "viewAddAccount"]);
        Route::post('/insert', [A_AccountsStaffController::class, "insertAccount"]);
        Route::get('/edit/{id}', [A_AccountsStaffController::class, "viewEditAccount"]);
        Route::post('/update', [A_AccountsStaffController::class, "updateAccount"]);
        Route::get('/delete/{id}', [A_AccountsStaffController::class, "deleteAccount"]);
        Route::get('/details/{id}', [A_AccountsStaffController::class, "viewDetailsAccount"]);
    });
    Route::prefix('/banner') -> group(function() {
        Route::get('', [A_BannerController::class, "index"]) -> name('admin.banner');
        Route::get('/add', [A_BannerController::class, "viewAddBanner"]);
        Route::post('/insert', [A_BannerController::class, "insertBanner"]);
        Route::get('/edit/{id}', [A_BannerController::class, "viewEditBanner"]);
        Route::post('/update', [A_BannerController::class, "updateBanner"]);
        Route::get('/delete/{id}', [A_BannerController::class, "deleteBanner"]);
        Route::get('/details/{id}', [A_BannerController::class, "viewDetailsBanner"]);
        Route::get('/updated', [A_BannerController::class, "updateStateBanner"]);
    });
    Route::get('/orders', [A_OrdersController::class, "index"]) -> name('admin.orders');
    Route::prefix('/order') -> group(function() {
        Route::post('/update', [A_OrdersController::class, "updateOrder"]);
        Route::get('/delete/{order_code}', [A_OrdersController::class, "deleteOrder"]);
        Route::get('/details/{order_code}', [A_OrdersController::class, "viewDetailsOrder"]);
    });
});
// CHECKOUT PAYMENTS
Route::post("/order/checkout", [CheckoutController::class, "index"]);
Route::get("/order/checkout/momo", [CheckoutController::class, "paymentMomo"]);
Route::get("/order/checkout/vnpay", [CheckoutController::class, "paymentVNPAY"]);
Route::get('/order/checkout/paypal/process-transaction', [CheckoutController::class, 'processTransaction']) -> name('processTransaction');
Route::get('/order/checkout/paypal/success-transaction/{id}', [CheckoutController::class, 'successTransaction']) -> name('successTransaction');
Route::get('/order/checkout/paypal/cancel-transaction', [CheckoutController::class, 'cancelTransaction']) -> name('cancelTransaction');


