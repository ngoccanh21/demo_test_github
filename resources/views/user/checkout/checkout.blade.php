@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <style>
    .col-md-12 .thanhtoangiohang button {
        width: 100%;
        height: 40px;
        border-radius: 5px;
        background: #010101;
        border: none;
        color: white;
        text-transform: uppercase;
    }

    .col-md-12 .thanhtoangiohang button:hover {
        background: rgb(186, 195, 78);
        color: #010101;
    }
    </style>
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-5.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Thanh toán</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <!-- <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text mb-1">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                                <form action="javascript:void(0)">
                                    <p class="form-row-first">
                                        <label class="mb-1">Username or email <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </p>
                                    <p class="lost-password"><a href="javascript:void(0)">Lost your password?</a></p>
                                </form>
                            </div>
                        </div>
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="javascript:void(0)">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    @if(Session::get('cart')==true && Session::get('khachhang_id')==true)
                    <form>
                        {{ csrf_field() }}
                        <div class="checkbox-form">
                            <h3>Thông tin vận chuyển đơn hàng</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label for="select" class=" form-control-label">Chọn tỉnh-thành phố</label>
                                        <select name="thanhpho" id="thanhpho" class="form-control choose thanhpho">
                                            <option value="">-----Chọn tỉnh/thành phố-----</option>
                                            @foreach($thanhpho as $key => $tp)
                                            <option value="{{$tp->matp}}">{{$tp->name_tp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label for="select" class=" form-control-label">Chọn quận-huyện</label>
                                        <select name="quanhuyen" id="quanhuyen" class="form-control choose quanhuyen">
                                            <option value="">-----Chọn quận/huyện-----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label for="select" class=" form-control-label">Chọn xã-phường</label>
                                        <select name="xaphuong" id="xaphuong" class="form-control xaphuong">
                                            <option value="">-----Chọn xã/phường-----</option>
                                        </select>
                                    </div>
                                </div>
                                @if(Session::get('cart'))
                                <div class="col-md-12">
                                    <div class="checkout-form-list thanhtoangiohang">
                                        <!-- <button type="submit">Thêm địa chỉ thanh toán</button> -->
                                        <input type="button" value="Thêm địa chỉ thanh toán" name="calculate_order"
                                            class="btn btn-primary btn-sm tinh_phi_van_chuyen">
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <?php
                                    if (session()->get('diachi_tinh') && session()->get('diachi_quan') && session()->get('diachi_xa')) {
                                        //chưa xong
                                        // echo session()->get('diachi_tinh');
                                        // echo session()->get('diachi_quan');
                                        // echo session()->get('diachi_xa');
                                    ?>

                                    <?php
                                    } else {
                                    ?>
                                    <!-- <span>chưa chọn địa chỉ thanh toán/span> -->
                                    <?php
                                    }
                                    ?>



                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </form>
                    @elseif(Session::get('cart')==null && Session::get('khachhang_id')==true)
                    <span style="color:red;font-size:20px;">Chưa có sản phẩm nào để thanh toán!</span>
                    @else
                    <span style="color:red;font-size:20px;">Bạn chưa đăng nhập. Hãy đăng nhập để thanh toán!</span>
                    @endif

                </div>

                <div class="col-lg-6 col-12">
                    @if(Session::get('cart')==true && Session::get('khachhang_id')==true)
                    <form method="post">
                        @csrf
                        <div class="checkbox-form">
                            <h3>Điền thông tin người nhận hàng</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label for="shipping_ten">Họ và tên <span class="required">*</span></label>
                                        <input placeholder="Họ tên" type="text" name="shipping_ten" class="shipping_ten"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label for="shipping_sdt">Số điện thoại<span class="required">*</span></label>
                                        <input placeholder="Số điện thoại" type="text" name="shipping_sdt"
                                            class="shipping_sdt" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label for="shipping_email">Email <span class="required">*</span></label>
                                        <input placeholder="Email" type="email" name="shipping_email"
                                            class="shipping_email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin: 0px 0px 20px 0px;">
                                    <div class="check-box">
                                        <label for="shipping_hinhthuc">
                                            <!-- <input type="checkbox" id="tt_nhan_hang" name="payment_name" value="1"> -->
                                            <span>Chọn hình thức thanh toán</span>
                                            <select name="shipping_hinhthuc" id=""
                                                class="form-control shipping_hinhthuc">
                                                <!-- <option value="0">-> Thanh toán bằng thẻ ATM <- </option> -->
                                                <option value="1">-> Thanh toán khi nhận hàng <- </option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label for="shipping_diachi">Địa chỉ nhận hàng <span
                                                class="required">*</span></label>
                                        <input placeholder="Địa chỉ" type="text" name="shipping_diachi"
                                            class="shipping_diachi" required="">

                                        <?php
                                        if ($dc_tinh != null && $dc_huyen != null && $dc_xa != null) {
                                        ?>
                                        <input type="hidden" name="shipping_matp" class="shipping_matp"
                                            value="{{$dc_tinh->name_tp}}">
                                        <input type="hidden" name="shipping_maqh" class="shipping_maqh"
                                            value="{{$dc_huyen->name_qh}}">
                                        <input type="hidden" name="shipping_xaid" class="shipping_xaid"
                                            value="{{$dc_xa->name_xaphuong}}">
                                        <?php
                                        } else {
                                        ?>
                                        <input type="hidden" name="shipping_matp" class="shipping_matp"
                                            value="không có">
                                        <input type="hidden" name="shipping_maqh" class="shipping_maqh"
                                            value="không có">
                                        <input type="hidden" name="shipping_xaid" class="shipping_xaid"
                                            value="không có">
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Ghi chú đơn hàng <span class="">*</span></label>
                                        <textarea name="shipping_ghichu" id="" rows="5"
                                            class="col-md-12 shipping_ghichu"
                                            style="resize: none;border:1px solid #f1f1f1"
                                            placeholder="Ghi chú"></textarea>
                                        <!-- <input placeholder="Ghi chú" type="text"> -->
                                    </div>
                                </div>


                                @if(Session::get('coupon_code'))
                                @foreach(Session::get('coupon_code') as $key => $cou)
                                <input type="hidden" name="order_magiamgia" class="order_magiamgia"
                                    value="{{$cou['magiamgia_code']}}">
                                @endforeach
                                @else
                                <input type="hidden" name="order_magiamgia" class="order_magiamgia" value="0">
                                @endif

                                @if(Session::get('phiship'))
                                <input type="hidden" name="order_phivanchuyen" class="order_phivanchuyen"
                                    value="{{Session::get('phiship')}}">
                                <div class="col-md-12">
                                    <div class="checkout-form-list thanhtoangiohang">
                                        <button type="button" name="send_order" class="send_order">Đặt hàng</button>
                                        <!-- <input type="button" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm send_order"> -->
                                    </div>
                                </div>
                                @else
                                <!-- <input type="hidden" name="order_phivanchuyen" class="order_phivanchuyen" value="35000"> -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list thanhtoangiohang">
                                        <h5 style="color:#e80d0d;font-weight:bold;">Bạn chưa thêm địa chỉ thanh toán!
                                            Hãy thêm địa chỉ thanh toán để đặt hàng.</h5>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </form>
                    @else
                    <span></span>
                    @endif
                </div>


                <div class="col-lg-12 col-12">
                    <div class="your-order">
                        <h3>Thông tin đơn hàng của bạn</h3>
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
                                            <th class="product-thumbnail">Tên sản phẩm</th>
                                            <th class="cart-product-name">Ảnh sản phẩm</th>
                                            <th class="product-price">Giá bán x Số lượng</th>
                                            <th class="product-size">Kích cỡ</th>
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
                                            <td class="product-name"><a
                                                    href="javascript:void(0)">{{$cart['product_ten']}}</a></td>
                                            <td class="product-thumbnail">
                                                <a href="javascript:void(0)">
                                                    <img src="/upload/product/{{$cart['product_anh']}}"
                                                        alt="Cart Thumbnail" style="width: 80px;height: 80px;">
                                                </a>
                                            </td>
                                            <td class="product-price"><span
                                                    class="amount">{{number_format($cart['product_giaban'],0,',','.')}}
                                                    vnđ</span><span> x {{$cart['product_qty']}} đôi</span></td>
                                            <td class="product-size"><span
                                                    class="amount">{{$cart['product_size']}}</span></td>
                                            <td class="product-subtotal">
                                                <span class="amount">
                                                    {{number_format($subtotal,0,',','.')}} vnđ
                                                </span>
                                            </td>
                                            <td hidden="productsize_id">{{$cart['productsize_id']}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>


                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Tổng tiền</h2>
                                        <ul>

                                            <?php
                                            if (session()->get('coupon_code') != NULL && session()->get('phiship') != NULL) {
                                            ?>
                                            <li>Tổng tiền <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                            @foreach(Session::get('coupon_code') as $key => $cou)
                                            <?php
                                                if ($cou['magiamgia_loaigiamgia'] == 1) {
                                                ?>
                                            <?php
                                                    $total_coupon = ($total * $cou['magiamgia_sotiengiam']) / 100; //số tiền đc giảm
                                                    $total_after_coupon = $total - $total_coupon; //tổng tiền sau khi áp mã nhưng chưa cộng phí vận chuyển
                                                    $phi_cvh = session()->get('phiship'); //phí ship
                                                    $total_end = $total_after_coupon + $phi_cvh; //tổng tiền sau cùng
                                                    ?>
                                            <li>Giảm giá <span>{{$cou['magiamgia_sotiengiam']}} %</span></li>
                                            <li>Phí vận chuyển
                                                <span>{{number_format($phi_cvh,0,',','.')}} vnđ
                                                    <a href="{{url('/delete-phi-ship-checkout')}}"
                                                        class="delete_tinh_phi_van_chuyen"
                                                        style="margin:0px 0px 0px 10px;padding:0px;color:black;font-size:20px;background:#f2f6f9;">
                                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li>Tổng tiền thanh toán<span>{{number_format($total_end,0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                                } elseif ($cou['magiamgia_loaigiamgia'] == 2) {
                                                ?>
                                            <?php
                                                    $total_after_coupon = $total - $cou['magiamgia_sotiengiam']; //tổng tiền sau khi áp mã giảm giá nhưng chưa cộng phí vận chuyển
                                                    $phi_cvh = session()->get('phiship'); //tiền ship
                                                    $total_end = $total_after_coupon + $phi_cvh; //tổng tiền sau cùng
                                                    ?>
                                            <li>Giảm giá <span>{{number_format($cou['magiamgia_sotiengiam'],0,',','.')}}
                                                    vnđ</span></li>
                                            <li>Phí vận chuyển
                                                <span>{{number_format($phi_cvh,0,',','.')}} vnđ
                                                    <a href="{{url('/delete-phi-ship-checkout')}}"
                                                        class="delete_tinh_phi_van_chuyen"
                                                        style="margin:0px 0px 0px 10px;padding:0px;color:black;font-size:20px;background:#f2f6f9;">
                                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                                    </a>
                                                </span>

                                            </li>
                                            <li>Tổng tiền thanh toán<span>{{number_format($total_end,0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                                }
                                                ?>
                                            @endforeach
                                            <?php
                                            } elseif (session()->get('coupon_code') == NULL && session()->get('phiship') != NULL) {
                                            ?>
                                            <?php
                                                $total_after_coupon = 0; //tổng tiền sau khi áp mã nhưng chưa cộng phí vận chuyển
                                                $phi_cvh = session()->get('phiship'); //phí ship
                                                $total_end = $total + $phi_cvh; //tổng tiền sau cùng
                                                ?>
                                            <li>Tổng tiền <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                            <li>Giảm giá <span>{{$total_after_coupon}} vnđ</span></li>
                                            <li>Phí vận chuyến
                                                <span>{{number_format($phi_cvh,0,',','.')}} vnđ
                                                    <a href="{{url('/delete-phi-ship-checkout')}}"
                                                        class="delete_tinh_phi_van_chuyen"
                                                        style="margin:0px 0px 0px 10px;padding:0px;color:black;font-size:20px;background:#f2f6f9;">
                                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li>Tổng tiền thanh toán<span>{{number_format($total_end,0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                            } elseif (session()->get('coupon_code') != NULL && session()->get('phiship') == NULL) {
                                            ?>
                                            <li>Tổng tiền <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                            @foreach(Session::get('coupon_code') as $key => $cou)
                                            <?php
                                                if ($cou['magiamgia_loaigiamgia'] == 1) {
                                                ?>
                                            <li>Giảm giá <span>{{$cou['magiamgia_sotiengiam']}} %</span></li>
                                            <?php
                                                    $total_coupon = ($total * $cou['magiamgia_sotiengiam']) / 100; //số tiền đc giảm
                                                    $total_after_coupon = $total - $total_coupon; //tổng tiền sau khi áp mã nhưng chưa cộng phí vận chuyển
                                                    $phi_cvh = 0; //phí ship
                                                    $total_end = $total_after_coupon + $phi_cvh; //tổng tiền sau cùng
                                                    ?>
                                            <li>Phí vận chuyển
                                                <span>{{number_format($phi_cvh,0,',','.')}} vnđ
                                                    <!-- <a href="{{url('/delete-phi-ship-checkout')}}" class="delete_tinh_phi_van_chuyen" style="margin:0px 0px 0px 10px;padding:0px;color:black;font-size:20px;background:#f2f6f9;">
                                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                                            </a> -->
                                                </span>
                                            </li>
                                            <li>Tổng tiền thanh toán<span>{{number_format($total_end,0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                                } elseif ($cou['magiamgia_loaigiamgia'] == 2) {
                                                ?>
                                            <li>Giảm giá <span>{{number_format($cou['magiamgia_sotiengiam'],0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                                    $total_coupon = $total - $cou['magiamgia_sotiengiam']; //tổng tiền sau khi áp mã giảm giá nhưng chưa cộng phí vận chuyển
                                                    $phi_cvh = 0; //tiền ship
                                                    $total_end = $total_coupon + $phi_cvh; //tổng tiền sau cùng
                                                    ?>
                                            <li>Phí vận chuyển
                                                <span>{{number_format($phi_cvh,0,',','.')}} vnđ
                                                    <!-- <a href="{{url('/delete-phi-ship-checkout')}}" class="delete_tinh_phi_van_chuyen" style="margin:0px 0px 0px 10px;padding:0px;color:black;font-size:20px;background:#f2f6f9;">
                                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                                            </a> -->
                                                </span>

                                            </li>
                                            <li>Tổng tiền thanh toán<span>{{number_format($total_end,0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                                }
                                                ?>
                                            @endforeach
                                            <?php
                                            } elseif (session()->get('coupon_code') == NULL && session()->get('phiship') == NULL) {
                                            ?>
                                            <?php
                                                //$total_coupon = 0; //số tiền đc giảm
                                                $total_after_coupon = 0; //tổng tiền sau khi áp mã nhưng chưa cộng phí vận chuyển
                                                $phi_cvh = 0; //phí ship
                                                $total_end = $total_after_coupon + $phi_cvh + $total; //tổng tiền sau cùng
                                                ?>
                                            <li>Tổng tiền <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                            <li>Giảm giá <span>{{number_format($total_after_coupon,0,',','.')}}
                                                    vnđ</span></li>
                                            <li>Phí vận chuyển <span>{{number_format($phi_cvh)}} vnđ</span></li>
                                            <li>Tổng tiền thanh toán <span>{{number_format($total_end,0,',','.')}}
                                                    vnđ</span></li>
                                            <?php
                                            }
                                            ?>

                                        </ul>

                                        <!-- <a href="{{url('/login-checkout')}}">Tiến hành thanh toán</a> -->
                                    </div>
                                </div>
                            </div>
                            @else
                            <div style="text-align: center;color: #de1b1b;">
                                <?php
                                session()->forget('coupon_code');
                                session()->forget('phiship');
                                session()->forget('diachi_tinh');
                                session()->forget('diachi_quan');
                                session()->forget('diachi_xa');
                                ?>
                                <p><b>Không có sản phẩm nào cần thanh toán.Bạn hãy tiếp tục mua sắm!!!</b></p>
                            </div>
                            @endif
                        </form>

                        <!-- <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment
                                                    reference. Your order won’t be shipped until the funds have cleared in
                                                    our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                    Cheque Payment
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment
                                                    reference. Your order won’t be shipped until the funds have cleared in
                                                    our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment
                                                    reference. Your order won’t be shipped until the funds have cleared in
                                                    our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input value="Place order" type="submit">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection