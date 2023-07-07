<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class cartController extends Controller
{
    //cart ajax
    //post
    public function add_to_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {

                if ($val['product_id'] == $data['cart_product_id'] && $val['product_size'] == $data['cart_product_size']) {
                    $is_avaiable++;
                    $cart[$key] = array(
                        'session_id' => $val['session_id'],
                        'product_id' => $val['product_id'],
                        'product_ten' => $val['product_ten'],
                        'product_anh' => $val['product_anh'],
                        'product_giaban' => $val['product_giaban'],
                        // 'product_soluong' => $val['cart_product_soluong'],
                        'product_size' => $val['product_size'],
                        'productsize_id' => $val['productsize_id'],
                        'product_qty' => $val['product_qty'] + $data['cart_product_qty'],
                    );
                    Session::put('cart', $cart);
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_ten' => $data['cart_product_ten'],
                    'product_anh' => $data['cart_product_anh'],
                    'product_giaban' => $data['cart_product_giaban'],
                    'product_soluong' => $data['cart_product_soluong'],
                    'product_size' => $data['cart_product_size'],
                    'productsize_id' => $data['cart_productsize_id'],
                    'product_qty' => $data['cart_product_qty'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_ten' => $data['cart_product_ten'],
                'product_anh' => $data['cart_product_anh'],
                'product_giaban' => $data['cart_product_giaban'],
                'product_soluong' => $data['cart_product_soluong'],
                'product_size' => $data['cart_product_size'],
                'productsize_id' => $data['cart_productsize_id'],
                'product_qty' => $data['cart_product_qty'],

            );
            Session::put('cart', $cart);
        }
        Session::save();
        //session()->flush(); // huỷ phiên session
    }
    //hiển thị cart ajax
    public function show_cart_ajax()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }


        return view('user.cart.show_cart_ajax')->with('category', $cate_product)->with('product', $all_product)->with(compact('count_cart_mini'));
    }
    //update cart ajax //post
    public function update_cart_ajax(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            $message = '';
            // foreach ($data['cart_qty'] as $key => $qty) {
            //     foreach ($cart as $session => $val) {

            //         if ($val['session_id'] == $key) { //nếu session_id = $key thì update qty sp đó
            //             $cart[$session]['product_qty'] = $qty;
            //         }
            //     }
            // }

            foreach ($data['cart_qty'] as $key => $qty) {
                $i = 0;
                foreach ($cart as $session => $val) {
                    $i++;

                    if ($val['session_id'] == $key && $qty <= $cart[$session]['product_soluong']) {

                        $cart[$session]['product_qty'] = $qty;
                        $message .= '<p style="color:green">' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_ten'] . ' thành công</p>';
                    } elseif ($val['session_id'] == $key && $qty > $cart[$session]['product_soluong']) {
                        $message .= '<p style="color:red">' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_ten'] . ' thất bại do số lượng sản phẩm còn lại không đủ.</p>';
                    }
                }
            }

            Session::put('cart', $cart);
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->back()->with('message', 'Cập nhật số lượng sản phẩm thất bại');
        }
    }
    //delete cart ajax
    public function delete_cart_ajax($session_id)
    {
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xóa sản phẩm thành công'); // back: quay trở lại trang vừa xoá
        } else {
            return redirect()->back()->with('message', 'Xóa sản phẩm thất bại');
        }
    }
    //delete all cart ajax
    public function delete_all_cart_ajax()
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            // Session::destroy();
            Session::forget('cart');
            Session::forget('coupon_code'); //huỷ session tên coupon_code
            Session::forget('phiship'); //huỷ session tên coupon_code
            return redirect()->back()->with('message', 'Xóa toàn bộ sản phẩm khỏi giỏ hàng thành công!!!');
        }
        //Session::destroy();
    }
    //xoá mã giảm giá
    public function delete_magiamgia_cart()
    {
        Session::forget('coupon_code');
        return redirect()->back()->with('message', 'Xóa mã giảm giá thành công!!!');;
    }


    //cart bumbummen99
    public function save_cart(Request $request) //post
    {
        //$cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();

        $productID = $request->product_id_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id', $productID)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_ten;
        $data['price'] = $product_info->product_giaban;
        $data['weight'] = $product_info->product_giaban;
        $data['options']['image'] = $product_info->product_anh;
        $data['options']['size'] = $product_info->product_id;
        Cart::add($data);
        //Cart::destroy();
        return Redirect::to('/cart');
    }

    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        return view('user.cart.show_cart')->with('category', $cate_product)->with('product', $all_product);
    }

    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0); //xet gtri bang 0
        return Redirect('/cart');
    }

    public function update_quantity(Request $request) //post
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect('/cart');
    }
}
