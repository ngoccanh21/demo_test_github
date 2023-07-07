@extends('layout_user')
@section('content')
@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Loại giày</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Danh sách sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3 order-lg-1 order-2 pt-10 pt-lg-0">
                    <div class="sidebar-area">
                        <div class="widgets-searchbox mb-9">
                            <form id="widgets-searchbox" action="#">
                                <input class="input-field" type="text" placeholder="Tìm kiếm">
                                <button class="widgets-searchbox-btn" type="submit">
                                    <i class="pe-7s-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Refine By</h2>
                            <div class="widgets-item">
                                <ul class="widgets-checkbox">
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="refine-item">
                                        <label class="label-checkbox mb-0" for="refine-item">On Sale
                                            <span>4</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="refine-item-2" checked>
                                        <label class="label-checkbox mb-0" for="refine-item-2">New
                                            <span>4</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="refine-item-3">
                                        <label class="label-checkbox mb-0" for="refine-item-3">In Stock
                                            <span>4</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets-area widgets-filter mb-9">
                            <h2 class="widgets-title mb-5">Lọc giá sản phẩm</h2>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <button class="btn btn-primary btn-secondary-hover">Filter</button>
                                    <div class="label-input position-relative">
                                        <label>price : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Color</h2>
                            <div class="widgets-item">
                                <ul class="widgets-checkbox">
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-1">
                                        <label class="label-checkbox mb-0" for="color-selection-1">Green
                                            <span>7</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-2" checked>
                                        <label class="label-checkbox mb-0" for="color-selection-2">Cream
                                            <span>3</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-3">
                                        <label class="label-checkbox mb-0" for="color-selection-3">Blue
                                            <span>4</span>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="color-selection-4">
                                        <label class="label-checkbox mb-0" for="color-selection-4">Black
                                            <span>6</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Size</h2>
                            <div class="widgets-item">
                                <ul class="widgets-checkbox">
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-1">
                                        <label class="label-checkbox mb-0" for="size-selection-1">XL</label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-2" checked>
                                        <label class="label-checkbox mb-0" for="size-selection-2">L</label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-3">
                                        <label class="label-checkbox mb-0" for="size-selection-3">SM</label>
                                    </li>
                                    <li>
                                        <input class="input-checkbox" type="checkbox" id="size-selection-4">
                                        <label class="label-checkbox mb-0" for="size-selection-4">XXL</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">Top Rated Products</h2>
                            <div class="widgets-item">
                                <div class="swiper-container widgets-list-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product-list-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.html">
                                                        <img class="img-full" src="assets/images/product/small-size/1-1-112x124.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name" href="single-product.html">Black Pepper Grains</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$80.00</span>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-list-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.html">
                                                        <img class="img-full" src="assets/images/product/small-size/1-2-112x124.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name" href="single-product.html">Peanut Big Bean</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$80.00</span>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-list-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product.html">
                                                        <img class="img-full" src="assets/images/product/small-size/1-3-112x124.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name" href="single-product.html">Dried Lemon Green</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$80.00</span>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widgets-area">
                            <h2 class="widgets-title mb-5">Tag</h2>
                            <div class="widgets-item">
                                <ul class="widgets-tags">
                                    <li>
                                        <a href="javascript:void(0)">Clothing</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Accessories</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">For Men</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Women</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Fashion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-12 order-lg-2 order-1">
                    <div class="product-topbar">
                        <ul>
                            <li class="product-view-wrap">
                                <ul class="nav" role="tablist">
                                    <li class="grid-view" role="presentation">
                                        <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                            <i class="fa fa-th"></i>
                                        </a>
                                    </li>
                                    <li class="list-view" role="presentation">
                                        <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                            <i class="fa fa-th-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="page-count">
                                <span>23</span> Sản phẩm của <span>50</span>
                            </li>
                            <li class="short">
                                <form>
                                    @csrf
                                    <select class="" name="sort" id="sort" style="border: none;">
                                        <option value="{{Request::url()}}?sort_by=none">Lọc</option>
                                        <option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
                                        <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
                                        <option value="{{Request::url()}}?sort_by=ky_az">Từ A đến Z</option>
                                        <option value="{{Request::url()}}?sort_by=ky_za">Từ Z đến A</option>
                                    </select>
                                </form>

                            </li>
                        </ul>
                    </div>
                    <div class="tab-content text-charcoal pt-8">
                        <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                            <div class="product-grid-view row">

                                @foreach($category_by_id as $key => $lsp_by_id)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img img-zoom-effect">
                                            <!-- lượt xem sản phẩm -->
                                            <input type="hidden" value="{{$lsp_by_id->product_id}}" class="cart_product_id_{{$lsp_by_id->product_id}}">
                                            <input type="hidden" value="{{$lsp_by_id->product_luotxem}}" class="product_luotxem_{{$lsp_by_id->product_id}}">

                                            <a href="{{URL::to('/chi-tiet-san-pham-ajax/'.$lsp_by_id->product_id)}}">
                                                <img class="img-full tangLuotXem" id="{{$lsp_by_id->product_id}}" data-id_productluotxem="{{$lsp_by_id->product_id}}" src="/upload/product/{{$lsp_by_id->product_anh}}" alt="Product Images" style="height: 270px;">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="/cart-ajax">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
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
                                            <a class="product-name tangLuotXem" href="{{URL::to('/chi-tiet-san-pham-ajax/'.$lsp_by_id->product_id)}}" id="{{$lsp_by_id->product_id}}" data-id_productluotxem="{{$lsp_by_id->product_id}}" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">{{$lsp_by_id->product_ten}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($lsp_by_id->product_giaban)}} VND</span>
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
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                            <div class="product-list-view row">

                                @foreach($category_by_id as $key => $lspby_id)
                                <div class="col-12 pt-6">
                                    <div class="product-item">
                                        <div class="product-img img-zoom-effect">
                                            <!-- lượt xem sản phẩm -->
                                            <input type="hidden" value="{{$lspby_id->product_id}}" class="cart_product_id_{{$lspby_id->product_id}}">
                                            <input type="hidden" value="{{$lspby_id->product_luotxem}}" class="product_luotxem_{{$lspby_id->product_id}}">

                                            <a href="{{URL::to('/chi-tiet-san-pham-ajax/'.$lspby_id->product_id)}}">
                                                <img class="img-full tangLuotXem" id="{{$lspby_id->product_id}}" data-id_productluotxem="{{$lspby_id->product_id}}" src="/upload/product/{{$lsp_by_id->product_anh}}" src="/upload/product/{{$lspby_id->product_anh}}" alt="Product Images" style="height: 270px;">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="/cart-ajax">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
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
                                        <div class="product-content align-self-center">
                                            <a class="product-name pb-2 tangLuotXem" href="{{URL::to('/chi-tiet-san-pham-ajax/'.$lspby_id->product_id)}}" id="{{$lspby_id->product_id}}" data-id_productluotxem="{{$lspby_id->product_id}}">{{$lspby_id->product_ten}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($lspby_id->product_giaban)}} VND</span>
                                            </div>
                                            <div class="rating-box pb-2">
                                                <ul>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                    <li><i class="pe-7s-star"></i></li>
                                                </ul>
                                            </div>
                                            <p class="short-desc mb-0">
                                                <?php
                                                echo strip_tags(html_entity_decode($lspby_id->product_mota));
                                                // xoá thẻ html trong ckeditor
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="pagination-area pt-10">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span class="fa fa-chevron-left"></span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span class="fa fa-chevron-right"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->

@endsection