<header class="main-header_area position-relative">
    <div class="header-top border-bottom d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="header-top-left">
                        <ul class="dropdown-wrap text-matterhorn">
                            <!-- <li class="dropdown">
                                <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    English
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageButton">
                                    <li><a class="dropdown-item" href="#">French</a></li>
                                    <li><a class="dropdown-item" href="#">Italian</a></li>
                                    <li><a class="dropdown-item" href="#">Spanish</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown">
                                <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="currencyButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    USD
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="currencyButton">
                                    <li><a class="dropdown-item" href="#">GBP</a></li>
                                    <li><a class="dropdown-item" href="#">ISO</a></li>
                                </ul>
                            </li> -->
                            <li>
                                SDT
                                <a href="">0396541220</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-top-right text-matterhorn">
                        <p class="shipping mb-0">Miễn phí vận chuyển cho đơn hàng từ <span>1.500.000 VND</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="header-middle-wrap">
                        <a href="index.html" class="header-logo">
                            <img src="/frontend/assets/images/logo/logo_chinh.png" alt="Header Logo" style="margin: -30px 0px -30px 0px; height: 120px">
                        </a>
                        <div class="header-search-area d-none d-lg-block">
                            <form action="{{url('/tim-kiem')}}" class="header-searchbox" method="post">
                                {{csrf_field()}}
                                <select class="nice-select select-search-category wide">
                                    <option value="all">Tất cả sản phẩm</option>
                                    <option value="product-item">Product Item</option>
                                    <option value="product-item-2">Product Item 02</option>
                                    <option value="product-item-3">Product Item 03</option>
                                    <option value="product-item-4">Product Item 04</option>
                                    <option value="product-item-5">Product Item 05</option>
                                </select>
                                <div id="myDropdown" class="dropdown-content">
                                    <div class="header-search">
                                        <span class="headerSearch-content">Sản phẩm gợi ý</span>
                                    </div>
                                    @foreach($product as $ketqua_timkiem)
                                    <!-- lượt xem sản phẩm -->
                                    <input type="hidden" value="{{$ketqua_timkiem->product_id}}" class="cart_product_id_{{$ketqua_timkiem->product_id}}">
                                    <input type="hidden" value="{{$ketqua_timkiem->product_luotxem}}" class="product_luotxem_{{$ketqua_timkiem->product_id}}">

                                    <a class="tangLuotXem" id="{{$ketqua_timkiem->product_id}}" data-id_productluotxem="{{$ketqua_timkiem->product_id}}" href="{{URL::to('/chi-tiet-san-pham-ajax/'.$ketqua_timkiem->product_id)}}">
                                        <div class="search-content">
                                            <div class="search-content-img">
                                                <img src="/upload/product/{{$ketqua_timkiem->product_anh}}" alt="">

                                            </div>
                                            <div class="search-noidung">
                                                <span class="nameSearch">{{$ketqua_timkiem->product_ten}}</span><br>
                                                <span class="priceSearch">Giá bán:<span style="color: #d0021b; font-size: 17px; padding: 0px 3px 0px 15px">{{number_format($ketqua_timkiem->product_giaban)}}</span>VND</span>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach

                                </div>
                                <input class="input-field" type="text" placeholder="Nhập sản phẩm bạn tìm kiếm..." id="myInput" name="search_input" onkeyup="filterFunction()" onclick="myFunction()">
                                <button class="btn btn-outline-whisper btn-primary-hover" type="submit"><i class="pe-7s-search"></i></button>
                                <!-- <input class="input-field" type="text" name="search_input" placeholder="Tìm kiếm sản phẩm">
                                <button class="btn btn-outline-whisper btn-primary-hover" type="submit"><i class="pe-7s-search"></i></button> -->
                            </form>
                        </div>
                        <div class="header-right">
                            <ul>
                                <li class="dropdown d-none d-md-block">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                        <?php
                                        echo session()->get('khachhang_ten');
                                        ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButton">

                                        <?php
                                        $khachhang_id = session()->get('khachhang_id');
                                        if ($khachhang_id != null) {
                                        ?>
                                            <li><a class="dropdown-item" href="{{url('/logout-checkout')}}">Đăng xuất</a></li>
                                            <li><a class="dropdown-item" href="{{url('/lich-su-mua-hang')}}">Lịch sử mua hàng</a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a class="dropdown-item" href="{{url('/login-checkout')}}">Đăng nhập | Đăng Kí</a></li>
                                        <?php
                                        }
                                        ?>

                                        <!-- <li><a class="dropdown-item" href="">Tài Khoản</a></li>
                                        <li><a class="dropdown-item" href="">Đăng nhập | Đăng kí</a></li> -->
                                    </ul>
                                </li>

                                <li class="d-none d-md-block">
                                    <a href="">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                                <li class="d-block d-lg-none">
                                    <a href="#searchBar" class="search-btn toolbar-btn">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </li>
                                <li class="minicart-wrap me-3 me-lg-0">
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <i class="pe-7s-shopbag"></i>
                                        <span class="quantity">{{$count_cart_mini}}</span>
                                    </a>
                                </li>
                                <li class="mobile-menu_wrap d-block d-lg-none">
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                        <i class="pe-7s-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header header-sticky" data-bg-color="#bac34e">
        <div class="container">
            <div class="main-header_nav position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-12 d-none d-lg-block">
                        <div class="main-menu">
                            <nav class="main-nav">
                                <ul>
                                    <li class="drop-holder">
                                        <a href="/home">Trang chủ
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <!-- <ul class="drop-menu">
                                            <li>
                                                <a href="index.html">Home One</a>
                                            </li>
                                            <li>
                                                <a href="index-2.html">Home Two</a>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li>
                                        <a href="">Tin tức</a>
                                    </li>
                                    <li class="megamenu-holder">
                                        <a href="javascript:void(0)">Cửa hàng
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <ul class="drop-menu megamenu">
                                            <li>
                                                <span class="title">Loại sản phẩm</span>
                                                <ul>
                                                    @foreach($category as $key => $lsp)
                                                    <li>
                                                        <a href="{{URL::to('/loai-san-pham/'.$lsp->category_id)}}">{{$lsp->category_ten}}</a>
                                                    </li>
                                                    @endforeach
                                                    <!-- <li>
                                                        <a href="shop-left-sidebar.html">Shop Left Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-list-fullwidth.html">Shop List Fullwidth</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                                    </li> -->
                                                </ul>
                                            </li>
                                            <li class="menu-slider-wrap">
                                                <div class="swiper-container menu-slider">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide img-zoom-effect with-overlay">
                                                            <a href="#" class="single-item">
                                                                <img class="img-full" src="/frontend/assets/images/banner/banner1.png" alt="Megamenu Slider">
                                                            </a>
                                                        </div>
                                                        <div class="swiper-slide img-zoom-effect with-overlay">
                                                            <a href="#" class="single-item">
                                                                <img class="img-full" src="/frontend/assets/images/banner/banner1.png" alt="Megamenu Slider">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="title">Chức năng liên quan</span>
                                                <ul>

                                                    <?php
                                                    $khachhang_id = session()->get('khachhang_id');
                                                    if ($khachhang_id != null) {
                                                    ?>
                                                        <li>
                                                            <a href="{{url('/logout-checkout')}}">Đăng xuất</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{url('/lich-su-mua-hang')}}">Lịch sử mua hàng</a>
                                                        </li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li>
                                                            <a href="{{url('/login-checkout')}}">Đăng nhập | Đăng kí</a>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>

                                                    <!-- <li>
                                                        <a href="/login-checkout">Tài khoản</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('/login-checkout')}}">Đăng nhập | Đăng kí</a>
                                                    </li> -->
                                                    <li>
                                                        <a href="/cart-ajax">Giỏ hàng</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Sản phẩm yêu thích</a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="">Compare</a>
                                                    </li> -->

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

                                                    <!-- <li>
                                                        <a href="/checkout">Thanh toán</a>
                                                    </li> -->
                                                </ul>
                                            </li>
                                            <li class="menu-slider-wrap">
                                                <div class="swiper-container menu-slider">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide img-zoom-effect with-overlay">
                                                            <a href="#" class="single-item">
                                                                <img class="img-full" src="/frontend/assets/images/banner/banner1.png" alt="Megamenu Slider">
                                                            </a>
                                                        </div>
                                                        <div class="swiper-slide img-zoom-effect with-overlay">
                                                            <a href="#" class="single-item">
                                                                <img class="img-full" src="/frontend/assets/images/banner/banner1.png" alt="Megamenu Slider">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li class="drop-holder">
                                        <a href="javascript:void(0)">Pages
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <ul class="drop-menu">
                                            <li>
                                                <a href="faq.html">Frequently Questions</a>
                                            </li>
                                            <li>
                                                <a href="404.html">Error 404</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="drop-holder">
                                        <a href="javascript:void(0)">Blog
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <ul class="drop-menu">
                                            <li class="sub-dropdown-holder">
                                                <a href="javascript:void(0)">Blog Holder</a>
                                                <ul class="drop-menu sub-dropdown">
                                                    <li>
                                                        <a href="blog.html">Blog Default</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sub-dropdown-holder">
                                                <a href="javascript:void(0)">Blog Detail Holder</a>
                                                <ul class="drop-menu sub-dropdown">
                                                    <li>
                                                        <a href="blog-detail.html">Blog Detail Default</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-detail-left-sidebar.html">Blog Detail Left Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-detail-right-sidebar.html">Blog Detail Right Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a href="/lienhe">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-body">
            <div class="inner-body">
                <div class="offcanvas-top">
                    <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                </div>
                <div class="offcanvas-user-info text-center px-6 pb-5">
                    <div class=" text-silver">
                        <p class="shipping mb-0">Free delivery on order over <span class="text-primary">$200</span></p>
                    </div>
                    <ul class="dropdown-wrap justify-content-center text-silver">
                        <li class="dropdown dropup">
                            <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                English
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageButtonTwo">
                                <li><a class="dropdown-item" href="#">French</a></li>
                                <li><a class="dropdown-item" href="#">Italian</a></li>
                                <li><a class="dropdown-item" href="#">Spanish</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropup">
                            <button class="btn btn-link dropdown-toggle ht-btn usd-dropdown" type="button" id="currencyButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                USD
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="currencyButtonTwo">
                                <li><a class="dropdown-item" href="#">GBP</a></li>
                                <li><a class="dropdown-item" href="#">ISO</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropup">
                            <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="pe-7s-users"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                                <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                <li><a class="dropdown-item" href="login-register.html">Login | Register</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="wishlist.html">
                                <i class="pe-7s-like"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-menu_area">
                    <nav class="offcanvas-navigation">
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <span class="mm-text">Home
                                        <i class="pe-7s-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="index.html">
                                            <span class="mm-text">Home One</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">
                                            <span class="mm-text">Home Two</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a href="">
                                    <span class="mm-text">About Us</span>
                                </a>
                            </li> -->
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <span class="mm-text">Cửa hàng
                                        <i class="pe-7s-angle-down"></i>
                                    </span>
                                </a>
                                <!-- <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Shop Layout
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="shop.html">
                                                    <span class="mm-text">Shop Default</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-leftsidebar.html">
                                                    <span class="mm-text">Shop Left Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-rightsidebar.html">
                                                    <span class="mm-text">Shop Right Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-list-fullwidth.html">
                                                    <span class="mm-text">Shop List Fullwidth</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-list-left-sidebar.html">
                                                    <span class="mm-text">Shop List Left Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-list-right-sidebar.html">
                                                    <span class="mm-text">Shop List Right Sidebar</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Product Style
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="single-product.html">
                                                    <span class="mm-text">Single Product Default</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="single-product-group.html">
                                                    <span class="mm-text">Single Product Group</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="single-product-variable.html">
                                                    <span class="mm-text">Single Product Variable</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="single-product-sale.html">
                                                    <span class="mm-text">Single Product Sale</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="single-product-sticky.html">
                                                    <span class="mm-text">Single Product Sticky</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="single-product-affiliate.html">
                                                    <span class="mm-text">Single Product Affiliate</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Product Related
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="my-account.html">
                                                    <span class="mm-text">My Account</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="login-register.html">
                                                    <span class="mm-text">Login | Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <span class="mm-text">Shopping Cart</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">
                                                    <span class="mm-text">Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html">
                                                    <span class="mm-text">Compare</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="checkout.html">
                                                    <span class="mm-text">Checkout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="menu-item-has-children">
                                <a href="">
                                    <span class="mm-text">Cửa hàng
                                        <i class="pe-7s-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="faq.html">
                                            <span class="mm-text">Frequently Questions</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="404.html">
                                            <span class="mm-text">Error 404</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="">
                                    <span class="mm-text">Tin tức
                                        <i class="pe-7s-angle-down"></i>
                                    </span>
                                </a>
                                <!-- <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Blog Holder
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="blog.html">
                                                    <span class="mm-text">Blog Default</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-left-sidebar.html">
                                                    <span class="mm-text">Blog Left Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-right-sidebar.html">
                                                    <span class="mm-text">Blog Right Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-list-left-sidebar.html">
                                                    <span class="mm-text">Blog List Left Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-list-right-sidebar.html">
                                                    <span class="mm-text">Blog List Right Sidebar</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Blog Detail Holder
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="blog-detail.html">
                                                    <span class="mm-text">Blog Detail Default</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-detail-left-sidebar.html">
                                                    <span class="mm-text">Blog Detail Left Sidebar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-detail-right-sidebar.html">
                                                    <span class="mm-text">Blog Detail Right Sidebar</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li>
                                <a href="/lienhe">
                                    <span class="mm-text">Liên hệ</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-search_wrapper" id="searchBar">
        <div class="offcanvas-body">
            <div class="container h-100">
                <div class="offcanvas-search">
                    <div class="offcanvas-top">
                        <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                    </div>
                    <span class="searchbox-info">Start typing and press Enter to search</span>
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search">
                        <button class="search-btn" type="submit"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- mini cart -->
    <!-- <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-body">
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4 class="mb-0">Shopping Cart</h4>
                    <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                </div>
                <ul class="minicart-list">
                    <li class="minicart-product">
                        <a class="product-item_remove" href="#"><i class="pe-7s-close"></i></a>
                        <a href="shop.html" class="product-item_img">
                            <img class="img-full" src="/frontend/assets/images/product/small-size/1-1-112x124.jpg" alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop.html">Black Pepper Grains</a>
                            <span class="product-item_quantity">1 x $80.00</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="#"><i class="pe-7s-close"></i></a>
                        <a href="shop.html" class="product-item_img">
                            <img class="img-full" src="/frontend/assets/images/product/small-size/1-2-112x124.jpg" alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop.html">Peanut Big Bean</a>
                            <span class="product-item_quantity">1 x $80.00</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="#">
                            <i class="pe-7s-close"></i>
                        </a>
                        <a href="shop.html" class="product-item_img">
                            <img class="img-full" src="/frontend/assets/images/product/small-size/1-3-112x124.jpg" alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop.html">Dried Lemon Green</a>
                            <span class="product-item_quantity">1 x $80.00</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">$240.00</span>
            </div>
            <div class="group-btn_wrap d-grid gap-2">
                <a href="cart.html" class="btn btn-secondary btn-primary-hover">View Cart</a>
                <a href="checkout.html" class="btn btn-secondary btn-primary-hover">Checkout</a>
            </div>
        </div>
    </div> -->
    <div class="global-overlay"></div>
</header>