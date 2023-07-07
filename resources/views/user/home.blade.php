@extends('layout_user')
@section('content')
<!-- Begin Slider Area -->
<div class="slider-area">

    <!-- Main Slider -->
    <div class="swiper-container main-slider swiper-arrow with-bg_white">
        <div class="swiper-wrapper">

            @foreach($banner_home as $key=> $banner_h)
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner bg-height" data-bg-image="/upload/banner/{{$banner_h->banner_img}}">
                    <div class="parallax-img-wrap">
                        <div class="chilly">
                            <div class="scene fill">
                                <div class="expand-width" data-depth="0.2">
                                    <img src="/frontend/assets/images/banner/banner-2.jpg" alt="Inner Image">
                                </div>
                            </div>
                        </div>
                        <div class="avocado">
                            <div class="scene fill">
                                <div class="expand-width" data-depth="0.5">
                                    <img src="/frontend/assets/images/banner/banner-3.jpg" alt="Inner Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="parallax-with-content">
                            <div class="slide-content">
                                <span class="sub-title mb-3">MINOSS</span>
                                <!-- <h2 class="title mb-9">-40% Offer All <br> Products.</h2> -->
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-primary btn-white-hover rounded-0"
                                        href="/home">Mua Ngay</a>
                                </div>
                            </div>
                            <div class="parallax-img-wrap">
                                <div class="tomatoes">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.5">
                                            <img src="/frontend/assets/images/banner/banner2.png" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- <div class="swiper-slide animation-style-01">
                <div class="slide-inner bg-height" data-bg-image="/frontend/assets/images/banner/banner-1.jpg">
                    <div class="parallax-img-wrap">
                        <div class="chilly">
                            <div class="scene fill">
                                <div class="expand-width" data-depth="0.2">
                                    <img src="/frontend/assets/images/banner/banner1.png" alt="Inner Image">
                                </div>
                            </div>
                        </div>
                        <div class="avocado">
                            <div class="scene fill">
                                <div class="expand-width" data-depth="0.5">
                                    <img src="/frontend/assets/images/banner/banner3.png" alt="Inner Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="parallax-with-content">
                            <div class="slide-content">
                                <span class="sub-title mb-3">MINOSS</span>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-primary btn-white-hover rounded-0" href="/home">Mua Ngay</a>
                                </div>
                            </div>
                            <div class="parallax-img-wrap">
                                <div class="tomatoes">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.5">
                                            <img src="/frontend/assets/images/banner/banner-3.jpg" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination with-bg d-md-none"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>
<!-- Slider Area End Here -->

<!-- Begin Shipping Area -->
<div class="shipping-area section-space-top-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="shipping-item">
                    <div class="shipping-img">
                        <img src="/frontend/assets/images/shipping/icon/plane.png" alt="Shipping Icon">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Miễn phí vận chuyển</h5>
                        <p class="short-desc mb-0">Miễn phí vận chuyển cho đơn hàng từ 1.500.000 VND</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                <div class="shipping-item">
                    <div class="shipping-img">
                        <img src="/frontend/assets/images/shipping/icon/earphones.png" alt="Shipping Icon">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Hỗ trợ trực tuyến</h5>
                        <p class="short-desc mb-0">Hỗ trợ dịch vụ 24/7</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                <div class="shipping-item">
                    <div class="shipping-img">
                        <img src="/frontend/assets/images/shipping/icon/shield.png" alt="Shipping Icon">
                    </div>
                    <div class="shipping-content">
                        <h5 class="title">Thanh toán an toàn</h5>
                        <p class="short-desc mb-0">Thông tin khách hàng được bảo mật 100%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shipping Area End Here -->

