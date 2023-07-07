@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Sửa thông tin banner</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            @foreach($edit_banner as $key => $edit_banner_pro)
                            <form action="{{URL::to('/update-banner/'.$edit_banner_pro->banner_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!-- enctype="multipart/form-data" -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tên banner</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{$edit_banner_pro->banner_ten}}" id="text-input" name="banner_ten" placeholder="Text" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                    @error('banner_ten')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Hình ảnh banner</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" value="{{$edit_banner_pro->banner_img}}" id="text-input" name="banner_img" placeholder="Text" class="form-control">
                                        <img src="{{URL::to('upload/banner/'.$edit_banner_pro->banner_img)}}" style="width: 100px;height: 100px;">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-floppy-disk"></i>Lưu thông tin
                                    </button>
                                    <a href="/all-banner" class="btn btn-primary btn-sm">
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