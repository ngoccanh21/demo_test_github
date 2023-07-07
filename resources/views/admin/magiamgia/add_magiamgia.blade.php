@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Thêm mã giảm giá</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9 alert alert-danger" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            <form action="{{URL::to('/save-magiamgia')}}" method="post" class="form-horizontal">
                                <!-- enctype="multipart/form-data" -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tên mã giảm giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="magiamgia_ten" placeholder="Nhập tên mã giảm giá..." class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                    @error('magiamgia_ten')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Mã code giảm giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="magiamgia_code" placeholder="Nhập code giảm giá..." class="form-control">
                                    </div>
                                    @error('magiamgia_code')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Loại mã giảm giá(% hoặc số tiền giảm)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="magiamgia_loaigiamgia" id="select" class="form-control">
                                            <option value="0">-----Chọn loại mã giảm giá------</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo số tiền</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Số lượng mã giảm giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="magiamgia_soluong" placeholder="Nhập số lượng mã giảm giá..." class="form-control">
                                    </div>
                                    @error('magiamgia_soluong')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Số tiền hoặc phần trăm giảm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="magiamgia_sotiengiam" placeholder="Nhập số tiền hoặc % mã giảm giá..." class="form-control">
                                    </div>
                                    @error('magiamgia_sotiengiam')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Ngày bắt đầu</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="magiamgia_ngaybatdau" name="magiamgia_ngaybatdau" class="form-control">
                                    </div>
                                    @error('magiamgia_ngaybatdau')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Ngày kết thúc</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="magiamgia_ngayketthuc" name="magiamgia_ngayketthuc" class="form-control">
                                    </div>
                                    @error('magiamgia_ngayketthuc')
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
                                        <select name="magiamgia_trangthai" id="select" class="form-control">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-sharp fa-solid fa-plus"></i>Thêm Mới
                                    </button>
                                    <a href="/all-magiamgia" class="btn btn-primary btn-sm">
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