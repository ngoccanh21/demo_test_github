@extends('layout_admin')
@section('content')
<div class="main-content">
    <style>
        .row .col-lg-12 .m-b-30 table thead tr td {
            padding: 15px 0px 0px 30px;
        }
    </style>

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;">CHI TIẾT ĐƠN HÀNG: <span style="color: red;">{{$donhang_code->don_hang_code}}</span></span>
            <div class="row" style="margin: 20px 0px 0px 0px;">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Thông tin khách hàng</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block" src="/backend/images/icon/avatar-01.jpg" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1"><i class="fa fa-user"></i>Tên khách hàng: <span style="color: red;">{{$khachhang->khachhang_ten}}</span></h5>
                                <div class="location text-sm-center">
                                    <i class="fa fa-envelope"></i>Email: <span style="color: red;">{{$khachhang->khachhang_email}}</span>
                                </div>
                                <div class="location text-sm-center">
                                    <i class="fa fa-phone"></i>Số điện thoại: <span style="color: red;">{{$khachhang->khachhang_sdt}}</span>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>


                <div class="col-md-8">
                    <!-- DATA TABLE -->
                    <!-- <h3 class="title-5 m-b-35">data table</h3> -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <h3 style="color:#20a8d8;font-size:18px;text-transform: uppercase;">Thông tin người nhận hàng</h3>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <!-- <h3 style="color:#20a8d8;font-size:18px;text-transform: uppercase;">Thông tin người nhận hàng</h3> -->

                        <ul>
                            <li>Tên người nhận hàng: <span style="font-weight:bold;color:red;">{{$shipping->shipping_ten}}</span></li><br>
                            <li>Email nhận hàng: <a style="color:red;">{{$shipping->shipping_email}}</a></li><br>
                            <li>Số điện thoại: <span style="font-weight:bold;color:red;">{{$shipping->shipping_sdt}}</span></li><br>
                            <li>Địa chỉ nhận hàng: <span style="font-weight:bold;">{{$shipping->shipping_diachi}}, {{$shipping->shipping_tenxa}}, {{$shipping->shipping_tenqh}}, {{$shipping->shipping_tentp}}</span></li><br>
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
                        </ul>
                    </div>
                    <!-- END DATA TABLE -->
                </div>

                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30" style="box-shadow:none;">
                        <h5 style="color:#20a8d8;font-size:20px;font-weight:bold;text-transform: uppercase;margin:0px 0px 20px 0px;">Thông tin đơn hàng</h5>
                        <ul class="col-lg-4" style="margin: 20px 0px 20px 0px;">
                            <span style="font-weight: bold;text-transform: uppercase;font-size:17px;">Trạng thái đơn hàng</span>
                            <li style="list-style: none;">
                                @foreach($donhang as $key => $d_hang)
                                @if($d_hang->don_hang_trangthai==0)
                                <form>
                                    @csrf
                                    <select class="form-control chitiet_don_hang">

                                        <option id="{{$d_hang->don_hang_id}}" selected value="0">Đang chờ xác nhận</option>
                                        <option id="{{$d_hang->don_hang_id}}" value="1">Xác nhận đơn hàng</option>
                                        <!-- <option id="{{$d_hang->don_hang_id}}" value="2">Đã giao hàng</option> -->
                                        <option id="{{$d_hang->don_hang_id}}" value="3">Hủy đơn hàng</option>
                                    </select>
                                </form>

                                @elseif($d_hang->don_hang_trangthai==1)
                                <form>
                                    @csrf
                                    <select class="form-control chitiet_don_hang">

                                        <option id="{{$d_hang->don_hang_id}}" selected value="1">Xác nhận đơn hàng</option>
                                        <option id="{{$d_hang->don_hang_id}}" value="2">Đã giao hàng</option>
                                        <!-- <option id="{{$d_hang->don_hang_id}}" value="3">Hủy đơn hàng</option> -->
                                    </select>
                                </form>
                                @elseif($d_hang->don_hang_trangthai==2)
                                <form>
                                    @csrf
                                    <select class="form-control chitiet_don_hang">

                                        <!-- <option id="{{$d_hang->don_hang_id}}" value="1" disabled>Đang chờ xác nhận</option> -->
                                        <option id="{{$d_hang->don_hang_id}}" selected value="2" hidden="true">Đã giao hàng</option>
                                        <!-- <option id="{{$d_hang->don_hang_id}}" value="3" disabled>Hủy đơn hàng</option> -->
                                    </select>
                                </form>

                                @elseif($d_hang->don_hang_trangthai==3)
                                <form>
                                    @csrf
                                    <select class="form-control chitiet_don_hang" style="color: red;">


                                        <option id="{{$d_hang->don_hang_id}}" selected value="3" hidden='true' style="color: red;">Hủy đơn hàng</option>
                                    </select>
                                </form>
                                @endif
                                @endforeach

                                @if($d_hang->don_hang_trangthai==0)
                                <span class="chitiet_don_hang">Đang chờ xác nhận</span>
                                @elseif($d_hang->don_hang_trangthai==1)
                                <span class="chitiet_don_hang">Xác nhận đơn hàng</span>
                                @elseif($d_hang->don_hang_trangthai==2)
                                <span class="chitiet_don_hang">Đang giao hàng</span>
                                @elseif($d_hang->don_hang_trangthai==3)
                                <span class="chitiet_don_hang" style="color: red;font-weight:bold;">Bị hủy bởi shop</span>
                                @elseif($d_hang->don_hang_trangthai==4)
                                <span class="chitiet_don_hang" style="color: red;font-weight:bold;">Bị huỷ bởi khách hàng đơn hàng</span>
                                @else
                                <span class="chitiet_don_hang">đang xử lí</span>
                                @endif
                            </li>
                        </ul>

                        <table class="table table-borderless table-striped table-earning" style="background-color: white;">
                            <thead>
                                <tr>
                                    <!-- <th>STT</th> -->
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng còn</th>
                                    <th>Size</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Mã giảm giá</th>
                                    <th>Thành tiền</th>
                                    <!-- <th>tổng tiền</th> -->
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
                                    <td>{{$ctdh->product_ten}}</td>
                                    <td><img src="/upload/product/{{$ctdh->product_anh}}" alt="" style="height: 50px;width: 50px;"></td>
                                    <td>{{$ctdh->productsize_id_soluong->quantity}}</td>
                                    <td>{{$ctdh->product_size}}</td>
                                    <td>{{number_format($ctdh->product_giaban,0,',','.')}} VND</td>
                                    <td>
                                        <input type="number" class="donhang_qty_{{$ctdh->product_id}}" name="product_quantity" disabled style="width:40px;" value="{{$ctdh->product_quantity}}">


                                        <input type="hidden" name="donhang_qty_storage" class="donhang_qty_storage_{{$ctdh->product_id}}" value="{{$ctdh->product->product_soluong}}">
                                        <input type="hidden" name="don_hang_code" class="don_hang_code" value="{{$ctdh->don_hang_code}}">
                                        <input type="hidden" name="donhang_product_id" class="donhang_product_id" value="{{$ctdh->product_id}}">
                                        <input type="hidden" name="donhang_productsize_id" class="donhang_productsize_id" value="{{$ctdh->productsize_id}}">
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
                                    <td>Tổng tiền: <span style="color: red;">{{number_format($total,0,',','.')}}</span> vnđ</td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td>
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

                                        <!-- <input type="hidden" class="donhang_total_{{$ctdh->product_id}}" name="product_total" value="{{$total+$ctdh->product_phiship-$magiamgia_sotiengiam}}"> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: white;">Phí vận chuyển: <span style="color: red;">{{number_format($ctdh->product_phiship,0,',','.')}}</span> vnđ</td>
                                </tr>
                                <tr>
                                    <td style="background-color: white;">Tổng tiền thanh toán: <span style="color: red;">{{number_format($total_after_end,0,',','.')}}</span> vnđ</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black;background: black;text-align: center;line-height: 35px;padding:5px 0px;">
                                        <a target="_blank" href="{{url('/print-donhang/'.$ctdh->don_hang_code)}}" style="color:white;text-transform: uppercase;">
                                            <i class="fa-solid fa-file-pdf"></i>In đơn hàng
                                        </a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>{{$ngaytao_dh->created_at}}</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Bản quyền thuộc về <a href="">MINOSS</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop