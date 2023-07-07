@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Danh sách đơn hàng</span>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <!-- <h3 class="title-5 m-b-35">data table</h3> -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <!-- <a href="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>
                                Thêm mới
                            </a> -->
                        </div>
                        <form action="{{url('export-csv-donhang')}}" method="POST">
                            @csrf

                            <button type="submit" name="export_csv" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="fa-sharp fa-solid fa-file-csv">Xuất file Excel</i>
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2" id="myTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Lý do huỷ đơn</th>
                                    <th style="text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donhang as $index => $order_pro)
                                <tr class="tr-shadow" style="border: 1px solid black;">
                                    <td>{{$index+1}}</td>
                                    <td>{{$order_pro->donhang_kh->khachhang_ten}}</td>
                                    <td>{{$order_pro->created_at}}</td>
                                    <td style="font-weight:bold;font-family: DejaVu Sans;">{{$order_pro->don_hang_code}}</td>
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
                                            <span class="status--process" style="color: red;">Huỷ bởi shop</span>
                                        <?php
                                        } elseif ($order_pro->don_hang_trangthai == 4) {
                                        ?>
                                            <span class="status--process" style="color: red;">Huỷ bởi khách hàng</span>
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
                                        if ($order_pro->don_hang_trangthai == 3) {
                                        ?>
                                            <span>Huỷ bởi shop</span>
                                        <?php
                                        } elseif ($order_pro->don_hang_trangthai == 4) {
                                        ?>
                                            <span>{{$order_pro->donhang_lydohuy}}</span>
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
                                            <a href="{{URL::to('/view-ctdh/'.$order_pro->don_hang_code)}}" class="item" data-toggle="tooltip" data-placement="top" title="Xem">
                                                <i class="fa-sharp fa-regular fa-eye"></i>
                                            </a>
                                            <a href="" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
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