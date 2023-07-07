@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong style="text-transform: capitalize;">Thêm số lượng size: <span style="color: #f11127;">{{$sanpham->product_ten}}</span></strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>

                            <form action="{{URL::to('/post-product-size')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!-- enctype="multipart/form-data" : lấy ảnh -->
                                @csrf
                                <!-- lượt xem tin tức -->
                                <input type="hidden" value="{{$sanpham->product_id}}" class="product_id_{{$sanpham->product_id}}">
                                <input type="hidden" value="{{$sanpham->product_ten}}" class="product_ten_{{$sanpham->product_id}}">


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Size sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="size_id" id="size_id" class="form-control choosesize size_id">
                                            <option value="">-----Chọn size-----</option>

                                            @foreach($size as $key => $size_sp)

                                            <option value="{{$size_sp->size_id}}" class="size_id_{{$size_sp->size_id}}">{{$size_sp->size_ten}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Số lượng</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="text-input" name="" min="1" placeholder="Nhập số lượng size sản phẩm" class="form-control quantity">
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-sm productsize" data-id_product="{{$sanpham->product_id}}">
                                        <!-- data-id_size="{{$size_sp->size_id}}" -->
                                        <i class="fa-sharp fa-solid fa-plus"></i>Thêm Mới
                                    </button>
                                    <a href="/all-product" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-xmark"></i>Đóng
                                    </a>
                                </div>
                            </form>


                        </div>
                        <!-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div> -->
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-data2" style="border:1px solid black;">
                        <thead style="background: #308dab;">
                            <tr>
                                <th style="color:#f6f8f9;">STT</th>
                                <th style="color:#f6f8f9;">Size</th>
                                <th style="color:#f6f8f9;">Số lượng</th>
                                <th style="text-align: center;color:#f6f8f9;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($size_pros as $index => $size_pro)
                            <tr style="border-bottom: 1px solid gray;">
                                <td style="border:1px solid gray;text-align: center;padding:10px 0px 10px 0px;">{{$index+1}}</td>
                                <td style="border:1px solid gray;text-align: center;padding:10px 0px 10px 0px;">{{$size_pro->productsize->size_ten}}</td>
                                <td style="border:1px solid gray;background:#2da7c6;color:white;text-align: center;padding:10px 0px 10px 0px;">{{$size_pro->quantity}}</td>

                                <td style="padding:10px 20px 10px 0px;">
                                    <div class="table-data-feature">
                                        <a href="{{URL::to('/edit-product-size/'.$size_pro->productsize_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Cập nhật">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a onclick="return confirm('Bạn có chắc muốn xoá số lượng sản phẩm của size này không???')" href="{{URL::to('/delete-product-size/'.$size_pro->productsize_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Xoá">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endsection