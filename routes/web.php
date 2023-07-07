<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\homeController;
use App\Http\Controllers\Admin\homeAdController;
use App\Http\Controllers\Admin\categoryProductController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Home\cartController;
use App\Http\Controllers\Home\checkoutController;
use App\Http\Controllers\Home\maGiamGiaController;
use App\Http\Controllers\Admin\vanChuyenController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\Admin\sizeController;
use App\Http\Controllers\Admin\mailController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\tintucController;


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

Route::get('/admin', function () {
    return view('layout_admin');
});

//$cfg['ExecTimeLimit'] = 3600; set thời gian chạy của xampp tối đa 1 tiếng xampp/phpMyAdmin/config.inc.php

//--frontend
//--trang chủ
Route::get('/', [homeController::class, 'home'])->name('');

Route::get('/home', [homeController::class, 'home'])->name('home');
//name('home'): tên funtion homecontroller

//liên hệ -- contact
Route::get('/lienhe', [homeController::class, 'lienhe']);

//test send mail
Route::get('/send', [homeController::class, 'send']);

//Login facebook -- chưa cấu hình miền
// Route::get('/login-facebook', [homeAdController::class, 'login_facebook']);
// Route::get('/login/callback', [homeAdController::class, 'callback_facebook']);

//Login google 
Route::get('/login-google', [homeAdController::class, 'login_google']);
Route::get('/google/callback', [homeAdController::class, 'callback_google']);

//search
Route::post('/tim-kiem', [homeController::class, 'search']);

//loại sản phẩm
Route::get('/loai-san-pham/{category_id}', [homeController::class, 'show_category_home']);
//Route::get('/loai-san-pham/{category_id}', [categoryProductController::class, 'show_category_home']);

//chi tiết sp -- bumbummen99
Route::get('/chi-tiet-san-pham/{product_id}', [homeController::class, 'chi_tiet_san_pham']);
//Route::get('/chi-tiet-san-pham/{product_id}', [productController::class, 'chi_tiet_san_pham']);

//chi tiết sản phẩm ajax -- ajax
Route::get('/chi-tiet-san-pham-ajax/{product_id}', [homeController::class, 'chi_tiet_san_pham_ajax']);

//giỏ hàng
//cart -- bumbummen99
Route::post('/save-cart', [cartController::class, 'save_cart']);
Route::post('/update_quantity', [cartController::class, 'update_quantity']);

Route::get('/cart', [cartController::class, 'show_cart']);
Route::get('/delete-cart/{rowID}', [cartController::class, 'delete_cart']);

//cart-ajax
Route::get('/cart-ajax', [cartController::class, 'show_cart_ajax']);
Route::get('/delete-cart-ajax/{session_id}', [cartController::class, 'delete_cart_ajax']);
Route::get('/delete-all-cart-ajax', [cartController::class, 'delete_all_cart_ajax']);

Route::post('/add-to-cart-ajax', [cartController::class, 'add_to_cart_ajax']);
Route::post('/update-cart-ajax', [cartController::class, 'update_cart_ajax']);

//checkout -- bumbummen99
Route::get('/login-checkout', [checkoutController::class, 'dangNhap_dangKi_checkout']);
Route::get('/checkout', [checkoutController::class, 'show_checkout']);
Route::get('/logout-checkout', [checkoutController::class, 'logout_checkout']);

Route::post('/them-tt-khachhang', [checkoutController::class, 'them_tt_khachhang']);
Route::post('/login-khachhang', [checkoutController::class, 'login_khachhang']);
Route::post('/dat-hang', [checkoutController::class, 'dat_hang']);

//checkout -- ajax select tỉnh thành phố, xã phường, quạn huyện 
Route::get('/delete-phi-ship-checkout', [checkoutController::class, 'delete_phi_ship_checkout']);

