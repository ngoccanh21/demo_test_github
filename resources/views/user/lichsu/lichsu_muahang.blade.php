@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Lịch sử mua hàng</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Lịch sử mua hàng</li>
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
                    <form>

                        <div class="table-content table-responsive">
                            <h4 style="font-size: 20px;">Lịch sử đơn hàng của: <span style="color: red;font-weight:bold;">{{$tenkh_donhang}}</span></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="">STT</th>
                                        <th class="cart-product-name">Mã đơn hàng</th>
                                        <th class="product-thumbnail">Ngày đặt hàng</th>
                                        <th class="product-price">Trạng thái đơn hàng</th>
                                        <th>Lý do huỷ đơn</th>
                                        <th class="product_remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donhang as $index => $order_pro)
                                    <tr class="tr-shadow" style="border: 1px solid black;">
                                        <td>{{$index+1}}</td>
                                        <td style="font-weight:bold;font-family: DejaVu Sans;">{{$order_pro->don_hang_code}}</td>
                                        <td>{{$order_pro->created_at}}</td>
                                        <td>
                                            <?php
                                            if ($order_pro->don_hang_trangthai == 0) {
                                            ?>
                                                <span class="status--process">Đang chờ xác nhận</span>
                                            <?php
                                            } elseif ($order_pro->don_hang_trangthai == 1) {
                                            ?>
                                                <span class="status--process">Đã xác nhận</span>
                                            <?php
                                            } elseif ($order_pro->don_hang_trangthai == 2) {
                                            ?>
                                                <span class="status--process">Đã giao hàng</span>
                                            <?php
                                            } elseif ($order_pro->don_hang_trangthai == 3) {
                                            ?>
                                                <span class="status--process" style="color: red;">Đơn hàng bị huỷ bởi shop</span>
                                            <?php
                                            } elseif ($order_pro->don_hang_trangthai == 4) {
                                            ?>
                                                <span class="status--process" style="color: red;">Đơn hàng đã bị huỷ bởi bạn</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="status--process">Đơn hàng đang xử lí</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($order_pro->don_hang_trangthai == 4) {
                                            ?>
                                                <span class="status--process">{{$order_pro->donhang_lydohuy}}</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span></span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{URL::to('/view-history-ctdh/'.$order_pro->don_hang_code)}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xem">
                                                    <i class="fa-sharp fa-regular fa-eye"></i>
                                                </a>
                                                @if($order_pro->don_hang_trangthai == 1 || $order_pro->don_hang_trangthai == 2 || $order_pro->don_hang_trangthai == 3|| $order_pro->don_hang_trangthai == 4)
                                                <span></span>
                                                @else
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#huydon">
                                                    Huỷ đơn hàng
                                                </button>
                                                @endif


                                                <!-- modal huỷ đơn hàng -->
                                                <div class="modal" id="huydon">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form>
                                                                @csrf
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Lý do huỷ đơn hàng</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" style="border:none;font-size:25px;background:white;">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <textarea required name="" class="li_do_huy_don" id="" rows="5" style="width:460px;" placeholder="Nhập lý do huỷ đơn"></textarea>
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                                    <button type="button" id="{{$order_pro->don_hang_code}}" class="btn btn-success" onclick="huyDonHang(this.id)">Gửi</button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- js modal huỷ đơn hàng -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Main Content Area End Here -->
@endsection