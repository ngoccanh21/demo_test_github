@extends('layout_user')
@section('content')
<style>
    .coupon-all .coupon2 .delete_all_cart {
        width: 200px;
        height: 41px;
        background: black;
        border: none;
        line-height: 36px;
    }

    .coupon-all .coupon2 .delete_all_cart a {
        font-weight: bold;
        font-size: 13px;
        text-transform: uppercase;
        color: white
    }

    .coupon2 .delete_all_cart:hover {
        background-color: #bac34e;
    }
</style>
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Giỏ hàng của bạn</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Giỏ Hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                    @endif
                    <form action="{{url('/update-cart-ajax')}}" method="post">
                        @csrf
                        @if(Session::get('cart')==true)
                        <div class="table-content table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product_remove">Thao tác</th>
                                        <th class="product-thumbnail">Ảnh sản phẩm</th>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="product-price">Giá bán</th>
                                        <th class="product-size">Kích cỡ</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Thành tiền</th>
                                        <th hidden="true">productsize_id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>

                                    @foreach(session()->get('cart') as $key =>$cart)
                                    <?php
                                    $subtotal = $cart['product_giaban'] * $cart['product_qty'];
                                    $total += $subtotal;
                                    ?>
                                    <tr>
                                        <td class="product_remove">
                                            <a href="{{URL('/delete-cart-ajax/'.$cart['session_id'])}}" class="delete-cart-ajax">
                                                <!-- <i class="pe-7s-close" title="Remove"></i> -->
                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="/upload/product/{{$cart['product_anh']}}" alt="Cart Thumbnail" style="width: 80px;height: 80px;">
                                            </a>
                                        </td>
                                        <td class="product-name"><a href="javascript:void(0)">{{$cart['product_ten']}}</a></td>
                                        <td class="product-price"><span class="amount">{{number_format($cart['product_giaban'],0,',','.')}} vnđ</span></td>
                                        <td class="product-size"><span class="amount">{{$cart['product_size']}}</span></td>
                                        <td class="quantity">
                                            <div class="">
                                                <!-- <input class="cart-plus-minus-box" value="1" type="text"> -->

                                                <input class="cart_quantity cart_quantity_input" min="1" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" style="width: 40px;text-align:center;">

                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">
                                                {{number_format($subtotal,0,',','.')}} vnđ
                                            </span>
                                        </td>
                                        <td hidden="true">{{$cart['productsize_id']}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="col-12">
                                <div class="coupon-all">
                                    <!-- <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Nhập mã giảm giá" type="text">
                                        <input class="button mt-xxs-30" name="apply_coupon" value="Áp dụng" type="submit">
                                    </div> -->
                                    <div class="coupon2">
                                        <input class="button" value="Cập nhật giỏ hàng" type="submit" name="update_cart_ajax">
                                        <button class="button delete_all_cart" name="delete_all_cart" type="button">
                                            <a href="{{url('/delete-all-cart-ajax')}}">Xoá toàn bộ giỏ hàng</a>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @else
                        <div style="text-align: center;color: #de1b1b;">
                            <p><b>Không có sản phẩm nào trong giỏ hàng.Bạn hãy tiếp tục mua sắm!!!</b></p>
                        </div>
                        @endif
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Nhập mã giảm giá" type="text">
                                        <input class="button mt-xxs-30" name="apply_coupon" value="Áp dụng" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Xoá toàn bộ giỏ hàng" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Tổng tiền giỏ hàng</h2>
                                    <ul>

                                        <?php
                                        if (session()->get('cart') == true && session()->get('coupon_code') != NULL) {
                                        ?>
                                            <li>Tổng tiền <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                            @foreach(Session::get('coupon_code') as $key => $cou)
                                            <?php
                                            if ($cou['magiamgia_loaigiamgia'] == 1) {
                                            ?>
                                                <li>Giảm giá <span>{{$cou['magiamgia_sotiengiam']}} %</span></li>
                                                <?php
                                                $total_coupon = ($total * $cou['magiamgia_sotiengiam']) / 100;
                                                ?>
                                                <li>Tổng tiền thanh toán<span>{{number_format($total-$total_coupon,0,',','.')}} vnđ</span></li>
                                            <?php
                                            } elseif ($cou['magiamgia_loaigiamgia'] == 2) {
                                            ?>
                                                <li>Giảm giá <span>{{number_format($cou['magiamgia_sotiengiam'],0,',','.')}} vnđ</span></li>
                                                <?php
                                                $total_coupon = $total - $cou['magiamgia_sotiengiam'];
                                                ?>
                                                <li>Tổng tiền thanh toán<span>{{number_format($total_coupon,0,',','.')}} vnđ</span></li>
                                            <?php
                                            }
                                            ?>
                                            @endforeach
                                        <?php
                                        } elseif (session()->get('cart') == true && session()->get('coupon_code') == NULL) {
                                        ?>
                                            <li>Tổng tiền thanh toán<span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                        <?php
                                        } else {
                                        ?>
                                            <?php
                                            session()->forget('coupon_code');
                                            session()->forget('phiship');
                                            ?>
                                            <li>Tổng tiền thanh toán<span>0 vnđ</span></li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                    <?php
                                    $khachhang_id = session()->get('khachhang_id');
                                    if ($khachhang_id != NULL) {
                                    ?>
                                        <?php
                                        if (session()->get('coupon_code')) {
                                        ?>
                                            <a href="{{url('/delete-magiamgia-cart')}}">Xoá mã giảm giá</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="{{url('/checkout')}}">Tiến hành thanh toán</a>
                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        if (session()->get('coupon_code')) {
                                        ?>
                                            <a href="{{url('/delete-magiamgia-cart')}}">Xoá mã giảm giá</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="{{url('/login-checkout')}}">Tiến hành thanh toán</a>
                                    <?php
                                    }
                                    ?>
                                    <!-- <a href="{{url('/login-checkout')}}">Tiến hành thanh toán</a> -->
                                </div>
                            </div>
                        </div>
                    </form>

                    @if(Session::get('cart'))
                    <form action="{{url('/check-coupon')}}" method="post">
                        @csrf
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Nhập mã giảm giá" type="text">
                                    <input class="button mt-xxs-30 check_coupon" name="check_coupon" value="Áp dụng" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection