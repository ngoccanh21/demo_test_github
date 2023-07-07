@extends('layout_admin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <span style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Danh sách tài khoản</span>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <!-- <h3 class="title-5 m-b-35">data table</h3> -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="/add-user" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Thêm mới
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <?php
                        $message = session()->get('message');
                        if ($message) {
                            echo '<div class="col-12 col-md-9" style="padding: 0px 0px 30px 0px;color: #e51814;text-align: center;">' . $message . '</div>';
                            session()->put('message', null);
                        }
                        ?>

                        <!-- nếu sử dụng phân trang bằng js thì sẽ bị lỗi phân quyền -->
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người dùng</th>
                                    <th>Tài khoản</th>
                                    <!-- <th>Mật khẩu</th> -->
                                    <th>Số điện thoại</th>
                                    <th>Author</th>
                                    <th>Admin</th>
                                    <th>User</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $index => $user_ad)
                                <form action="{{url('/phan-quyen-admin')}}" method="POST">
                                    @csrf
                                    <tr class="tr-shadow" style="border: 1px solid black;">
                                        <td style="line-height: 70px;">{{$index+1}}</td>
                                        <td>
                                            <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 100px;">
                                                {{$user_ad->admin_name}}
                                            </div>
                                        </td>
                                        <td>{{$user_ad->admin_email}}
                                            <input type="hidden" name="admin_email" value="{{$user_ad->admin_email}}">
                                            <input type="hidden" name="admin_id" value="{{$user_ad->admin_id}}">
                                        </td>
                                        <!-- <td>
                                            <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 100px;">
                                                {{$user_ad->admin_password}}
                                            </div>
                                        </td> -->
                                        <td>{{$user_ad->admin_phone}}</td>

                                        <!-- hasRole bên model Admin
                                        nếu tk admin có quyền author, admin, user thì sẽ tích vào checkbox còn ko thì trả về null(ko tích) -->
                                        <td><input type="checkbox" name="author_role" {{$user_ad->hasRole('author') ? 'checked' : ''}}></td>
                                        <td><input type="checkbox" name="admin_role" {{$user_ad->hasRole('admin') ? 'checked' : ''}}></td>
                                        <td><input type="checkbox" name="user_role" {{$user_ad->hasRole('user') ? 'checked' : ''}}></td>

                                        <td>
                                            <input type="submit" value="Phân quyền" class="btn btn-sm btn-default">
                                            <a onclick="return confirm('Bạn có chắc muốn xoá thông tin nười dùng này không???')" href="{{URL::to('/delete-user/'.$user_ad->admin_id)}}" class="btn btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                        {{$admin->links()}}


                    </div>

                    <!-- END DATA TABLE -->
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
@stop