@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Đăng nhập | Đăng kí</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Đăng nhập | Đăng kí</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-register-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {!! session()->get('message') !!}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error') !!}
                </div>
                @endif
                <div class="col-lg-6">
                    <form action="{{URL('/login-khachhang')}}" method="post">
                        {{ csrf_field() }}
                        <div class="login-form">
                            <h4 class="login-title">Đăng nhập</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Email *</label>
                                    <input type="email" placeholder="Nhập Email" name="email_account">
                                </div>
                                <div class="col-lg-12">
                                    <label>Mật khẩu</label>
                                    <input type="password" placeholder="Nhập mật khẩu" name="matkhau_account">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Ghi nhớ</label>
                                    </div>
                                </div>
                                <div class="col-md-4 pt-1 mt-md-0">
                                    <div class="forgotton-password_info">
                                        <a href="{{url('/quen-mat-khau')}}"> Quên mật khẩu?</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-5">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 pt-10 pt-lg-0">
                    <form action="{{URL::to('/them-tt-khachhang')}}" method="post">
                        {{ csrf_field() }}
                        <div class="login-form">
                            <h4 class="login-title">Đăng kí</h4>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label>Họ và tên</label>
                                    <input type="text" placeholder="Họ và tên" name="khachhang_ten">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Số điện thoại</label>
                                    <input type="text" placeholder="Số điện thoại" name="khachhang_sdt">
                                </div>
                                <!-- <div class="col-md-6 col-12">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Last Name">
                                </div> -->
                                <div class="col-12">
                                    <label>Email*</label>
                                    <input type="email" placeholder="Email" name="khachhang_email">
                                </div>
                                <div class="col-12">
                                    <label>Mật khẩu</label>
                                    <input type="text" placeholder="Mật khẩu" name="khachhang_matkhau">
                                </div>
                                <div class="col-12">

                                    <input type="hidden" name="khachhang_vip" value="2">
                                </div>
                                <!-- <div class="col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="password" placeholder="Confirm Password">
                                </div> -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Đăng kí</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->

@endsection