@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Danh sách mã giảm giá</span>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <!-- <h3 class="title-5 m-b-35">data table</h3> -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="/add-magiamgia" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Thêm mới</a>
                        </div>

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <?php
                        $message = session()->get('message');
                        if ($message) {
                            echo '<div class="col-12 col-md-9 alert alert-success" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                            session()->put('message', null);
                        }
                        ?>
                        <table class="table table-data2" id="myTable">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <!-- <th>STT</th> -->
                                    <th>Tên mã giảm giá</th>
                                    <th>Code mã giảm giá</th>
                                    <!-- <th>Loại mã giảm giá</th> -->
                                    <th>Số lượng mã giảm</th>
                                    <th>Số tiền hay % mã giảm</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Hết hạn</th>
                                    <!-- <th>now</th> -->
                                    <th>Gửi mã</th>
                                    <th style="text-align: center;">Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_magiamgia as $index => $ma_giam_gia)
                                <tr class="tr-shadow" style="border: 1px solid black;font-size:12px">
                                    <!-- <td>{{$index+1}}</td> -->
                                    <td style="vertical-align: inherit;">{{$ma_giam_gia->magiamgia_ten}}</td>
                                    <td>{{$ma_giam_gia->magiamgia_code}}</td>

                                    <td>{{$ma_giam_gia->magiamgia_soluong}}</td>
                                    <td>
                                        <?php
                                        if ($ma_giam_gia->magiamgia_loaigiamgia == 1) {
                                        ?>
                                        {{$ma_giam_gia->magiamgia_sotiengiam}} %
                                        <?php
                                        } else {
                                        ?>
                                        {{number_format($ma_giam_gia->magiamgia_sotiengiam,0,',','.')}} vnđ
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>{{$ma_giam_gia->magiamgia_ngaybatdau}}</td>
                                    <td>{{$ma_giam_gia->magiamgia_ngayketthuc}}</td>
                                    <td>
                                        <?php
                                        if ($ma_giam_gia->magiamgia_trangthai == 0) {
                                        ?>
                                        <a href="{{URL::to('/unactive-magiamgia/'.$ma_giam_gia->magiamgia_id)}}"><i
                                                style="font-size: 23px;color:red;"
                                                class="fa-sharp fa-solid fa-eye-slash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                        <a href="{{URL::to('/active-magiamgia/'.$ma_giam_gia->magiamgia_id)}}"><i
                                                style="font-size: 23px;" class="fa-solid fa-eye"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        @if($ma_giam_gia->magiamgia_ngayketthuc>=$now_mgg)
                                        <span style="color: green;">Còn hạn</span>
                                        @else
                                        <span style="color: red;">Đã hết hạn</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($ma_giam_gia->magiamgia_ngayketthuc>=$now_mgg)
                                        <a href="{{url('/send-magiamgia',[
                                            'magiamgia_code'=>$ma_giam_gia->magiamgia_code,
                                            'magiamgia_soluong'=>$ma_giam_gia->magiamgia_soluong,
                                            'magiamgia_loaigiamgia'=>$ma_giam_gia->magiamgia_loaigiamgia,
                                            'magiamgia_sotiengiam'=>$ma_giam_gia->magiamgia_sotiengiam
                                            ])}}" class=""
                                            style="font-size: 12px;border:1px solid blue;margin:5px;padding:5px;">
                                            <i class="fas fa-group"></i>
                                        </a>
                                        <a href="{{url('/send-magiamgia-vip',[
                                            'magiamgia_code'=>$ma_giam_gia->magiamgia_code,
                                            'magiamgia_soluong'=>$ma_giam_gia->magiamgia_soluong,
                                            'magiamgia_loaigiamgia'=>$ma_giam_gia->magiamgia_loaigiamgia,
                                            'magiamgia_sotiengiam'=>$ma_giam_gia->magiamgia_sotiengiam
                                            ])}}" class=""
                                            style="font-size: 12px;border:1px solid blue;margin:5px;padding:5px;">
                                            <i class="fas fa-user"></i>
                                        </a>
                                        @else
                                        <span style="color: red;"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <!-- <a class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </a> -->
                                            <a onclick="return confirm('Bạn có chắc muốn xoá mã giảm giá này không???')"
                                                href="{{URL::to('/delete-magiamgia/'.$ma_giam_gia->magiamgia_id)}}"
                                                class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                            <!-- <a class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </a> -->
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