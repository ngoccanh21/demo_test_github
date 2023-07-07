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

class userController extends Controller
{
    //đăng nhập
    public function AuthLogin()
    {
        //$admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('/index');
        } else {
            return Redirect::to('/login')->send();
        }
    }
    //view tài khoản admin
    public function all_user(Request $request)
    {
        $this->AuthLogin();
        $user = Admin::where('admin_email', $request->admin_email)->first();
        $admin = Admin::with('roles')->orderBy('admin_id', 'DESC')->paginate(5); //->paginate(5);
        return view('admin.user.all_user')->with(compact('admin', 'user'));
    }

    //post
    public function phan_quyen_admin(Request $request)
    {
        //$data = $request->all();
        if (Auth::id() == $request->admin_id) {
            return redirect()->back()->with('message', "Bạn không được phân quyền cho chính mình!");
        }
        $user = Admin::where('admin_email', $request->admin_email)->first();
        $user->roles()->detach();
        if ($request->author_role) {
            $user->roles()->attach(Roles::where('name', 'author')->first());
        }
        if ($request->user_role) {
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        if ($request->admin_role) {
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        return redirect()->back()->with('message', 'Phân quyền cho tài khoàn thành công');
    }
    //view thêm user
    public function add_user()
    {
        $this->AuthLogin();
        return view('admin.user.add_user');
    }
    //post add user
    public function post_add_user(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $request->validate([
            'admin_name' => 'required|max:200',
            'admin_email' => 'required|email|max:100',
            'admin_password' => 'required|max:50',
            'admin_phone' => 'required|max:10'
        ]);

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);

        $adm = Admin::where('admin_email', $admin->admin_email)->first();
        if ($adm) {
            $adm_count = $adm->count();
            if ($adm_count > 0) {
                Session::put('message', 'Thêm tài khoản người dùng không thành công do email vừa thêm đã tồn tại!');
                return redirect()->back();
            }
        } else {
            $admin->save();
            $admin->roles()->attach(Roles::where('name', 'user')->first());
            Session::put('message', 'Thêm tài khoản người dùng thành công');
            return Redirect::to('/all-user');
        }
    }
    //delete user
    public function delete_user($admin_id)
    {
        $this->AuthLogin();
        if (Auth::id() == $admin_id) {
            return redirect()->back()->with('message', "Bạn không được xoá tài khoản của chính mình!");
        }
        $admin = Admin::find($admin_id);
        if ($admin) {
            $admin->roles()->detach();
            $admin->delete();
        }

        return redirect()->back()->with('message', 'Xoá tài khoản user thành công');
    }
}
