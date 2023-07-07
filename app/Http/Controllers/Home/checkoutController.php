<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;

use App\Models\thanhpho;
use App\Models\quanhuyen;
use App\Models\xaphuong;
use App\Models\phiship;

use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\shipping;
use App\Models\magiamgia;
use App\Models\khachhang;
use Illuminate\Support\Facades\Mail;

session_start();

class checkoutController extends Controller
{

    //view checkout
    public function show_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }

        // địa chỉ chưa thêm vào phí vc thì ko lấy đc

        $dc_tinh = thanhpho::where('matp', session()->get('diachi_tinh'))->first();
        $dc_huyen = quanhuyen::where('maqh', session()->get('diachi_quan'))->first();
        $dc_xa = xaphuong::where('xaid', session()->get('diachi_xa'))->first();


        $thanhpho = thanhpho::orderby('matp', 'ASC')->get();
        return view('user.checkout.checkout')->with('category', $cate_product)->with('product', $all_product)->with(compact('thanhpho', 'count_cart_mini', 'dc_tinh', 'dc_huyen', 'dc_xa'));
    }
    //lấy tt xã phường ,quận huyện,tỉnh thành phố
    public function select_vanchuyen_checkout(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "thanhpho") {
                $select_quanhuyen = quanhuyen::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận/huyện---</option>';
                foreach ($select_quanhuyen as $key => $quanhuyen) {
                    $output .= '<option value="' . $quanhuyen->maqh . '">' . $quanhuyen->name_qh . '</option>';
                }
            } else {

                $select_xaphuong = xaphuong::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã/phường---</option>';
                foreach ($select_xaphuong as $key => $xaphuong) {
                    $output .= '<option value="' . $xaphuong->xaid . '">' . $xaphuong->name_xaphuong . '</option>';
                }
            }
            echo $output;
        }
    }
    //tính phí vận chuyển
    public function checkout_tinh_phi_ship(Request $request)
    {
        $data = $request->all();
        // $phiship_matp = $data['thanhpho'];
        // $phiship_maqh = $data['quanhuyen'];
        // $phiship_xaid = $data['xaphuong'];
        //$phiship = phiship::where('phiship_matp', $phiship_matp)->where('phiship_maqh', $phiship_maqh)->where('phiship_xaid', $phiship_xaid)->first();
        if ($data['matp']) {
            $phiship = phiship::where('phiship_matp', $data['matp'])->where('phiship_maqh', $data['maqh'])->where('phiship_xaid', $data['xaid'])->get();
            if ($phiship) {
                $count_phiship = $phiship->count();
                if ($count_phiship > 0) {
                    foreach ($phiship as $key => $p_sip) {
                        //chưa xong
                        Session::put('phiship', $p_sip->phiship_phiship);
                        Session::put('diachi_tinh', $p_sip->phiship_matp);
                        Session::put('diachi_quan', $p_sip->phiship_maqh);
                        Session::put('diachi_xa', $p_sip->phiship_xaid);
                        Session::save();
                    }
                } else {
                    //chưa xong

                    Session::put('diachi_tinh', $data['matp']);
                    Session::put('diachi_quan', $data['maqh']);
                    Session::put('diachi_xa', $data['xaid']);
                    Session::put('phiship', 35000);
                    Session::save();
                }
            }
        }
    }
    //insert thông tin đơn hàng
    //check validate form lỗi ko hiện message, do type="button".
    public function add_order(Request $request)
    {
        $data = $request->all();
        if (session()->get('phiship')) {
            // $request->validate([
            //     'shipping_ten' => 'required',
            //     'shipping_sdt' => 'required|regex:/(03)[0-9]{8}/',
            //     'shipping_email' => 'required|email',
            //     'shipping_diachi' => 'required'
            // ], [
            //     'shipping_ten.required' => 'Họ tên người nhận hàng không được để trống.Hãy nhập lại...',
            //     'shipping_sdt.required' => 'Số điện thoại không được để trống. Hãy nhập lại...',
            //     'shipping_email.required' => 'Email không được để trống. Hãy nhập lại...',
            //     'shipping_diachi.required' => 'Địa chỉ nhận hàng không được để trống. Hãy nhập lại...'
            // ]);

            //trừ số lượng mã giảm giá
            if ($data['order_magiamgia'] != "0") {
                $magiamgia = magiamgia::where('magiamgia_code', $data['order_magiamgia'])->first();
                $magiamgia->magiamgia_user_id = $magiamgia->magiamgia_user_id . ',' . session()->get('khachhang_id');
                $magiamgia->magiamgia_soluong = $magiamgia->magiamgia_soluong - 1;
                $magiamgia_mail = $magiamgia->magiamgia_code;
                $magiamgia->save();
            } else {
                $magiamgia_mail = "Không áp dụng mã giảm giá";
            }

            //insert thông tin vận chuyển
            $shipping = new shipping();
            $shipping->shipping_ten = $data['shipping_ten'];
            $shipping->shipping_sdt = $data['shipping_sdt'];
            $shipping->shipping_email = $data['shipping_email'];
            $shipping->shipping_hinhthuc = $data['shipping_hinhthuc'];
            $shipping->shipping_diachi = $data['shipping_diachi'];

            $shipping->shipping_tentp = $data['shipping_matp'];
            $shipping->shipping_tenqh = $data['shipping_maqh'];
            $shipping->shipping_tenxa = $data['shipping_xaid'];

            $shipping->shipping_ghichu = $data['shipping_ghichu'];
            $shipping->save();
            $shipping_id = $shipping->shipping_id;

            $checkout_code = substr(md5(microtime()), rand(0, 30), 5);

            //insert thông tin đơn hàng
            $donhang = new donhang();
            $donhang->khachhang_id = Session::get('khachhang_id');
            $donhang->shipping_id = $shipping_id;
            //$donhang->don_hang_thanhtien = $shipping_id;
            $donhang->don_hang_trangthai = 0;
            $donhang->don_hang_code = $checkout_code;

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $today = now();; //Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $ngaydat = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $donhang->created_at = $today;
            $donhang->donhang_ngaydat = $ngaydat;
            //$donhang->created_at = now();
            $donhang->save();

            //insert thông tin chi tiết đơn hàng
            if (Session::get('cart') == true) {
                foreach (Session::get('cart') as $key => $cart) {
                    $chitietdonhang = new chitietdonhang(); //nếu để ngoài vòng lặp foreach mặc định khi insert sẽ lấy sản phẩm cuối cùng.
                    $chitietdonhang->don_hang_code = $checkout_code;
                    $chitietdonhang->product_id = $cart['product_id'];
                    $chitietdonhang->product_ten = $cart['product_ten'];
                    $chitietdonhang->product_anh = $cart['product_anh'];
                    $chitietdonhang->product_size = $cart['product_size'];

                    $chitietdonhang->productsize_id = $cart['productsize_id'];

                    $chitietdonhang->product_giaban = $cart['product_giaban'];
                    $chitietdonhang->product_quantity =  $cart['product_qty'];
                    $chitietdonhang->product_magiamgia =  $data['order_magiamgia'];
                    $chitietdonhang->product_phiship = $data['order_phivanchuyen'];
                    $chitietdonhang->save();
                }
            }
            // Session::forget('cart');
            // Session::forget('phiship');
            // Session::forget('coupon_code');


            //send đơn hàng
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $tieude_mail = "Đơn hàng đã đặt ngày" . ' ' . $now;
            $khachhang = khachhang::find(session()->get('khachhang_id'));
            $data['email'][] = $khachhang->khachhang_email;

            //lấy thông tin phí ship
            $phi_van_chuyen = session()->get('phiship');


            //lấy thông tin sản phẩm
            if (Session::get('cart') == true) {
                foreach (session()->get('cart') as $key => $cart_email) {
                    $cart_array[] = array(
                        'product_ten' => $cart_email['product_ten'],
                        'product_giaban' => $cart_email['product_giaban'],
                        'product_qty' => $cart_email['product_qty'],
                        'product_size' => $cart_email['product_size']
                    );
                }
            }


            //lấy thông tin vận chuyển 
            $shipping_array = array(
                'khachhang_ten' => $khachhang->khachhang_ten,
                'phi_van_chuyen' => $phi_van_chuyen,
                'shipping_ten' => $data['shipping_ten'],
                'shipping_sdt' => $data['shipping_sdt'],
                'shipping_email' => $data['shipping_email'],
                'shipping_hinhthuc' => $data['shipping_hinhthuc'],
                'shipping_diachi' => $data['shipping_diachi'],
                'tentp' => $data['shipping_matp'],
                'tenqh' => $data['shipping_maqh'],
                'tenxa' => $data['shipping_xaid'],
                'shipping_ghichu' => $data['shipping_ghichu']
            );

            //lấy mã giảm giá và mã đơn hàng
            $donhangcode_mail = array(
                'magiamgia_code' => $magiamgia_mail,
                'don_hang_code' => $checkout_code
            );

            Mail::send('user.email.send_donhang', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'donhangcode_mail' => $donhangcode_mail], function ($message) use ($tieude_mail, $data) {
                $message->to($data['email'])->subject($tieude_mail);
                $message->from($data['email'], $tieude_mail);
            });

            Session::forget('cart');
            Session::forget('phiship');
            Session::forget('coupon_code');
            Session::forget('diachi_tinh');
            Session::forget('diachi_quan');
            Session::forget('diachi_xa');
        } else {
            return redirect()->back()->with('message', 'Thanh toán thất bại do bạn chưa thêm địa chỉ thanh toán!!!');
        }
    }

    //xoá tính phí vận chuyển
    public function delete_phi_ship_checkout()
    {
        Session::forget('phiship');
        Session::forget('diachi_tinh');
        Session::forget('diachi_quan');
        Session::forget('diachi_xa');
        return redirect()->back();
    }


    //bumbummen99
    //insert thông tin 4 bảng shipping, đơn hàng, ctdh, payment
    public function dat_hang(Request $request) //post
    {
        //insert tt vận chuyển
        $data_ship = array();
        $data_ship['shipping_ten'] = $request->shipping_ten;
        $data_ship['shipping_email'] = $request->shipping_email;
        $data_ship['shipping_sdt'] = $request->shipping_sdt;
        $data_ship['shipping_diachi'] = $request->shipping_diachi;
        $data_ship['shipping_ghichu'] = $request->shipping_ghichu;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data_ship);

        Session::put('shipping_id', $shipping_id);

        //insert hình thức thanh toán

        $data_payment = array();
        $data_payment['payment_hinhthuc'] = $request->payment_name;
        $data_payment['payment_trangthai'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data_payment);

        //insert đơn hàng
        $order_data = array();
        $order_data['khachhang_id'] = Session::get('khachhang_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['don_hang_thanhtien'] = Cart::priceTotal(0);
        $order_data['don_hang_trangthai'] = 'Đang chờ xử lý';
        $don_hang_id = DB::table('tbl_don_hang')->insertGetId($order_data);

        //insert chi tiết đơn hàng
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_detail_data['don_hang_id'] = $don_hang_id;
            $order_detail_data['product_id'] = $v_content->id;
            $order_detail_data['product_ten'] = $v_content->name;
            $order_detail_data['product_anh'] = $v_content->options->image;
            $order_detail_data['product_size'] = $v_content->options->size;
            $order_detail_data['product_giaban'] = $v_content->price;
            $order_detail_data['product_quantity'] = $v_content->qty;
            DB::table('tbl_chitiet_don_hang')->insert($order_detail_data);
        }
        if ($data_payment['payment_hinhthuc'] == 1) {
            Cart::destroy();

            $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
            $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search

            return view('user.checkout.success_checkout')->with('category', $cate_product)->with('product', $all_product);
        }
        // if ($data_payment['payment_method'] == 1) {

        //     echo 'Thanh toán thẻ ATM';
        // } elseif ($data_payment['payment_method'] == 2) {
        //     Cart::destroy();

        //     $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        //     $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        //     return view('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        // } else {
        //     echo 'Thẻ ghi nợ';
        // }
    }

    //đăng nhập đăng kí, tt khách hàng
    //view đăng nhập, đăng kí tt khách hàng
    public function dangNhap_dangKi_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }
        return view('user.checkout.login_checkout')->with('category', $cate_product)->with('product', $all_product)->with(compact('count_cart_mini'));
    }
    //insert form đăng kí tt khách hàng
    public function them_tt_khachhang(Request $request) //post
    {

        $data = array();
        $data['khachhang_ten'] = $request->khachhang_ten;
        $data['khachhang_email'] = $request->khachhang_email;
        $data['khachhang_sdt'] = $request->khachhang_sdt;
        $data['khachhang_matkhau'] = md5($request->khachhang_matkhau);
        $data['khachhang_vip'] = $request->khachhang_vip;

        $khachhang_id = DB::table('tbl_khachhang')->insertGetId($data);

        Session::put('khachhang_id', $khachhang_id);
        Session::put('khachhang_ten', $request->khachhang_ten);
        return Redirect::to('/checkout');
    }
    //đăng xuất khi đã đăng nhập tk
    public function logout_checkout()
    {
        //Session::flush(); //huỷ tất cả các session tồn tại
        Session::forget('cart');
        Session::forget('phiship');
        Session::forget('coupon_code');
        Session::forget('khachhang_id');
        Session::forget('khachhang_ten');

        Session::forget('diachi_tinh');
        Session::forget('diachi_quan');
        Session::forget('diachi_xa');
        return Redirect::to('/login-checkout');
    }
    //đăng nhập khi có đã có tk
    public function login_khachhang(Request $request) //post
    {
        $session_cart = Session::get('cart');
        $email = $request->email_account;
        $matkhau = md5($request->matkhau_account);
        $result = DB::table('tbl_khachhang')->where('khachhang_email', $email)->where('khachhang_matkhau', $matkhau)->first();

        //nếu người dùng thêm mã giảm giá n

        if ($result) {
            Session::put('khachhang_id', $result->khachhang_id);
            Session::put('khachhang_ten', $result->khachhang_ten);
            if (session()->get('coupon_code') == true) {
                session()->forget('coupon_code'); //nếu đăng nhập với tk mà đã sử dụng mã thì huỷ mã đã thêm
                if ($session_cart) {
                    return Redirect::to('/checkout');
                } else {
                    return Redirect::to('/home');
                }
            } else {
                if ($session_cart) {
                    return Redirect::to('/checkout');
                } else {
                    return Redirect::to('/home');
                }
            }
            // if ($session_cart) {
            //     return Redirect::to('/checkout');
            // } else {
            //     return Redirect::to('/home');
            // }
            //return Redirect::to('/checkout');
        } else {
            // if (session()->get('coupon_code') == true){
            //     return Redirect::to('/login-checkout');
            // }
            return Redirect::to('/login-checkout')->with('error', 'Đăng nhập thất bại. Tên tài khoản hoặc mật khẩu không chính xác');
        }
    }
}