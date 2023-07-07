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
                    <!-- DATA TABLE -->
                    <h4 style="font-size: 20px;">Lịch sử đơn hàng của: <span style="color: red;font-weight:bold;">{{$tenkh_donhang}}</span></h4>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <h3 style="color:#20a8d8;font-size:18px;text-transform: uppercase;">Mã đơn hàng: <span style="color: red;font-weight:bold;font-family: DejaVu Sans;">{{$donhang_code->don_hang_code}}</span></h3>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <h5 style="color:#20a8d8;font-size:18px;text-transform: uppercase;">Thông tin người nhận hàng</h5>

                        <ul>
                            <li>Tên người nhận hàng: <span style="font-weight:bold;color:red;">{{$shipping->shipping_ten}}</span></li><br>
                            <li>Email nhận hàng: <a style="color:red;">{{$shipping->shipping_email}}</a></li><br>
                            <li>Số điện thoại: <span style="font-weight:bold;color:red;">{{$shipping->shipping_sdt}}</span></li><br>
                            <li>Địa chỉ nhận hàng: <span style="font-weight:bold;">{{$shipping->shipping_diachi}}</span></li><br>
                            <li>Ghi chú đơn hàng: <span style="font-weight:bold;">{{$shipping->shipping_ghichu}}</span></li><br>
                            <li>Hình thức thanh toán:
                                <?php
                                if ($shipping->shipping_hinhthuc == 0) {
                                ?>
                                    <span style="font-weight:bold;">Thanh toán bằng thẻ ATM</span>
                                <?php
                                } else if ($shipping->shipping_hinhthuc == 1) {
                                ?>
                                    <span style="font-weight:bold;">Thanh toán khi nhận hàng</span>
                                <?php
                                } else {
                                ?>
                                    <span style="font-weight:bold;">Chưa xác định được hình thức thanh toán</span>
                                <?php
                                }
                                ?>
                            </li>
                            <br>
                            <li>Trạng thái đơn hàng:
                                @if($donhang->don_hang_trangthai==1)
                                <span class="chitiet_don_hang" style="font-weight: bold;">Đang chờ xác nhận</span>
                                @elseif($donhang->don_hang_trangthai==2)
                                <span class="chitiet_don_hang" style="font-weight: bold;">Đã giao hàng</span>
                                @elseif($donhang->don_hang_trangthai==3)
                                <span class="chitiet_don_hang" style="font-weight: bold;color:red;">Đã huỷ bởi shop</span>
                                @elseif($donhang->don_hang_trangthai==0)
                                <span class="chitiet_don_hang" style="font-weight: bold;">Chờ xác nhận</span>
                                @elseif($donhang->don_hang_trangthai==4)
                                <span class="chitiet_don_hang" style="font-weight: bold;color:red;">Đã huỷ bởi bạn</span>
                                @else
                                <span class="chitiet_don_hang" style="font-weight: bold;">Đang xử lí</span>
                                @endif
                            </li>
                        </ul>
                        <br>
                    </div>
                    <!-- END DATA TABLE -->
                </div>

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
                        <h5>Thông tin sản phẩm: </h5>
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="">STT</th>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="product-thumbnail">Ảnh sản phẩm</th>
                                        <th>Size</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th>Mã giảm giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                    @foreach($chitiet_donhang as $index => $ctdh)
                                    @php
                                    $subtotal = $ctdh->product_giaban * $ctdh->product_quantity;
                                    $total += $subtotal;
                                    @endphp
                                    <tr style="border-bottom: 1px solid #ac8d8d;" class="color_qty_{{$ctdh->product_id}}">
                                        <td>{{$index+1}}</td>
                                        <td>{{$ctdh->product_ten}}</td>
                                        <td><img src="/upload/product/{{$ctdh->product_anh}}" alt="" style="height: 50px;width: 50px;"></td>
                                        <td>{{$ctdh->product_size}}</td>
                                        <td>{{number_format($ctdh->product_giaban,0,',','.')}} VND</td>
                                        <td>
                                            <input type="number" class="donhang_qty_{{$ctdh->product_id}}" name="product_quantity" disabled style="width:40px;" value="{{$ctdh->product_quantity}}">


                                            <input type="hidden" name="donhang_qty_storage" class="donhang_qty_storage_{{$ctdh->product_id}}" value="{{$ctdh->product->product_soluong}}">
                                            <input type="hidden" name="don_hang_code" class="don_hang_code" value="{{$ctdh->don_hang_code}}">
                                            <input type="hidden" name="donhang_product_id" class="donhang_product_id" value="{{$ctdh->product_id}}">
                                        </td>
                                        <td>
                                            <?php
                                            if ($ctdh->product_magiamgia != '0') {
                                            ?>
                                                <span style="color: red;">{{$ctdh->product_magiamgia}}</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span style="color: red;">Không áp dụng</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>{{number_format($subtotal,0,',','.')}} VND</td>
                                    </tr>
                                    @endforeach
                                    <tr style="background-color: white;">
                                        <td colspan="8">Tổng tiền: <span style="color: red;">{{number_format($total,0,',','.')}}</span> vnđ</td>
                                    </tr>
                                    <tr style="background-color: white;">
                                        <td colspan="8">
                                            Giảm giá
                                            @php
                                            $total_after_end = 0;
                                            @endphp

                                            @if($magiamgia_loaigiamgia==1)

                                            @php
                                            $total_coupon = ($total*$magiamgia_sotiengiam)/100;
                                            echo '<span style="color:red;">: '.number_format($total_coupon,0,',','.').'</span> vnđ</br>';
                                            $total_after_end = $total + $ctdh->product_phiship - $total_coupon ;
                                            @endphp

                                            @else

                                            @php
                                            echo '<span style="color:red;">: '.number_format($magiamgia_sotiengiam,0,',','.').'</span> vnđ</br>';
                                            $total_after_end = $total + $ctdh->product_phiship - $magiamgia_sotiengiam ;
                                            @endphp

                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="background-color: white;">Phí vận chuyển: <span style="color: red;">{{number_format($ctdh->product_phiship,0,',','.')}}</span> vnđ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="background-color: white;">Tổng tiền thanh toán: <span style="color: red;">{{number_format($total_after_end,0,',','.')}}</span> vnđ</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection