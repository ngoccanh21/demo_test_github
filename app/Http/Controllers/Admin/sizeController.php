<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\size;
use Illuminate\Support\Facades\Auth;

session_start();

class sizeController extends Controller
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
    public function all_size()
    {
        $this->AuthLogin();
        $all_size = size::orderby('size_id', 'DESC')->get();
        return view('admin.size.all_size')->with(compact('all_size'));
    }

    public function add_size()
    {
        $this->AuthLogin();
        return view('admin.size.add_size');
    }

    public function save_size(Request $request) //post
    {
        $this->AuthLogin();
        $request->validate([
            'size_ten' => 'required'
        ], [
            'size_ten.required' => 'Tên size không được để trống. Hãy nhập lại...'
        ]);
        $data = array();
        $data['size_ten'] = $request->size_ten;
        $data['size_trangthai'] = $request->size_trangthai;
        $size = size::where('size_ten', $data['size_ten'])->first();
        if ($size) {
            $size_count = $size->count();
            if ($size_count > 0) {
                Session::put('message', 'Thêm size không thành công do size vừa thêm đã tồn tại');
                return redirect()->back();
            }
        } else {
            size::insert($data);
            Session::put('message', 'Thêm size thành công...');
        }
        // size::insert($data);
        // Session::put('message', 'Thêm size thành công...');

        return Redirect::to('/all-size');
    }
    //ẩn trạng thái size
    public function active_size($size_id)
    {
        $this->AuthLogin();
        size::where('size_id', $size_id)->update(['size_trangthai' => 0]);
        Session::put('message', 'Ẩn trạng thái size thành công...');
        return Redirect::to('/all-size');
    }
    //hiện trạng thái size
    public function unactive_size($size_id)
    {
        $this->AuthLogin();
        size::where('size_id', $size_id)->update(['size_trangthai' => 1]);
        Session::put('message', 'Hiện trạng thái size thành công...');
        return Redirect::to('/all-size');
    }

    public function delete_size($size_id)
    {
        $this->AuthLogin();
        size::findOrFail($size_id)->delete();
        session()->put('message', 'Xoá size thành công');
        return Redirect::to('/all-size');
    }
}
