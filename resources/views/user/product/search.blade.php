@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Sản phẩm liên quan</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>sản phẩm tìm kiếm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                            <!-- <li class="page-count">
                                <span>23</span> Product Found of <span>50</span>
                            </li> -->
                            <li class="page-count">
                                <span>Kết quả tìm kiếm</span>
                            </li>
                            <li class="short">
                                <select class="nice-select wide rounded-0">
                                    <option value="1">Sắp xếp</option>
                                    <!-- <option value="2">Sort by Popularity</option>
                                    <option value="3">Sort by Rated</option>
                                    <option value="4">Sort by Latest</option>
                                    <option value="5">Sort by High Price</option>
                                    <option value="6">Sort by Low Price</option> -->
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content text-charcoal pt-8">
                        <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                            <div class="product-grid-view row">
                                @foreach($search_product as $kq_search)
                                <div class="col-lg-3 col-sm-6 pt-6 pt-sm-0">
                                    <div class="product-item">
                                        <!-- lượt xem sản phẩm -->
                                        <input type="hidden" value="{{$kq_search->product_id}}" class="cart_product_id_{{$kq_search->product_id}}">
                                        <input type="hidden" value="{{$kq_search->product_luotxem}}" class="product_luotxem_{{$kq_search->product_id}}">

                                        <div class="product-img img-zoom-effect">
                                            <a href="{{URL::to('/chi-tiet-san-pham-ajax/'.$kq_search->product_id)}}">
                                                <img class="img-full tangLuotXem" id="{{$kq_search->product_id}}" data-id_productluotxem="{{$kq_search->product_id}}" src="upload/product/{{$kq_search->product_anh}}" alt="Product Images" style="height:270px;">
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
                                            <a class="product-name tangLuotXem" href="{{URL::to('/chi-tiet-san-pham-ajax/'.$kq_search->product_id)}}" id="{{$kq_search->product_id}}" data-id_productluotxem="{{$kq_search->product_id}}" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">{{$kq_search->product_ten}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($kq_search->product_giaban).' '.'VND'}}</span>
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
                                @foreach($search_product as $kq_search2)
                                <div class="col-12 pt-6">
                                    <div class="product-item">
                                        <div class="product-img img-zoom-effect">
                                            <!-- lượt xem sản phẩm -->
                                            <input type="hidden" value="{{$kq_search2->product_id}}" class="cart_product_id_{{$kq_search2->product_id}}">
                                            <input type="hidden" value="{{$kq_search2->product_luotxem}}" class="product_luotxem_{{$kq_search2->product_id}}">

                                            <a href="{{URL::to('/chi-tiet-san-pham-ajax/'.$kq_search2->product_id)}}">
                                                <img class="img-full tangLuotXem" id="{{$kq_search2->product_id}}" data-id_productluotxem="{{$kq_search2->product_id}}" src="upload/product/{{$kq_search2->product_anh}}" alt="Product Images" style="height: 270px;">
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
                                            <a class="product-name pb-2 tangLuotXem" href="{{URL::to('/chi-tiet-san-pham-ajax/'.$kq_search2->product_id)}}" id="{{$kq_search2->product_id}}" data-id_productluotxem="{{$kq_search2->product_id}}" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 400px;">{{$kq_search2->product_ten}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{number_format($kq_search2->product_giaban).' '.'VND'}}</span>
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
                                                echo strip_tags(html_entity_decode($kq_search2->product_mota));
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