Route::post('/select-vanchuyen-checkout', [checkoutController::class, 'select_vanchuyen_checkout']);
Route::post('/checkout-tinh-phi-ship', [checkoutController::class, 'checkout_tinh_phi_ship']);
Route::post('/add-order', [checkoutController::class, 'add_order']);

Route::post('/select-chitietsp-prosize', [homeController::class, 'select_chitietsp_prosize']);


//mã giảm giá - counpon 
Route::get('/delete-magiamgia-cart', [cartController::class, 'delete_magiamgia_cart']);

Route::post('/check-coupon', [homeController::class, 'check_coupon']);

//lấy lại mật khẩu bằng mail
Route::get('/quen-mat-khau', [mailController::class, 'quen_mat_khau']);
Route::get('/update-new-matkhau', [mailController::class, 'update_new_matkhau']);

Route::post('/lay-lai-mat-khau-email-post', [mailController::class, 'lay_lai_mat_khau_email_post']);
Route::post('/update-new-matkhau-post', [mailController::class, 'update_new_matkhau_post']);

//lịch sử mua hàng -- history
Route::get('/lich-su-mua-hang', [homeController::class, 'lich_su_mua_hang']);
Route::get('/view-history-ctdh/{don_hang_code}', [homeController::class, 'view_history_ctdh']);

//huỷ đơn hàng
Route::post('/ly-do-huy-don-hang', [homeController::class, 'ly_do_huy_don_hang']);

//chi tiết tin tức
Route::get('/chi-tiet-tin-tuc/{tintuc_id}', [homeController::class, 'chi_tiet_tin_tuc']);

//tăng lượt xem sản phẩm
Route::post('/post-luot-xem-sp', [homeController::class, 'post_luot_xem_sp']);

//tăng lượt xem bài viết
Route::post('/post-luot-xem-tintuc', [homeController::class, 'post_luot_xem_tintuc']);



//--backend
//--admin
Route::get('/index', [homeAdController::class, 'index'])->name('index');

//login
Route::get('/login', [homeAdController::class, 'login'])->name('login');
Route::post('/ad-index', [homeAdController::class, 'admin_home']);

//logout
Route::get('/logout', [homeAdController::class, 'logout'])->name('logout');

//đăng kí admin -- register
//Route::get('/dang-ki-admin', [homeAdController::class, 'edit_product']);


// Route::get('/login', function () {
//     return view('login_admin');
// });

//loại sp--categoryProduct

//Route::get('/all-category', [categoryProductController::class, 'all_category'])->middleware('auth.roles');
Route::get('/all-category', [categoryProductController::class, 'all_category'])->name('all_category')->middleware('auth.roles.admin');
Route::get('/add-category', [categoryProductController::class, 'add_category'])->name('add_category')->middleware('auth.roles.admin');
Route::get('/edit-category/{category_id}', [categoryProductController::class, 'edit_category'])->middleware('auth.roles.admin');
Route::get('/delete-category/{category_id}', [categoryProductController::class, 'delete_category'])->middleware('auth.roles.admin');

Route::post('/save-category-product', [categoryProductController::class, 'save_category_product']);
Route::post('/update-category-product/{category_id}', [categoryProductController::class, 'update_category_product']);

Route::get('/unactive-category-product/{category_id}', [categoryProductController::class, 'unactive_category_product'])->middleware('auth.roles.admin');
Route::get('/active-category-product/{category_id}', [categoryProductController::class, 'active_category_product'])->middleware('auth.roles.admin');

//export excel category
Route::post('/export-csv', [categoryProductController::class, 'export_csv']);

//sản phẩm -- product
Route::get('/all-product', [productController::class, 'all_product'])->name('all_product'); //->middleware('auth.roles.admin');
Route::get('/add-product', [productController::class, 'add_product'])->name('add_product')->middleware('auth.roles.admin');
Route::get('/edit-product/{product_id}', [productController::class, 'edit_product'])->middleware('auth.roles.admin');
Route::get('/delete-product/{product_id}', [productController::class, 'delete_product'])->middleware('auth.roles.admin');

