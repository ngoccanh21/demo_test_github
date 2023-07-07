@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Đặt hàng thành công</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Đặt hàng thành công</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div>
                Bạn đã đặt hàng thành công. Cảm ơn bạn đã tin tưởng và chọn giày thể thao MINOSS. Chúng tôi sẽ sớm liên hệ và gửi đơn hàng cho bạn. Thông tin chi tiết xin liên hệ sdt: <b>0396541220</b>.Xin cảm ơn!!!
            </div>
            <div style="margin: 30px 0px 0px 0px;text-align:center;">
                <a href="/home" style="font-weight: bold;font-size: 23px;">Tiếp tục mua hàng...</a>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection