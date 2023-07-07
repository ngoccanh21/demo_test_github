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
                        <!-- <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div> -->
                        <div class="table-data__tool-right">
                            <a href="/add-category" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Thêm mới</a>
                            <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div> -->
                        </div>
                        <!-----export data---->
                        <form action="{{url('export-csv')}}" method="POST">
                            @csrf
                            <!-- <i class="fa-sharp fa-solid fa-file-csv"></i>
                            <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success"> -->
                            <button type="submit" name="export_csv" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="fa-sharp fa-solid fa-file-csv">Xuất file Excel</i>
                            </button>
                        </form>
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
                                    <th>Tên loại</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th style="text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_category as $index => $cate_pro)
                                <tr class="tr-shadow" style="border: 1px solid black;">
                                    <td>{{$index+1}}</td>
                                    <td>{{$cate_pro->category_ten}}</td>
                                    <!-- <td>
                                        <span class="block-email">lori@example.com</span>
                                    </td> -->
                                    <td class="desc">
                                        <?php
                                        echo strip_tags(html_entity_decode($cate_pro->category_mota));
                                        // xoá thẻ html trong ckeditor
                                        ?>
                                    </td>
                                    <!-- <td>2018-09-27 02:12</td> -->
                                    <td>
                                        <?php
                                        if ($cate_pro->category_trangthai == 0) {
                                        ?>
                                            <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><i style="font-size: 23px;" class="fa-sharp fa-solid fa-eye-slash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><i style="font-size: 23px;" class="fa-solid fa-eye"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <!-- <span class="status--process">{{$cate_pro->category_trangthai}}</span> -->
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <!-- <a class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </a> -->
                                            <a href="{{URL::to('/edit-category/'.$cate_pro->category_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc muốn xoá thông tin loại sản phẩm này không???')" href="{{URL::to('/delete-category/'.$cate_pro->category_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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