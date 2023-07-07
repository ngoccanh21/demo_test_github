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
use App\Models\tintuc;
use Illuminate\Support\Facades\Auth;

session_start();

class tintucController extends Controller
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
    //view tin tức add_tintuc all_tintuc edit_tintuc
    public function all_tintuc()
    {
        $this->AuthLogin();
        $all_tintuc = tintuc::orderby('tintuc_id', 'DESC')->paginate(5);

        return view('admin.tintuc.all_tintuc')->with(compact('all_tintuc'));
    }
    //view add tin tức
    public function add_tintuc()
    {
        $this->AuthLogin();
        return view('admin.tintuc.add_tintuc');
    }
    public function save_tintuc(Request $request) //post
    {
        $this->AuthLogin();
        $request->validate([
            'tintuc_tieude' => 'required',
            'tintuc_noidung' => 'required|max:700',
            'tintuc_anh' => 'required'
        ], [
            'tintuc_tieude.required' => 'Tiêu đề tin tức không được để trống. Hãy nhập lại...',
            'tintuc_noidung.required' => 'Nội dung tin tức không được để trống. Hãy nhập lại...',
            'tintuc_anh.required' => 'Ảnh tin tức không được để trống. Hãy nhập lại...'
        ]);
        $data = array();

        $data['tintuc_tieude'] = $request->tintuc_tieude;
        $data['tintuc_noidung'] = $request->tintuc_noidung;
        $data['tintuc_ngaydang'] = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $data['tintuc_trangthai'] = $request->tintuc_trangthai;

        $get_image = $request->file('tintuc_anh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //getClientOriginalExtension() : lấy đuôi mở rộng của ảnh
            $name_image = current(explode('.', $get_name_image)); //phân tách tên ảnh trc dấu chấm
            $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/tintuc', $new_image); //chuyển ảnh vào đường dẫn /upload/product
            $data['tintuc_anh'] = $new_image;
            DB::table('tbl_tintuc')->insert($data);
            Session::put('message', 'Thêm tin tức thành công');
            return Redirect::to('/all-tintuc');
        }
        $data['tintuc_anh'] = '';
        DB::table('tbl_tintuc')->insert($data);
        Session::put('message', 'Thêm tin tức thành công');
        return Redirect::to('/all-tintuc');
    }
    //ẩn trạng thái tintuc
    public function active_tintuc($tintuc_id)
    {
        $this->AuthLogin();
        tintuc::where('tintuc_id', $tintuc_id)->update(['tintuc_trangthai' => 0]);
        Session::put('message', 'Ẩn trạng thái tin tức thành công...');
        return Redirect::to('/all-tintuc');
    }
    //hiện trạng thái tintuc
    public function unactive_tintuc($tintuc_id)
    {
        $this->AuthLogin();
        tintuc::where('tintuc_id', $tintuc_id)->update(['tintuc_trangthai' => 1]);
        Session::put('message', 'Hiện trạng thái tin tức thành công...');
        return Redirect::to('/all-tintuc');
    }
    public function edit_tintuc($tintuc_id)
    {
        $this->AuthLogin();
        $edit_tintuc = tintuc::where('tintuc_id', $tintuc_id)->get();
        $manager_tintuc  = view('admin.tintuc.edit_tintuc')->with('edit_tintuc', $edit_tintuc);
        return view('layout_admin')->with('admin.tintuc.edit_tintuc', $manager_tintuc);
    }
    public function update_tintuc(Request $request, $tintuc_id) //post
    {
        $this->AuthLogin();
        $request->validate([
            'tintuc_tieude' => 'required',
            'tintuc_noidung' => 'required|max:700'
        ], [
            'tintuc_tieude.required' => 'Tiêu đề tin tức không được để trống. Hãy nhập lại...',
            'tintuc_noidung.required' => 'Nội dung tin tức không được để trống. Hãy nhập lại...',
        ]);
        $data = array();

        $data['tintuc_tieude'] = $request->tintuc_tieude;
        $data['tintuc_noidung'] = $request->tintuc_noidung;

        //$data['tintuc_trangthai'] = $request->tintuc_trangthai;
        $get_image = $request->file('tintuc_anh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/tintuc', $new_image);
            $data['tintuc_anh'] = $new_image;
            DB::table('tbl_tintuc')->where('tintuc_id', $tintuc_id)->update($data);
            Session::put('message', 'Cập nhật tin tức thành công...');
            return Redirect::to('/all-tintuc');
        }
        DB::table('tbl_tintuc')->where('tintuc_id', $tintuc_id)->update($data);
        Session::put('message', 'Cập nhật tin tức thành công...');
        return Redirect::to('/all-tintuc');
    }
    public function delete_tintuc($tintuc_id)
    {
        $this->AuthLogin();
        tintuc::findOrFail($tintuc_id)->delete();
        session()->put('message', 'Xoá tin tức thành công');
        return Redirect::to('/all-tintuc');
    }
}
