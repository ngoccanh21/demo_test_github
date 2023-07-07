@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($edit_product_size as $key => $edit_prosize)
                    <div class="card">
                        <div class="card-header">
                            <strong>Cập nhật thông tin số lượng size <span style="color: red;">{{$edit_prosize->productsize->size_ten}}</span> của sản phẩm <span style="color: red;">{{$edit_prosize->productsanpham->product_ten}}</span></strong>
                        </div>
                        <div class="card-body card-block">
                            <?php
                            $message = session()->get('message');
                            if ($message) {
                                echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                                session()->put('message', null);
                            }
                            ?>

                            <form action="{{URL::to('/update-produc-size/'.$edit_prosize->productsize_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!-- enctype="multipart/form-data" -->
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Nhập số lượng của size <span style="color:red;">{{$edit_prosize->productsize->size_ten}}</span> của sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" min="1" value="{{$edit_prosize->quantity}}" id="text-input" name="quantity" placeholder="Text" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                    @error('quantity')
                                    <div class="col-lg-12 col-md-12" style="color: red;">
                                        <ul>
                                            <li>{{ $message}}</li>
                                        </ul>
                                    </div>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-floppy-disk"></i>Lưu thông tin
                                    </button>
                                    <a href="/all-product" class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-circle-xmark"></i>Đóng
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach

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