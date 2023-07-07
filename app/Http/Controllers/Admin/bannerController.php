<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\banner;
use Illuminate\Support\Facades\Auth;

session_start();

class bannerController extends Controller
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
    public function all_banner()
    {
        $this->AuthLogin();
        $all_banner = banner::orderby('banner_id', 'DESC')->get();
        return view('admin.banner.all_banner')->with(compact('all_banner'));
    }

    public function add_banner()
    {
        $this->AuthLogin();
        return view('admin.banner.add_banner');
    }

    public function save_banner(Request $request) //post
    {
        $this->AuthLogin();
        $request->validate([
            'banner_ten' => 'required',
            'banner_img' => 'required'
        ], [
            'banner_ten.required' => 'Tên banner không được để trống. Hãy nhập lại...',
            'banner_img.required' => 'Ảnh banner không được để trống. Hãy chọn ảnh...',
        ]);
        $data = array();
        $data['banner_ten'] = $request->banner_ten;
        $data['banner_trangthai'] = $request->banner_trangthai;
        //$data->save();
        //$banner->banner_img = $data['banner_img'];

        $get_image = $request->file('banner_img');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //getClientOriginalExtension() : lấy đuôi mở rộng của ảnh
            $name_image = current(explode('.', $get_name_image)); //phân tách tên ảnh trc dấu chấm
            $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/banner', $new_image); //chuyển ảnh vào đường dẫn /upload/banner
            $data['banner_img'] = $new_image;
            banner::insert($data);
            Session::put('message', 'Thêm banner thành công...');
            return Redirect::to('/all-banner');
        }
        $data['banner_img'] = '';
        banner::insert($data);
        Session::put('message', 'Thêm banner thành công...');
        return Redirect::to('/all-banner');
    }
    //ẩn trạng thái banner
    public function active_banner($banner_id)
    {
        $this->AuthLogin();
        banner::where('banner_id', $banner_id)->update(['banner_trangthai' => 0]);
        Session::put('message', 'Ẩn trạng thái banner thành công...');
        return Redirect::to('/all-banner');
    }
    //hiện trạng thái banner
    public function unactive_banner($banner_id)
    {
        $this->AuthLogin();
        banner::where('banner_id', $banner_id)->update(['banner_trangthai' => 1]);
        Session::put('message', 'Hiện trạng thái banner thành công...');
        return Redirect::to('/all-banner');
    }
    public function edit_banner($banner_id)
    {
        $this->AuthLogin();
        $edit_banner = banner::where('banner_id', $banner_id)->get();
        $manager_banner  = view('admin.banner.edit_banner')->with('edit_banner', $edit_banner);
        return view('layout_admin')->with('admin.banner.edit_banner', $manager_banner);
    }
    public function update_banner(Request $request, $banner_id) //post
    {
        $this->AuthLogin();
        $request->validate([
            'banner_ten' => 'required'
        ], [
            'banner_ten.required' => 'Tên banner không được để trống. Hãy nhập lại...'
        ]);
        $data = array();
        $data['banner_ten'] = $request->banner_ten;

        $get_image = $request->file('banner_img');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //getClientOriginalName: lấy tên gốc của tập tin
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension(); //getClientOriginalExtension: lấy đuôi mở rộng
            $get_image->move('upload/banner', $new_image); //move: di chuyển
            $data['banner_img'] = $new_image;
            banner::where('banner_id', $banner_id)->update($data);
            // DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Sửa thông tin banner thành công...');
            return Redirect::to('/all-banner');
        }
        banner::where('banner_id', $banner_id)->update($data);
        Session::put('message', 'Sửa thông tin banner thành công...');
        return Redirect::to('/all-banner');
    }
    public function delete_banner($banner_id)
    {
        $this->AuthLogin();
        banner::findOrFail($banner_id)->delete();
        session()->put('message', 'Xoá banner thành công');
        return Redirect::to('/all-banner');
    }
}
