<!DOCTYPE html>
<html lang="lang-en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xác nhận đơn hàng</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container" style="background:lightgreen;border-radius:12px;padding:15px;">
        <div class="col-md-12">
            <p style="text-align:center;color:#fff;">Đây là email tự động. Quý khách xin vui lòng không trả lời email này.</p>
            <div class="row" style="background:cadetblue;padding:15px;">
                <div class="col-md-6" style="text-align:center;color:#fff;font-weight:bold;font-size:30px;">
                    <h4 style="margin:0px;">Shop giày thể thao MINOSS</h4>
                </div>
                <div class="col-md-6 logo" style="color:#fff;">
                    <p>Chào bạn <strong style="color:#000;text-decoration:underline;">{{$shipping_array['khachhang_ten']}}</strong></p>
                </div>
                <div class="col-md-12">
                    <p style="color:#fff;font-size:17px;">Đơn hàng của bạn đã được shop xác nhận với các thông tin sau.</p>
                    <h4 style="color: #000;text-transform: uppercase;">Thông tin đơn hàng</h4>
                    <p>Mã đơn hàng: <strong style="text-transform: uppercase;color:#fff;">{{$donhangcode_mail['don_hang_code']}}</strong></p>
                    <p>Mã khuyến mãi đã áp dụng: <strong style="text-transform: uppercase;color:#fff;">{{$donhangcode_mail['magiamgia_code']}}</strong></p>
                    <p>Dịch vụ: <strong style="text-transform: uppercase;color:#fff;">Đặt hàng trực tuyến</strong></p>
                    <h4 style="text-transform: uppercase;color:#000;">Thông tin người nhận hàng</h4>
                    <p>Email:
                        @if($shipping_array['shipping_email']=='')
                        <span style="color: #fff;">Không có</span>
                        @else
                        <span style="color: #fff;">{{$shipping_array['shipping_email']}}</span>
                        @endif
                    </p>
                    <p>Họ tên người nhận hàng:
                        @if($shipping_array['shipping_ten']=='')
                        <span style="color: #fff;">{{$shipping_array['tenxa']}}, </span>
                        <span style="color: #fff;">{{$shipping_array['tenqh']}}, </span>
                        <span style="color: #fff;">{{$shipping_array['tentp']}}, </span>
                        @else
                        <span style="color: #fff;">{{$shipping_array['shipping_ten']}}, </span>
                        <span style="color: #fff;">{{$shipping_array['tenxa']}}, </span>
                        <span style="color: #fff;">{{$shipping_array['tenqh']}}, </span>
                        <span style="color: #fff;">{{$shipping_array['tentp']}}, </span>
                        @endif
                    </p>
                    <p>Địa chỉ nhận hàng:
                        @if($shipping_array['shipping_diachi']=='')
                        <span style="color: #fff;">Không có</span>
                        @else
                        <span style="color: #fff;">{{$shipping_array['shipping_diachi']}}</span>
                        @endif
                    </p>
                    <p>Số điện thoại:
                        @if($shipping_array['shipping_sdt']=='')
                        <span style="color: #fff;">Không có</span>
                        @else
                        <span style="color: #fff;">{{$shipping_array['shipping_sdt']}}</span>
                        @endif
                    </p>
                    <p>Ghi chú đơn hàng:
                        @if($shipping_array['shipping_ghichu']=='')
                        <span style="color: #fff;">Không có</span>
                        @else
                        <span style="color: #fff;">{{$shipping_array['shipping_ghichu']}}</span>
                        @endif
                    </p>
                    <p>Hình thức thanh toán: <strong style="text-transform: uppercase;color:#fff;">
                            @if($shipping_array['shipping_hinhthuc']==1)
                            <span style="color: #fff;">Thanh toán khi nhận hàng</span>
                            @else
                            <span style="color: #fff;">Thanh toán bằng thẻ ATM</span>
                            @endif
                        </strong></p>
                    <p style="color:#fff;">Nếu thông tin người nhận không có chúng tôi sẽ liên hệ người đăt để trao đổi thông tin đơn hàng</p>
                    <h4 style="text-transform: uppercase;color:#000;">Sản phẩm xác nhận bao gồm: </h4>
                    <table class="table table-striped" style="border:1px;">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Kích cỡ</th>
                                <th>Số lượng đặt</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total=0;
                            $subtotal=0;
                            $phi_ship = $shipping_array['phi_van_chuyen'];
                            $total_end =0;
                            @endphp

                            @foreach($cart_array as $index =>$cart)
                            @php
                            $subtotal = $cart['product_qty']*$cart['product_giaban'];
                            $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{$cart['product_ten']}}</td>
                                <td>{{number_format($cart['product_giaban'],0,',','.')}} vnđ</td>
                                <td>{{$cart['product_size']}}</td>
                                <td>{{$cart['product_qty']}}</td>
                                <td>{{number_format($subtotal,0,',','.')}} vnđ</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4">Tổng tiền: <span style="color:#e42121;">{{number_format($total,0,',','.')}} vnđ</span></td>
                            </tr>
                            <tr>
                                <td colspan="4">Phí vận chuyến: <span style="color:#e42121;">{{number_format($phi_ship,0,',','.')}} vnđ</span></td>
                            </tr>
                            <tr>
                                @php
                                $total_end = $total + $phi_ship;
                                @endphp
                                <td colspan="4">Tổng tiền thanh toán(chưa tính mã giảm giá): <span style="color:#e42121;">{{number_format($total_end,0,',','.')}} vnđ</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="color: #fff;text-align:center;font-size:17px;">Xem lịch sử đặt hàng và mua hàng <a href="{{url('/lich-su-mua-hang')}}" style="color: #e42121;" target="_blank">tại đây</a></p>
                <p style="color:#fff;">Chi tiết xin website: <a style="color: #e42121;" href="http://127.0.0.1:8000/home" target="_blank">Shop giày thể thao MINOSS</a>
                    hoặc liên hệ sdt: <span style="color: #e42121;">0396451220</span>
                </p>

            </div>
        </div>
    </div>


</body>

</html>