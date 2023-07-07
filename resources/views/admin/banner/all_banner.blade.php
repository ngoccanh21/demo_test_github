@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Danh sách banner</span>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <!-- <h3 class="title-5 m-b-35">data table</h3> -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="/add-banner" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Thêm mới</a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <?php
                        $message = session()->get('message');
                        if ($message) {
                            echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                            session()->put('message', null);
                        }
                        ?>
                        <table class="table table-data2" id="myTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên banner</th>
                                    <th>Ảnh banner</th>
                                    <th>Trạng thái</th>
                                    <th style="text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_banner as $index => $banner)
                                <tr class="tr-shadow" style="border: 1px solid black;">
                                    <td style="line-height: 95px;">{{$index+1}}</td>
                                    <td>{{$banner->banner_ten}}</td>
                                    <td><img src="upload/banner/{{$banner->	banner_img}}" alt="" style="width: 100px;height: 100px;"></td>
                                    <td>
                                        <?php
                                        if ($banner->banner_trangthai == 0) {
                                        ?>
                                            <a href="{{URL::to('/unactive-banner/'.$banner->banner_id)}}"><i style="font-size: 23px;" class="fa-sharp fa-solid fa-eye-slash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="{{URL::to('/active-banner/'.$banner->banner_id)}}"><i style="font-size: 23px;" class="fa-solid fa-eye"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <!-- <a class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </a> -->
                                            <a href="{{URL::to('/edit-banner/'.$banner->banner_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc muốn xoá banner này không???')" href="{{URL::to('/delete-banner/'.$banner->banner_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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