<!-- Begin Product Area -->
<div class="product-area section-space-top-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav product-tab-nav pb-10">
                    <li style="text-transform: uppercase;font-size: 15px;font-weight:bold;">Danh sách loại giày</li>
                </ul>
                <br>
                <ul class="nav product-tab-nav pb-10" id="myTab" role="tablist">

                    @foreach($category as $key => $cate_pro)
                    <li class="nav-item">
                        <a class="active" id="all-items-tab"
                            href="{{URL::to('/loai-san-pham/'.$cate_pro->category_id)}}">
                            <div class="product-tab-icon">
                                <img src="/frontend/assets/images/product/icon/lgo.png" alt="Product Icon"
                                    style="width: 75px;height:75px;border-radius:60%;border:1px solid gray;">
                            </div>
                            {{$cate_pro->category_ten}}
                        </a>
                    </li>
                    @endforeach

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all-items" role="tabpanel"
                        aria-labelledby="all-items-tab">
                        <div class="product-item-wrap row">
                            @foreach($product as $key => $pro)
                            <div class="col-xl-3 col-lg-4 col-sm-6" style="margin:10px 0px 10px 0px;">
                                <div class="product-item">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$pro->product_id}}"
                                            class="cart_product_id_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_ten}}"
                                            class="cart_product_ten_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_anh}}"
                                            class="cart_product_anh_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_giaban}}"
                                            class="cart_product_giaban_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->category_id}}"
                                            class="cart_product_size_{{$pro->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">

                                        <!-- tăng lượt xem -->
                                        <input type="hidden" value="{{$pro->product_luotxem}}"
                                            class="product_luotxem_{{$pro->product_id}}">


                                        <div class="product-img img-zoom-effect">
                                            <a href="{{URL::to('/chi-tiet-san-pham-ajax/'.$pro->product_id)}}">
                                                <img class="img-full tangLuotXem" name="tangLuotXem"
                                                    src="upload/product/{{$pro->product_anh}}" id="{{$pro->product_id}}"
                                                    data-id_productluotxem="{{$pro->product_id}}" alt="Product Images"
                                                    style="height: 270px;width:300px;">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <!-- <button type="button" class="add-to-cart" name="add-to-cart" data-id_product="{{$pro->product_id}}" style="width:50px;height:50px;border:none;">
                                                            <i class="pe-7s-cart"></i>
                                                        </button> -->
                                                        <a href="/cart-ajax">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/cart-ajax">
                                                            <i class="pe-7s-shuffle"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name tangLuotXem"
                                                href="{{URL::to('/chi-tiet-san-pham-ajax/'.$pro->product_id)}}"
                                                id="{{$pro->product_id}}" data-id_productluotxem="{{$pro->product_id}}"
                                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">{{$pro->product_ten}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($pro->product_giaban)}}
                                                    VND</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            @endforeach
                            {{$product->links()}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fresh-fruits" role="tabpanel" aria-labelledby="fresh-fruits-tab">
                        <div class="product-item-wrap row">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-1-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Pepper Grains</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-sm-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-2-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Peanut Big Bean</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-lg-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-3-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Dried Lemon Green</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-xl-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-4-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Natural Coconut</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-5-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Peppepr Read</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-6-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Green Vegetable</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-7-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Lemon Juice</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-8-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Cow Milk & Meat</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="vegetable" role="tabpanel" aria-labelledby="vegetable-tab">
                        <div class="product-item-wrap row">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-1-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Pepper Grains</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-sm-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-2-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Peanut Big Bean</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-lg-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-3-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Dried Lemon Green</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-xl-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-4-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Natural Coconut</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-5-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Peppepr Read</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-6-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Green Vegetable</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-7-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Lemon Juice</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-8-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Cow Milk & Meat</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fish-meat" role="tabpanel" aria-labelledby="fish-meat-tab">
                        <div class="product-item-wrap row">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-1-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Pepper Grains</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-sm-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-2-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Peanut Big Bean</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-lg-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-3-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Dried Lemon Green</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-xl-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-4-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Natural Coconut</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-5-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Peppepr Read</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-6-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Green Vegetable</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-7-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Lemon Juice</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-8-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Cow Milk & Meat</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="wheat" role="tabpanel" aria-labelledby="wheat-tab">
                        <div class="product-item-wrap row">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-1-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Pepper Grains</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-sm-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-2-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Peanut Big Bean</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-lg-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-3-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Dried Lemon Green</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6 pt-xl-0">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-4-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Natural Coconut</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-5-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Black Peppepr Read</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-6-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Green Vegetable</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-7-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Lemon Juice</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="single-product.html">
                                            <img class="img-full"
                                                src="/frontend/assets/images/product/medium-size/1-8-270x300.jpg"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="single-product.html">Cow Milk & Meat</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$80.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<!-- Begin Banner Area -->
<!-- <div class="banner-area section-space-top-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-item">
                    <div class="banner-img img-zoom-effect">
                        <img class="img-full" src="/frontend/assets/images/banner/1-1-370x250.jpg" alt="Banner Image">
                        <div class="inner-content">
                            <h5 class="offer">-10% Off</h5>
                            <h4 class="title mb-5">Bell Pepper<br>Orange</h4>
                            <div class="button-wrap">
                                <a class="btn btn-primary btn-white-hover rounded-0" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                <div class="banner-item">
                    <div class="banner-img img-zoom-effect">
                        <img class="img-full" src="/frontend/assets/images/banner/1-2-370x250.jpg" alt="Banner Image">
                        <div class="inner-content">
                            <h5 class="offer">-20% Off</h5>
                            <h4 class="title mb-5">Fruit Juice<br>Package</h4>
                            <div class="button-wrap">
                                <a class="btn btn-custom-size btn-primary btn-white-hover rounded-0" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                <div class="banner-item">
                    <div class="banner-img img-zoom-effect">
                        <img class="img-full" src="/frontend/assets/images/banner/1-3-370x250.jpg" alt="Banner Image">
                        <div class="inner-content">
                            <h5 class="offer">-30% Off</h5>
                            <h4 class="title mb-5">Full Fresh<br>Vegetable</h4>
                            <div class="button-wrap">
                                <a class="btn btn-custom-size btn-primary btn-white-hover rounded-0" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner Area End Here -->

<!-- Begin Product Area -->
<!-- <div class="product-area section-space-y-axis-100">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">See Our Latest</span>
            <h2 class="title mb-0">Arrival Products</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container product-slider swiper-arrow with-radius border-issue">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product-item">
                                <div class="product-img img-zoom-effect">
                                    <a href="single-product.html">
                                        <img class="img-full" src="/frontend/assets/images/product/medium-size/1-9-270x300.jpg" alt="Product Images">
                                    </a>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html">
                                                    <i class="pe-7s-shuffle"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a class="product-name" href="single-product.html">Black Pepper Grains</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-item">
                                <div class="product-img img-zoom-effect">
                                    <a href="single-product.html">
                                        <img class="img-full" src="/frontend/assets/images/product/medium-size/1-10-270x300.jpg" alt="Product Images">
                                    </a>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html">
                                                    <i class="pe-7s-shuffle"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a class="product-name" href="single-product.html">Peanut Big Bean</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-item">
                                <div class="product-img img-zoom-effect">
                                    <a href="single-product.html">
                                        <img class="img-full" src="/frontend/assets/images/product/medium-size/1-11-270x300.jpg" alt="Product Images">
                                    </a>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html">
                                                    <i class="pe-7s-shuffle"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a class="product-name" href="single-product.html">Dried Lemon Green</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product-item">
                                <div class="product-img img-zoom-effect">
                                    <a href="single-product.html">
                                        <img class="img-full" src="/frontend/assets/images/product/medium-size/1-12-270x300.jpg" alt="Product Images">
                                    </a>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html">
                                                    <i class="pe-7s-shuffle"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a class="product-name" href="single-product.html">Natural Coconut</a>
                                    <div class="price-box pb-1">
                                        <span class="new-price">$80.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-nav-wrap">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Product Area End Here -->

<!-- Begin Banner Area -->
<div class="banner-area banner-with-parallax py-10" data-bg-image="/frontend/assets/images/banner/2-1-1920x523.jpg"
    style="margin:50px 0px 0px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="parallax-img-wrap">
                    <div class="papaya">
                        <div class="scene fill">
                            <div class="expand-width" data-depth="0.2">
                                <img src="/frontend/assets/images/banner/tintuc2.jpg" alt="Banner Images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 align-self-center">
                <div class="banner-content text-white text-center text-md-start">
                    <div class="section-title">
                        <span class="sub-title">Sản phẩm mới nhất</span>
                        <h2 class="title font-size-60 mb-6">Giảm 20%</h2>
                    </div>
                    <div class="countdown-wrap">
                        <div class="countdown item-4" data-countdown="2022/01/01" data-format="short">
                            <div class="countdown__item me-3">
                                <span class="countdown__time daysLeft"></span>
                                <span class="countdown__text daysText"></span>
                            </div>
                            <div class="countdown__item me-3">
                                <span class="countdown__time hoursLeft"></span>
                                <span class="countdown__text hoursText"></span>
                            </div>
                            <div class="countdown__item me-3">
                                <span class="countdown__time minsLeft"></span>
                                <span class="countdown__text minsText"></span>
                            </div>
                            <div class="countdown__item">
                                <span class="countdown__time secsLeft"></span>
                                <span class="countdown__text secsText"></span>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrap pt-10">
                        <a class="btn btn-custom-size lg-size btn-white rounded-0" href="/home">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Begin Product Area -->
<div class="product-area section-space-top-100">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">Sản phẩm được xem nhiều</span>
            <h2 class="title mb-0">Danh sách sản phẩm</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container product-list-slider border-issue">
                    <div class="swiper-wrapper">

                        @foreach($sanpham_view_nhieu as $key => $sp_view_nhieu)
                        <div class="swiper-slide">
                            <div class="product-list-item">

                                <!-- lượt xem sản phẩm -->
                                <input type="hidden" value="{{$sp_view_nhieu->product_id}}"
                                    class="cart_product_id_{{$sp_view_nhieu->product_id}}">
                                <input type="hidden" value="{{$sp_view_nhieu->product_luotxem}}"
                                    class="product_luotxem_{{$sp_view_nhieu->product_id}}">

                                <div class="product-img img-zoom-effect">
                                    <a href="{{URL::to('/chi-tiet-san-pham-ajax/'.$sp_view_nhieu->product_id)}}">
                                        <img class="img-full tangLuotXem" id="{{$sp_view_nhieu->product_id}}"
                                            data-id_productluotxem="{{$sp_view_nhieu->product_id}}"
                                            src="/upload/product/{{$sp_view_nhieu->product_anh}}" alt="Product Images"
                                            style="width:100px;height:100px;">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <a class="product-name"
                                        href="{{URL::to('/chi-tiet-san-pham-ajax/'.$sp_view_nhieu->product_id)}}">
                                        <div class="tangLuotXem" id="{{$sp_view_nhieu->product_id}}"
                                            data-id_productluotxem="{{$sp_view_nhieu->product_id}}"
                                            src="/upload/product/{{$sp_view_nhieu->product_anh}}"
                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">
                                            {{$sp_view_nhieu->product_ten}}</div>
                                    </a>
                                    <div class="price-box pb-1">
                                        <span
                                            class="new-price">{{number_format($sp_view_nhieu->product_giaban,0,',','.')}}
                                            vnđ</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="/cart-ajax">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<!-- Begin Blog Area -->
<div class="blog-area section-space-y-axis-100">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">Tin tức</span>
            <h2 class="title mb-0">Bài viết mới nhất</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container blog-slider">
                    <div class="swiper-wrapper">
                        @foreach($tintuc as $key=>$tin_t_home)
                        <div class="swiper-slide">
                            <form>
                                @csrf
                                <!-- lượt xem tin tức -->
                                <input type="hidden" value="{{$tin_t_home->tintuc_id}}"
                                    class="tintuc_id_{{$tin_t_home->tintuc_id}}">
                                <input type="hidden" value="{{$tin_t_home->tintuc_luotxem}}"
                                    class="tintuc_luotxem_{{$tin_t_home->tintuc_id}}">

                                <div class="blog-item">
                                    <div class="blog-img img-zoom-effect">

                                        <a href="{{URL::to('/chi-tiet-tin-tuc/'.$tin_t_home->tintuc_id)}}">
                                            <img class="img-full tangLuotXemTintuc"
                                                src="/upload/tintuc/{{$tin_t_home->tintuc_anh}}"
                                                id="{{$tin_t_home->tintuc_id}}"
                                                data-id_productluotxemtintuc="{{$tin_t_home->tintuc_id}}"
                                                alt="Blog Image" style="width:370px;height:315px;">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta text-dim-gray pb-3">
                                            <ul>
                                                <li class="date"><i
                                                        class="fa fa-calendar-o me-2"></i>{{$tin_t_home->tintuc_ngaydang}}
                                                </li>
                                                <!-- <li>
                                                <span class="comments me-3">
                                                    <a href="javascript:void(0)">2 Comments</a>
                                                </span>
                                                <span class="link-share">
                                                    <a href="javascript:void(0)">Share</a>
                                                </span>
                                            </li> -->
                                            </ul>
                                        </div>
                                        <h5 class="title mb-4">
                                            <a href="{{URL::to('/chi-tiet-tin-tuc/'.$tin_t_home->tintuc_id)}}">
                                                <div class="tangLuotXemTintuc" id="{{$tin_t_home->tintuc_id}}"
                                                    data-id_productluotxemtintuc="{{$tin_t_home->tintuc_id}}"
                                                    style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 300px;font-size:17px;">
                                                    {{$tin_t_home->tintuc_tieude}}</div>
                                            </a>
                                        </h5>
                                        <p class="short-desc mb-5">
                                        <div
                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 300px;">
                                            <?php
                                            echo strip_tags(html_entity_decode($tin_t_home->tintuc_noidung));
                                            // xoá thẻ html trong ckeditor
                                            ?></div>
                                        </p>
                                        <div class="button-wrap">
                                            <a id="{{$tin_t_home->tintuc_id}}"
                                                data-id_productluotxemtintuc="{{$tin_t_home->tintuc_id}}"
                                                class="btn btn-custom-size btn-dark btn-lg rounded-0 tangLuotXemTintuc"
                                                href="{{URL::to('/chi-tiet-tin-tuc/'.$tin_t_home->tintuc_id)}}">Đọc
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        @endforeach

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End Here -->
@stop