Route::post('/save-product', [productController::class, 'save_product']);
Route::post('/update-product/{product_id}', [productController::class, 'update_product']);

Route::get('/unactive-product/{product_id}', [productController::class, 'unactive_product'])->middleware('auth.roles.admin');
Route::get('/active-product/{product_id}', [productController::class, 'active_product'])->middleware('auth.roles.admin');

Route::get('/view-product-size/{product_id}', [productController::class, 'view_product_size'])->middleware('auth.roles.admin');
Route::post('/post-product-size', [productController::class, 'post_product_size']);

//export excel product
Route::post('/export-csv-product', [productController::class, 'export_csv_product']);

//số lượng size product
Route::get('/edit-product-size/{productsize_id}', [productController::class, 'edit_product_size'])->middleware('auth.roles.admin');
Route::get('/delete-product-size/{productsize_id}', [productController::class, 'delete_product_size'])->middleware('auth.roles.admin');

Route::post('/update-produc-size/{productsize_id}', [productController::class, 'update_produc_size']);


//đơn hàng -- order -- bumbummen99
//Route::get('/show-donhang', [orderController::class, 'show_donhang']);
//Route::get('/view-ctdh/{order_id}', [orderController::class, 'view_ctdh']);

//đơn hàng -- order -- ajax
Route::get('/show-donhang', [orderController::class, 'view_donhang'])->middleware('auth.roles.admin');

//export excel đơn hàng
Route::post('/export-csv-donhang', [orderController::class, 'export_csv_donhang']);

//chi tiết đơn hàng
Route::get('/view-ctdh/{don_hang_code}', [orderController::class, 'view_chitiet_donhang'])->middleware('auth.roles.admin');

//in đơn hàng -- pdf print-donhang
Route::get('/print-donhang/{don_hang_code}', [orderController::class, 'print_donhang']);

//cập nhật số lượng đơn hàng
Route::post('/update-donhang-qty', [orderController::class, 'update_donhang_qty']);

//mã giảm giá coupon
Route::get('/all-magiamgia', [maGiamGiaController::class, 'all_magiamgia'])->middleware('auth.roles.admin');
Route::get('/add-magiamgia', [maGiamGiaController::class, 'add_magiamgia'])->middleware('auth.roles.admin');
Route::get('/delete-magiamgia/{magiamgia_id}', [maGiamGiaController::class, 'delete_magiamgia'])->middleware('auth.roles.admin');

Route::get('/unactive-magiamgia/{magiamgia_id}', [maGiamGiaController::class, 'unactive_magiamgia'])->middleware('auth.roles.admin');
Route::get('/active-magiamgia/{magiamgia_id}', [maGiamGiaController::class, 'active_magiamgia'])->middleware('auth.roles.admin');

Route::post('/save-magiamgia', [maGiamGiaController::class, 'save_magiamgia']);

//phí vận chuyển - delivery 
Route::get('/phi-van-chuyen', [vanChuyenController::class, 'phi_van_chuyen'])->middleware('auth.roles.admin');

Route::post('/select-phiship', [vanChuyenController::class, 'select_phiship']);
Route::post('/select-vanchuyen', [vanChuyenController::class, 'select_vanchuyen']);
Route::post('/insert-phiship', [vanChuyenController::class, 'insert_phiship']);
Route::post('/update-phiship', [vanChuyenController::class, 'update_phiship']);

//banner
Route::get('/all-banner', [bannerController::class, 'all_banner'])->middleware('auth.roles.admin');
Route::get('/add-banner', [bannerController::class, 'add_banner'])->middleware('auth.roles.admin');
Route::get('/edit-banner/{banner_id}', [bannerController::class, 'edit_banner'])->middleware('auth.roles.admin');
Route::get('/delete-banner/{banner_id}', [bannerController::class, 'delete_banner'])->middleware('auth.roles.admin');

