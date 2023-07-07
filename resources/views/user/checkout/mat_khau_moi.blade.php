@extends('layout_user')
@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/frontend/assets/images/banner/banner-4.png">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Mật khẩu mới</h2>
                        <ul>
                            <li>
                                <a href="/home">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Quên mật khẩu</li>
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
                    @php
                    $token =$_GET['token'];
                    $email =$_GET['email'];
                    @endphp
                    <form action="{{URL('/update-new-matkhau-post')}}" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Nhập mật khẩu mới</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Nhập mật khẩu mới *</label>
                                    <input type="hidden" value="{{$email}}" name="email">
                                    <input type="hidden" value="{{$token}}" name="token">
                                    <input type="text" placeholder="Nhập mật khẩu" name="account_password">
                                </div>

                                <div class="col-lg-6 pt-5">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Gửi</button>
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