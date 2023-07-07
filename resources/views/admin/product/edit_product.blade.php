@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Sửa thông tin sản phẩm</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            @foreach($edit_product as $key => $edit_pro)
                            <form action="{{URL::to('/update-product/'.$edit_pro->product_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!-- enctype="multipart/form-data" -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{$edit_pro->product_ten}}" id="text-input" name="product_ten" placeholder="Text" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
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
                                        <label for="text-input" class=" form-control-label">Hình ảnh sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" value="{{$edit_pro->product_anh}}" id="text-input" name="product_anh" placeholder="Text" class="form-control">
                                        <img src="{{URL::to('upload/product/'.$edit_pro->product_anh)}}" style="width: 100px;height: 100px;">
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Loại sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="product_cate" id="select" class="form-control">
                                            @foreach($cate_product as $key => $category)
                                            @if($category->category_id==$edit_pro->category_id)
                                            <option selected value="{{$category->category_id}}">{{$category->category_ten}}</option>
                                            @else
                                            <option value="{{$category->category_id}}">{{$category->category_ten}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Mô tả sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea style="resize: none;" name="product_mota" id="product_mota" rows="9" class="form-control">{{$edit_pro->product_mota}}</textarea>
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
                                        <label for="text-input" class=" form-control-label">Giá sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="length" value="{{$edit_pro->product_giaban}}" id="text-input" name="product_giaban" placeholder="Text" class="form-control product_giaban_format">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                    @error('product_giaban')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>

                                <!-- <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Trạng thái</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_trangthai" id="select" class="form-control">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-floppy-disk"></i>Lưu thông tin
                                    </button>
                                    <a href="/all-product" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-circle-xmark"></i>Đóng
                                    </a>
                                </div>
                            </form>
                            @endforeach
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