<!-- Begin Footer Area -->
<div class="footer-area">
    <div class="footer-top section-space-y-axis-100 text-black" data-bg-color="#e5ddcc">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <div class="footer-logo pb-4">
                            <a href="index.html">
                                <img src="/frontend/assets/images/logo/logo_chinh.png" alt="Logo" style="width: 165px; height: 150px; margin: -30px 0px -30px 0px">
                            </a>
                        </div>
                        <p class="short-desc mb-2">MiNOSS cam kết hàng thật 100%, nếu phát hiện hàng giả sẽ được hoàn tiền gấp đôi. </p>
                        <div class="widget-contact-info pb-6">
                            <ul>
                                <li>
                                    <i class="pe-7s-map-marker"></i>
                                    Nhân Hòa - Mỹ Hào - Hưng Yên
                                </li>
                                <li>
                                    <i class="pe-7s-mail"></i>
                                    <a href="">minoss@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="payment-method">
                            <a href="javascript:void(0)">
                                <img src="/harmic/assets/images/payment/1.png" alt="Payment Method">
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 pt-10 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="widget-title mb-5">Loại Giày</h3>
                        <ul class="widget-list-item">
                            @foreach($category as $item)
                            <li>
                                <a href="{{url('/loai-san-pham/'.$item->category_id)}}">{{$item->category_ten}}</a>
                            </li>
                            @endforeach
                            <!-- <li>
                                <a href="javascript:void(0)">FAQ</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Shipping</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Returns</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Order Status</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Gift Card Balance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Accessibility</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 pt-10 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="widget-title mb-5">Danh Mục</h3>
                        <ul class="widget-list-item">
                            <?php
                            $khachhang_id = session()->get('khachhang_id');
                            if ($khachhang_id != null) {
                            ?>
                                <li><a class="" href="{{url('/logout-checkout')}}">Đăng xuất</a></li>

                            <?php
                            } else {
                            ?>
                                <li><a class="" href="{{url('/login-checkout')}}">Đăng nhập | Đăng Kí</a></li>
                            <?php
                            }
                            ?>

                            <?php
                            $khachhang_id = session()->get('khachhang_id');
                            // $shipping_id = session()->get('shipping_id');
                            if ($khachhang_id != null) {
                            ?>
                                <li>
                                    <a href="/checkout">Thanh toán</a>
                                </li>
                            <?php

                            } else {
                            ?>
                                <li>
                                    <a href="/login-checkout">Thanh toán</a>
                                </li>
                            <?php
                            }
                            ?>

                            <li>
                                <a href="/cart-ajax">Giỏ Hàng</a>
                            </li>
                            <!-- <li>
                                <a href="javascript:void(0)">Validation</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Wishlist</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms of Use</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">FAQ</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pt-10 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="widget-title mb-5">Bản tin</h3>
                        <p class="short-desc">Đăng kí nhận các thông tin mới nhất về sản phẩm bằng các nhập email của bạn xuống bên dưới.</p>
                    </div>
                    <div class="widget-form-area">
                        <form class="widget-form" action="#">
                            <input class="input-field" type="email" autocomplete="off" placeholder="Nhập Email">
                            <div class="button-wrap pt-5">
                                <button class="btn btn-custom-size btn-primary btn-secondary-hover rounded-0" id="mc-submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3" data-bg-color="#bac34e">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <span class="copyright-text text-white">Bản quyền thuộc về <i class="fa fa-heart text-danger"></i> <a href="" target="_blank">MINOSS</a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End Here -->