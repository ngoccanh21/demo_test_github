@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Quản lí phí vận chuyển</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>
                            <form>
                                <!-- enctype="multipart/form-data" -->
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Chọn tỉnh/thành phố</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="thanhpho" id="thanhpho" class="form-control choose thanhpho">
                                            <option value="">-----Chọn tỉnh/thành phố-----</option>
                                            @foreach($thanhpho as $key => $tp)
                                            <option value="{{$tp->matp}}">{{$tp->name_tp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Chọn quận/huyện</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="quanhuyen" id="quanhuyen" class="form-control choose quanhuyen">
                                            <option value="">-----Chọn quận/huyện-----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Chọn xã/phường</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="xaphuong" id="xaphuong" class="form-control xaphuong">
                                            <option value="">-----Chọn xã/phường</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Phí vận chuyển</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="phi_ship" class="form-control phi_ship" placeholder="Nhập phí vận chuyển...">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-sm add_phivanchuyen" name="add_phivanchuyen">
                                        <i class="fa-sharp fa-solid fa-plus"></i>Thêm phí vận chuyển
                                    </button>
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
                <div class="col-md-12" id="load_phivanchuyen">
                    <!-- DATA TABLE-->
                    <!-- <div class="table-responsive m-b-40">

                    </div> -->
                    <!-- END DATA TABLE-->
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