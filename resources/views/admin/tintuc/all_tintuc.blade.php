@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Danh sách loại sản phẩm</span>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <!-- <h3 class="title-5 m-b-35">data table</h3> -->
                    <div class="table-data__tool">

                        <div class="table-data__tool-right">
                            <a href="/add-tintuc" class="au-btn au-btn-icon au-btn--green au-btn--small">
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
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung tin tức</th>
                                    <th>Ảnh tin tức</th>
                                    <th>Ngày đăng</th>
                                    <th>Trạng thái</th>
                                    <th style="text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_tintuc as $index => $t_tuc)
                                <tr class="tr-shadow" style="border: 1px solid black;">
                                    <td style="line-height: 65px;">{{$index+1}}</td>
                                    <td>
                                        <div style="text-transform: capitalize;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 150px;">
                                            {{$t_tuc->tintuc_tieude}}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">
                                            <?php
                                            echo strip_tags(html_entity_decode($t_tuc->tintuc_noidung));
                                            // xoá thẻ html trong ckeditor
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="upload/tintuc/{{$t_tuc->tintuc_anh}}" alt="" style="width: 70px;height: 70px;">
                                    </td>
                                    <td>{{$t_tuc->tintuc_ngaydang}}</td>
                                    <td>
                                        <?php
                                        if ($t_tuc->tintuc_trangthai == 0) {
                                        ?>
                                            <a href="{{URL::to('/unactive-tintuc/'.$t_tuc->tintuc_id)}}"><i style="font-size: 23px;" class="fa-sharp fa-solid fa-eye-slash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="{{URL::to('/active-tintuc/'.$t_tuc->tintuc_id)}}"><i style="font-size: 23px;" class="fa-solid fa-eye"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <!-- <a class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </a> -->
                                            <a href="{{URL::to('/edit-tintuc/'.$t_tuc->tintuc_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc muốn xoá tin tức này không???')" href="{{URL::to('/delete-tintuc/'.$t_tuc->tintuc_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
                        {{$all_tintuc->links()}}
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