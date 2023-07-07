<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\login;
use App\Models\social;
use App\Rules\Captcha;
use Illuminate\Validation\Validator;

use App\Models\thongke;
use Illuminate\Support\Carbon;
use App\Models\khachhang;
use App\Models\sanpham;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;

session_start();

class AuthController extends Controller
{
    //view đăng kí authen
    public function register_auth()
    {
        return view('admin.auth.register_auth');
    }
    //post form đăng kí authen
    public function register_auth_post(Request $request)
    {
        $this->validation_auth($request);
        $data = $request->all();

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->admin_phone = $data['admin_phone'];
        $admin->save();
        return redirect('register-auth')->with('message', 'Đăng kí tài khoản Admin Authentication thành công');
    }
    //validate authen
    public function validation_auth($request)
    {
        return $this->validate($request, [
            'admin_email' => 'required|email|max:100',
            'admin_password' => 'required|max:100',
            'admin_name' => 'required|max:200',
            'admin_phone' => 'required|max:10'
        ]);
    }
    //view login authen
    public function login_auth()
    {
        return view('admin.auth.login_auth');
    }
    //post
    public function login_auth_post(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])) {
            return redirect('/index');
        } else {
            return redirect('/login-auth')->with('message', 'Lỗi đăng nhập Authentication');
        }
    }
    //logout auth
    public function logout_auth()
    {
        Auth::logout();
        return redirect('/login-auth')->with('message', 'Đăng xuất Authentication thành công');
    }
}
