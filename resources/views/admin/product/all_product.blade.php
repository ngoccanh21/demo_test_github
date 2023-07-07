@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Danh sách sản phẩm</span>
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
                            <a href="/add-product" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Thêm mới</a>
                        </div>
                        <!-----export data---->
                        <form action="{{url('export-csv-product')}}" method="POST">
                            @csrf

                            <button type="submit" name="export_csv_product" class="au-btn au-btn-icon au-btn--green au-btn--small">
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
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Giá bán</th>
                                    <!-- <th>Số lượng</th> -->
                                    <th>Mô tả</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th style="text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_product as $index => $product)
                                <tr class="tr-shadow" style="border: 1px solid black;">
                                    <td style="line-height: 70px;">{{$index+1}}</td>
                                    <td style="text-transform: capitalize;">{{$product->product_ten}}</td>
                                    <td><img src="upload/product/{{$product->product_anh}}" alt="" style="width: 70px;height: 70px;"></td>
                                    <td>{{number_format($product->product_giaban)}}</td>

                                    <td class="desc">
                                        <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">
                                            <?php
                                            echo strip_tags(html_entity_decode($product->product_mota));
                                            // xoá thẻ html trong ckeditor
                                            ?>
                                        </div>
                                    </td>
                                    <td>{{$product->category_ten}}</td>
                                    <td>
                                        <?php
                                        if ($product->product_trangthai == 0) {
                                        ?>
                                            <a href="{{URL::to('/unactive-product/'.$product->product_id)}}"><i style="font-size: 23px;" class="fa-sharp fa-solid fa-eye-slash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="{{URL::to('/active-product/'.$product->product_id)}}"><i style="font-size: 23px;" class="fa-solid fa-eye"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{URL::to('/view-product-size/'.$product->product_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Thêm size">
                                                <i class="fa fa-plus-square"></i>
                                            </a>
                                            <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Cập nhật">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc muốn xoá thông tin sản phẩm này không???')" href="{{URL::to('/delete-product/'.$product->product_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Xoá">
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