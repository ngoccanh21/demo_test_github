@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Cập nhật tin tức</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            @foreach($edit_tintuc as $key => $edit_tt)
                            <form action="{{URL::to('/update-tintuc/'.$edit_tt->tintuc_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!-- enctype="multipart/form-data" -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tiêu đề tin tức</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{$edit_tt->tintuc_tieude}}" id="text-input" name="tintuc_tieude" placeholder="Text" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                    @error('tintuc_tieude')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Nội dung tin tức</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea style="resize: none;" name="tintuc_noidung" id="tintuc_noidung" rows="9" class="form-control">{{$edit_tt->tintuc_noidung}}</textarea>
                                    </div>
                                    @error('tintuc_noidung')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Hình ảnh tin tức</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" value="{{$edit_tt->tintuc_anh}}" id="text-input" name="tintuc_anh" placeholder="Text" class="form-control">
                                        <img src="{{URL::to('upload/tintuc/'.$edit_tt->tintuc_anh)}}" style="width: 100px;height: 100px;">
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-floppy-disk"></i>Lưu thông tin
                                    </button>
                                    <a href="/all-tintuc" class="btn btn-primary btn-sm">
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