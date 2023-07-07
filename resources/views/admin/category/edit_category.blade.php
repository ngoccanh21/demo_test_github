@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Sửa thông tin loại sản phẩm</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            @foreach($edit_category as $key => $edit_cate_pro)
                            <form action="{{URL::to('/update-category-product/'.$edit_cate_pro->category_id)}}" method="post" class="form-horizontal">
                                <!-- enctype="multipart/form-data" -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tên loại</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{$edit_cate_pro->category_ten}}" id="text-input" name="category_ten" placeholder="Text" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                    @error('category_ten')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Mô tả</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea style="resize: none;" name="category_mota" id="category_mota" rows="9" class="form-control">{{$edit_cate_pro->category_mota}}</textarea>
                                    </div>
                                    @error('category_mota')
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
                                    <a href="/all-category" class="btn btn-primary btn-sm">
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