Route::post('/save-banner', [bannerController::class, 'save_banner']);
Route::post('/update-banner/{banner_id}', [bannerController::class, 'update_banner']);

Route::get('/unactive-banner/{banner_id}', [bannerController::class, 'unactive_banner'])->middleware('auth.roles.admin');
Route::get('/active-banner/{banner_id}', [bannerController::class, 'active_banner'])->middleware('auth.roles.admin');

//size -- kích cỡ
Route::get('/all-size', [sizeController::class, 'all_size'])->middleware('auth.roles.admin');
Route::get('/add-size', [sizeController::class, 'add_size'])->middleware('auth.roles.admin');
Route::get('/delete-size/{size_id}', [sizeController::class, 'delete_size'])->middleware('auth.roles.admin');

Route::post('/save-size', [sizeController::class, 'save_size']);

Route::get('/unactive-size/{size_id}', [sizeController::class, 'unactive_size'])->middleware('auth.roles.admin');
Route::get('/active-size/{size_id}', [sizeController::class, 'active_size'])->middleware('auth.roles.admin');

//thống kê -- statistical day-order
Route::post('/filter-by-date', [homeAdController::class, 'filter_by_date']);
Route::post('/index-admin-filter', [homeAdController::class, 'index_admin_filter']);
Route::post('/days-30ngay-order', [homeAdController::class, 'days_30ngay_order']);
//Route::get('/index', [homeAdController::class, 'thonketesst']);

//send mail 
Route::get('/send-magiamgia/{magiamgia_code}/{magiamgia_soluong}/{magiamgia_loaigiamgia}/{magiamgia_sotiengiam}', [mailController::class, 'send_magiamgia'])->middleware('auth.roles.admin');
Route::get('/send-magiamgia-vip/{magiamgia_code}/{magiamgia_soluong}/{magiamgia_loaigiamgia}/{magiamgia_sotiengiam}', [mailController::class, 'send_magiamgia_vip'])->middleware('auth.roles.admin');

Route::get('/mail-example', [mailController::class, 'mail_example']); //test view send mail

//phân quyền
//user 
Route::get('/all-user', [userController::class, 'all_user'])->middleware('auth.roles.admin');
Route::get('/add-user', [userController::class, 'add_user'])->middleware('auth.roles.admin');

Route::post('/phan-quyen-admin', [userController::class, 'phan_quyen_admin']);
Route::post('/post-add-user', [userController::class, 'post_add_user']);

//authentication
Route::get('/register-auth', [AuthController::class, 'register_auth']);
Route::get('/login-auth', [AuthController::class, 'login_auth']);
Route::get('/logout-auth', [AuthController::class, 'logout_auth']);
Route::get('/delete-user/{admin_id}', [AuthController::class, 'delete_user']);

Route::post('/register-auth-post', [AuthController::class, 'register_auth_post']);
Route::post('/login-auth-post', [AuthController::class, 'login_auth_post']);

//tin tức
Route::get('/all-tintuc', [tintucController::class, 'all_tintuc'])->middleware('auth.roles.author');
Route::get('/add-tintuc', [tintucController::class, 'add_tintuc'])->middleware('auth.roles.author');
Route::get('/edit-tintuc/{tintuc_id}', [tintucController::class, 'edit_tintuc'])->middleware('auth.roles.author');
Route::get('/delete-tintuc/{tintuc_id}', [tintucController::class, 'delete_tintuc'])->middleware('auth.roles.author');

Route::post('/save-tintuc', [tintucController::class, 'save_tintuc']);
Route::post('/update-tintuc/{tintuc_id}', [tintucController::class, 'update_tintuc']);

Route::get('/unactive-tintuc/{tintuc_id}', [tintucController::class, 'unactive_tintuc'])->middleware('auth.roles.author');
Route::get('/active-tintuc/{tintuc_id}', [tintucController::class, 'active_tintuc'])->middleware('auth.roles.author');
