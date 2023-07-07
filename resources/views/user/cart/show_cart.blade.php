@extends('layout_user')
@section('content')
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
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            @php
                            $content=Cart::content();
                            @endphp
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($content as $v_content)
                                    <tr>
                                        <td class="product_remove">
                                            <a href="{{URL('/delete-cart/'.$v_content->rowId)}}">
                                                <!-- <i class="pe-7s-close" title="Remove"></i> -->
                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="/upload/product/{{$v_content->options->image}}" alt="Cart Thumbnail" style="width: 80px;height: 80px;">
                                            </a>
                                        </td>
                                        <td class="product-name"><a href="javascript:void(0)">{{$v_content->name}}</a></td>
                                        <td class="product-price"><span class="amount">{{number_format($v_content->price). ' ' . 'VND'}}</span></td>
                                        <td class="product-size"><span class="amount">{{$v_content->options->size}}</span></td>
                                        <td class="quantity">
                                            <div class="">
                                                <!-- <input class="cart-plus-minus-box" value="1" type="text"> -->
                                                <form action="{{URL('/update_quantity')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input class="cart_quantity_input" type="number" name="cart_quantity" value="{{$v_content->qty}}" style="width: 40px;text-align:center;">
                                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                                    <input style="width:100px ;height:30px; background: #bac34e; color: white" type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                                </form>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal) . ' ' . 'VND';
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Tổng tiền giỏ hàng</h2>
                                    <ul>
                                        <li>Thuế <span>{{Cart::tax(0).' '.'VND'}}</span></li>
                                        <li>Tổng tiền <span>{{Cart::priceTotal(0,',','.').' '.'VND'}}</span></li>
                                    </ul>
                                    <?php
                                    $khachhang_id = session()->get('khachhang_id');
                                    if ($khachhang_id != NULL) {
                                    ?>
                                        <a href="{{url('/checkout')}}">Tiến hành thanh toán</a>
                                    <?php
                                    } else {
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
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection