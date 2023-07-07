@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Thêm sản phẩm</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            <form action="{{URL::to('/save-product')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!-- enctype="multipart/form-data" : lấy ảnh -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="product_ten" placeholder="Nhập tên sản phẩm" class="form-control">
                                    </div>
                                    @error('product_ten')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Loại sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="product_cate" id="select" class="form-control">
                                            @foreach($cate_product as $key => $category)
                                            <option value="{{$category->category_id}}">{{$category->category_ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Mô tả sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea style="resize: none;" name="product_mota" id="product_mota" rows="9" placeholder="Mô tả sản phẩm..." class="form-control"></textarea>
                                    </div>
                                    @error('product_mota')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Giá bán</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="length" id="text-input" name="product_giaban" placeholder="Nhập giá sản phẩm" class="form-control product_giaban_format">
                                    </div>
                                    @error('product_giaban')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Ảnh sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="text-input" name="product_anh" class="form-control">
                                    </div>
                                    @error('product_anh')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Trạng thái</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="product_trangthai" id="select" class="form-control">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
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